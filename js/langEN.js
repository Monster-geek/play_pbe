
		$('#JqueryLangFR').html(' <span class="hover">Francais</span> ');
		$('#JqueryLangEN').html('<span class ="selected">English</span>');
		$('.choixlang').html('Choice of language:');
		$('.connexion').html('Connection :');
		$('.Pseudo').html('Username  ');
		$('.pass').html('Password ');
		$('.bouttonCo').html('<span class="hover"><img src="/img/bco.png"></span>');
		$('.recorvery').html('<a href="/sys/recorvery.php">Lost your password ?</a>');
		$('.inscription').html(' Inscription :');
		$('.confirmPass').html('Confirm your password');
		$('.mail').html('E-mail');
		$('.CGU').html("I have read and I accept the ");
		$('#CGUinscri').html('<span class="hover"> ToS </span>');
		$('#CGUfoot').html('<span class="hover"> ToS </span>'); 
		$('.bouttonInscrip').html('<span class="hover"><img src="/img/bco.png" /></span>');
		$('.oblig').html("Items marked with an asterisk (*) are required fields.");
		$('.rules').html("<span class=\"hover\">Game's rules</span>");
		$('.mention').html('<span class="hover">Imprint</span>');
		$('.Patchnotes').html('<span class="hover">Patchnotes</span>');
		$.cookie('IGP', 'EN', { expires: 7, path: '/' });
