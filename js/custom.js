function activeMenu(page) {
	switch(page) {
		case 'film':
			$('#nav ul li:nth-of-type(1)').addClass('active');
			break;
		case 'web':
			$('#nav ul li:nth-of-type(2)').addClass('active');
			break;
		case 'photo':
			$('#nav ul li:nth-of-type(3)').addClass('active');
			break;
	}
}