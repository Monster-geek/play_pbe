var lang = $.cookie('IGP')

			if (lang == 'FR'){
			$.cookie('IGP', 'EN', { expires: 7, path: '/' });
			}
			else if (lang == 'EN')
			{
			$.cookie('IGP', 'FR', { expires: 7, path: '/' });
			}