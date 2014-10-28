
var lang = $.cookie('IGP'); 

if (lang == undefined){
	$.cookie('IGP', 'FR', { expires: 7, path: '/' });
	}

var lang = $.cookie('IGP');
	
if (lang == 'FR'){
		$.getScript('./js/langFR.js');
	
	}
else if(lang == 'EN'){
		$.getScript('./js/langEN.js');
		
	}
