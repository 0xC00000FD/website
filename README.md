# JSFAR Website!
It's about time we made a website custom to our style and independent of a free 3rd-party service like Enjin. Thus, this project will aim to build, from the Ground up a new website with all the useful functionality usually offered by Enjin and MORE!
The great thing about making our own website from the ground up is that we get to choose how things work and how things look. Even if it means building it ourselves.

---

**Quick Links**
	[Installation](#installation)
	[Configuring the Build System (Gulp)](#configuring-gulp)
	[Using the Build System (Gulp)](#using-gulp)

# Project Management
The Task, Suggestions and Feedback Management will all be handled on Trello. We will use Trello for the reasons of it being:
1. Easy to use
2. Allows Members to offer feedback and suggestions via commenting on and Up-voting individual tasks
	- Comment to add feedback and make suggestions for an individual task
		+ e.g. on task "Implement Google Calendar" a Member could say "I hate Google Calendar, don't use it!" thus adding their voice to how the Website will be created
	- Up-vote to show the Developers which Feature should be prioritised!

To be added as a Member on Trello, or if you think you could Contribute to some of the code, contact either **S. "_Inferno_" Arend** or **E. "_Night_" Salem** on [Discord](http://bit.ly/jsfar-join-discord) or on [Teamspeak](ts3server://ts.jsfar.com).

For anything else, **Contact Support** @ [support@jsfar.com](support@jsfar.com)

# The Development Environment & How to Work With It
For this project I've recently implemented a previouly not required development environment. By this I mean that the project now has a gulpfile which is capable of performing automated tasks to ensure the assets for this project are built correctly and in the correct structure.

## <a name="installation"></a>Installation
1. Ensure you have [NodeJS](https://nodejs.org/en/download/) installed
1. Ensure you have an Apache based local server (such as [XAMPP](https://www.apachefriends.org/download.html)) which has PHP 7.0 or up and MySQL MariaDB version 10 or up
1. In the command line
	1. Change directory to where you've saved the project using `cd "path/to-my/project directory"`
	1. Use `npm install --save-dev` to install the node packages which the gulpfile needs to be able to work
	1. (MAC ONLY) Install [libvips](https://github.com/jcupitt/libvips), following the instructions in the git repo - without this the gulpfile will be unable to process the images

## <a name="configuring-gulp"></a>Gulpfile Configuration
In conjunction with the gulpfile there are two `.json` files - `config.json` & `env.json`. These two files contain settings which the gulpfile uses to decide on certain elements of the automated tasks (e.g. where the images are kept, what options to use for compressing the images, etc.).

---

The `config.json` file contains settings for the gulpfile which should stay the same between the machines of each developer. These settings define things which affect the build system and how the project assets are handled.

---

The `env.json` file contains options for the gulpfile which depend on how each developer has their project set up on their individual machines. These options should be changed depending on the preferences of the developer and how their local machine has been set up.

## <a name="using-gulp"></a>Using the Gulpfile
The gulpfile allows a developer to perform a variety of automated tasks which are pre-set to ensure that the assets are built exactly the same regardless on whose machine. If there is any doubt about the gulpfile and the tasks it performs, or suggestions to improve on these, contact **S. "_Inferno_" Arend**.

### Start Serving the Website
To have gulp start [browserSync](https://browsersync.io/) and prepare the assets for development (Compile the SASS/SCSS, duplicate/create converted versions of images, etc.) simply use `gulp serve`. Once you've done this gulp will prepare the assets and then open a tab in your browser to view the website. Any changes you make to the source files (not the compiled assets, they will be overwritten by gulp!) will then automatically be detected and stimulate gulp to re-prepare the affected assets and then refresh the tab showing the website with the changes made.

### Build the Dist Folder for Release
There are two "modes" with which one can build the dist (distribution) folder to then be uploaded to a server. These modes are described in detail [below](#environment-modes).

1. `staging` mode build - this builds a folder which will then be used on the staging server. Use `gulp` or `gulp build`. Either of these commands will prepare the usual assets, prepare some additional assets not normally prepared during development (such as the Apache configuration files), and then copy all required files to a new folder called `dist`. This folder is what will be uploaded to any staging/testing servers displaying the website.
1. `production` mode build - this does the same as staging, however the assets which are processed and organised are specifically intended for a production server (look at [production mode](#production-mode) for more information). In this case, use `gulp --production` or `gulp build --production`.

# <a name="environment-modes"></a>Differences between Environments
The basic differences between environment "modes" are:

1. In `development` mode everything is rough and changes are reflected in the website immediately.
1. In `staging` mode everything is organised into the same structure and handled exactly the same as it would be on a production server. However, caching and other such network based performance enhancements are not applied and the website still reflects any changes made immediately.
1. In `production` mode everything is brushed off and organised appropriately. Caching is applied as well as all other performance enhancements. This is the environment you want to build the files to go to the finalised, live production server.

## Development
In this mode all files are generated for use but not moved or organised into specific places for easy copying to a server.

This means that:

1. JavaScript and SASS files are processed, compiled and concatenated with any library files. The end result of this process are 3 files - a file with everything concatenated, a file with the concatenated file minified, and a map file which maps the code in the concatenated file to its source files.
1. PHP files which are marked for being rendered to HTML are rendered to HTML and output to the same location as its source. The HTML files are then minified.
1. Images are compressed, resized from the originals folder (`/assets/images/originals`) to the parent folder (`/assets/images`). PNG and JP(E)G images have copies converted to WEBP format for much smaller files to be served if WEBP are supported by the client. SVGs are simply copied to the parent folder and then minified - no resizing or conversion necessary.
1. Apache configurations at that point only contain the most basic configurations necessary for the website to behave as similar as possible to how it would behave on the production server. This does not include any network performance enhancements such as browser caching or serving different filetypes if supported.

## Staging
In this mode all files are generated much like in `development` mode and organised into a dist folder.

This means that all `development` mode processes are applied, except:

1. Apache configurations contain what is required for a staging server - network enhancements are applied, but browser caching is not enabled. All changes made to the assets are still reflected immediately.
1. All assets which are generated into their minified versions (app.min.css, app.min.js, minified/compressed/converted/resized images, html files) as well as all PHP assets, favicons, fonts and prepared Apache configurations are copied to a dist folder in the parent of the dev folder (so the root of the project).

## <a name="production-mode"></a>Production
In this mode all files are generated much like in `development` and `staging` modes and organised into a dist folder, exactly like `staging` mode.

All `staging` mode processes are applied, except:

1. Apache configurations contain what is required for a staging server - network enhancements are applied, but browser caching **is** enabled. All changes made to the assets are **not** reflected immediately since the browser will be caching assets - you would need to clear browser cache in order to see latest files.

# Using the Timezones
We have a Timezone database downloaded from [TimezoneDB](https://timezonedb.com/). In order to query and get the correct results, refer to the instructions found on the [download page](https://timezonedb.com/download)
There is a public free [API](https://restcountries.eu/#api-endpoints) which we have access to called [RESTCountries](https://restcountries.eu/). Use the [API](https://restcountries.eu/#api-endpoints) to get any information on a specific or filtered countries.

Possible information to get which is relevant for this project (returned in JSON format):

1. Country Name	|	`"name": "Afghanistan"`
1. Language		|	`"languages": [{"iso639_1": "ps", "iso639_2": "pus", "name": "Pashto", "nativeName": "nativeNameIDon'tUnderstand"}]`
1. Capital City	|	`"capital": "Kabul"`
1. Timezone		|	`"timezones": ["UTC+04:30"]`
1. Flag Icon	|	`"flag": "https://restcountries.eu/data/afg.svg"`
