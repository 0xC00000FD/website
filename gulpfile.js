/* ============================================ *
 *              Import dependencies
 * ============================================ */

var	fs = require('fs'),
	util = require('util'),
	process = require('process'),
	child = require('child_process'),
	glob = require('glob');

var	envLocation = 'env.json',
	confLocation = 'config.json',
	env = require('./' + envLocation),
	conf = require('./' + confLocation),
	env = Object.assign(env, conf);

var gulp = require('gulp'),
	gconcat = require('gulp-concat'),
	concatCSS = require('gulp-concat-css'),
	imagemin = require('gulp-imagemin'),
	// NOTE: gulp-responsive requires `libvips` if on MacOS
	// Source: https://github.com/mahnunchik/gulp-responsive#installation
	responsive = require('gulp-responsive'),
	cleanCSS = require('gulp-clean-css'),
	sass = require('gulp-sass'),
	uglify = require('gulp-uglify'),
	htmlmin = require('gulp-htmlmin'),
	rename = require('gulp-rename'),
	maps = require('gulp-sourcemaps'),
	connect = require('gulp-connect-php'),
	prettyError = require('gulp-prettyerror'),
	browserSync = require('browser-sync'),
	runSequence = require('run-sequence'),
	del = require('del');

/* ============================================ *
 *              Define Constants
 * ============================================ */

var reload = browserSync.reload;

/* ============================================ *
 *               Define Tasks
 * ============================================ */

/* ============ Optimize HTML =============== */

gulp.task('renderPhp', function() {
	for (var i = 0; i < (env.html.phpRender).length; i++) {
		var command = 'php ' + env.html.base + env.html.phpRender[i] + '.php > ' + env.html.base + env.html.phpRender[i] + '.html';

		child.execSync(command, {
			env: { REQUEST_URI: '' }
		});
	}
});

gulp.task('minifyHtml', ['renderPhp'], function() {
	return gulp.src([env.html.base + '/**/*.html', '!' + env.html.base + '/**/*-OLD*.html'])
		.pipe(htmlmin(env.html.minifyOptions))
		.pipe(gulp.dest(env.build))
		.pipe(browserSync.stream());
});

/* ============ Optimize Images =============== */

gulp.task('copyImages', function() {
	return gulp.src(env.dev + env.images.source + '/**/*.{' + env.images.processingIgnore + '}')
		.pipe(gulp.dest(env.dev + env.images.base));
});

gulp.task('minifyImages', ['copyImages'], function() {
	var ignored = env.images.processingIgnore ? '|.' + (env.images.processingIgnore).replace(' ', '').replace(/,/g, '|.') : '';

	return gulp.src([env.dev + env.images.source + '/**/*', '!' + env.dev + env.images.source + '/**/+(*-OLD*' + ignored + ')'])
		.pipe(responsive(env.images.resizeConfig, env.images.resizeOptions))
		.pipe(imagemin(env.images.compressionOptions))
		.pipe(gulp.dest(env.dev + env.images.base));
});

/* ============ Optimize Scripts =============== */

gulp.task("concatScripts", function() {
	return gulp.src(env.scripts.concat)
		.pipe(prettyError())
		.pipe(maps.init())
		.pipe(gconcat(env.scripts.concatOutput))
		.pipe(maps.write('./'))
		.pipe(gulp.dest(env.dev + env.scripts.base));
});

gulp.task("minifyScripts", ['concatScripts'], function() {
	return gulp.src(env.dev + env.scripts.base + env.scripts.concatOutput)
		.pipe(prettyError())
		.pipe(uglify())
		.pipe(rename(env.scripts.minifyOutput))
		.pipe(gulp.dest(env.dev + env.scripts.base))
		.pipe(browserSync.stream());
});

/* ============ Optimize Css =============== */

gulp.task('compileSass', function() {
	return gulp.src([
			env.dev + env.styles.base + '/**/*.scss',
			'!' + env.dev + env.styles.base + '/**/+(_*.scss|*-OLD*.scss)'
		])
		.pipe(maps.init())
		.pipe(prettyError())
		.pipe(sass(env.styles.compileOptions).on('error', sass.logError))
		.pipe(maps.write('./'))
		.pipe(gulp.dest(env.dev + env.styles.css));
});

gulp.task('concatCss', ['compileSass'], function() {
	return gulp.src(env.styles.concat)
		.pipe(prettyError())
		.pipe(concatCSS(env.styles.concatOutput))
		.pipe(gulp.dest(env.dev + env.styles.css));
});

gulp.task("minifyCss", ['concatCss'], function() {
	return gulp.src(env.dev + env.styles.css + '/' + env.styles.concatOutput)
		.pipe(prettyError())
		.pipe(cleanCSS(env.styles.minifyOptions))
		.pipe(rename(env.styles.minifyOutput))
		.pipe(gulp.dest(env.dev + env.styles.css))
		.pipe(browserSync.stream());
});

/* ============ Build Apache Config files =============== */

gulp.task('buildApacheConf', function() {
	// Check for --production flag
	var production = getArg('--production');
	var mode = production ? 'production' : env.mode;

	// Concat .htaccess Modules
	var resultFile = './' + env.dev + '/.htaccess';
	var baseFile = './' + env.apacheConf.htaccess.baseFile;
	var addFile = './' + env.apacheConf.htaccess[mode + 'File'];
	var data = '# ' + (mode).capitalise() + ' .htaccess\n\n';
	data += fs.readFileSync(baseFile, 'utf8') + '\n\n';
	if (mode !== 'development') data += fs.readFileSync(addFile, 'utf8');

	return fs.writeFileSync(resultFile, data);
});

/* ============ Serve Files =============== */

gulp.task('serve', ['minifyScripts', 'minifyCss', 'renderPhp'], function() {
	gulp.watch([envLocation, confLocation], ['minifyScripts', 'minifyCss', 'renderPhp', reload]);

	browserSync({
		proxy: env.browserSync.proxy,
		port: env.browserSync.port,
		snippetOptions: { // this option deals with php errors(prevents browserSync from stop working)
			rule: {
				match: /$/
			}
		},
		notify: env.browserSync.notify
	});

	gulp.watch([env.dev + '/**/*.php', '!' + env.dev + '/**/*-OLD*.php'], ['renderPhp']);
	gulp.watch([env.dev + env.scripts.base + '/**/*.js', '!' + env.dev + env.scripts.base + '/+(app.min.js|app.js|*-OLD*)'], ['minifyScripts']);
	gulp.watch([env.dev + env.images.base + '/**/*', '!' + env.dev + env.images.base + '/**/*-OLD*'], ['minifyImages']);
	gulp.watch([env.dev + env.styles.base + '/**/*.+(scss|css)', '!' + env.dev + env.styles.base + '/**/*-OLD*.scss'], ['minifyCss']);
});

/* ============ Copy Files To Build Folder =============== */

gulp.task('copy', function() {
	var copyFiles = [
		env.dev + env.styles.css + env.styles.minifyOutput,
		env.dev + env.scripts.base + env.scripts.minifyOutput,
		env.dev + env.images.base + '/**/*.*',
		'!' + env.dev + env.images.source + '/**/*.*',
		'!dev/**/*-OLD*'
	];
	copyFiles = copyFiles.concat(env.copy.files);

	return gulp.src(copyFiles, { base: env.dev })
		.pipe(gulp.dest(env.build));
});

/* ============ Clean Build Folder And Minified Scripts and Styles =============== */

gulp.task('clean', function() {
	var cssFiles = [];
	var deleteFiles = [
		env.build,
		env.dev + env.scripts.base + env.scripts.concatOutput,
		env.dev + env.scripts.base + env.scripts.minifyOutput,
		env.dev + env.styles.css + env.styles.concatOutput,
		env.dev + env.styles.css + env.styles.minifyOutput,
		env.dev + env.images.base + '/**/*.*',
		'!' + env.dev + env.images.source + '/**/*.*',
		env.dev + '/**/*.map'
	];

	var sassFiles = glob.sync(
		env.dev + env.styles.base + '/**/*.scss',
		{
			nonull: false,
			nodir: true,
			ignore: env.dev + env.styles.base + '/**/+(_*.scss|*-OLD*.scss)'
		});

	for (var i = 0; i < sassFiles.length; i++) {
		cssFiles[i] = sassFiles[i].replace(/scss/gi, 'css');
	}

	return del(deleteFiles.concat(env.delete.files, cssFiles));
});

/* ============ Build Project =============== */

gulp.task('build', ['clean'], function(cb) {
	env.mode = 'staging';

	runSequence([
			'minifyCss',
			'minifyScripts',
			'minifyImages',
			'buildApacheConf'
		],
		'minifyHtml',
		'copy',
		cb
	);
});

// Alias build to the default
gulp.task('default', function(cb) {
	runSequence(env.defaultCommand);
});

// Capitalise function
String.prototype.capitalise = function() {
	return this.replace(/(?:^|\s)\S/g, function(a) { return a.toUpperCase(); });
};

// Get CLI arguments
function getArg(key) {
	var index = process.argv.indexOf(key);
	var next = process.argv[index + 1];
	return (index < 0) ? null : (!next || next[0] === "-") ? true : next;
}

//Development tasks
gulp.task('travis', ['build', 'testServerJS'], function() {
	process.exit(0);
});