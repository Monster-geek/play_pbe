(function ($) {
	// DOM Ready
	$(function () {
	

		// Popup CGU pied de page
		
		$('#CGUfoot').bind('click', function (e) {
			e.preventDefault();
			$('#Popup').bPopup({
				loadUrl: 'cgu_resc.php',
				contentContainer: '#contain',
			});
		});
		
		
		// Popup CGU module d'inscription
		
		$('#CGUinscri').bind('click', function (e) {
			e.preventDefault();
			$('#Popup').bPopup({
				loadUrl: 'cgu_resc.php',
				contentContainer: '#contain',
			});
		});
		
		//Popup Patchlog
		$('#Version').bind('click', function (e) {
			e.preventDefault();
			$('#Popup').bPopup({
				loadUrl: 'patchnote.php',
				contentContainer: '#contain',
			});
		});
		
		// Popup Règles
		$('#JqueryRegles').bind('click', function (e) {
			e.preventDefault();
			$('#Popup').bPopup({
				loadUrl: 'regles.php',//old : regles.php
				contentContainer: '#contain',
			});
		});
		// Popup Mentions Légales
		$('#JqueryMention').bind('click', function (e) {
			e.preventDefault();
			$('#Popup').bPopup({
				loadUrl: 'mention.php',
				contentContainer: '#contain',
			});
		});
		// Popup Copyright
		$('#JqueryCopy').bind('click', function (e) {
			e.preventDefault();
			$('#Popup').bPopup({
				loadUrl: 'copy.php',
				contentContainer: '#contain',
			});
		});
		
		//Changement de Langue vers FR
		$('#JqueryLangFR').bind('click', function (e) {
			e.preventDefault();
			$.getScript('/js/langFR.js');
		});
		
		//Changement de Langue vers EN
		$('#JqueryLangEN').bind('click', function (e) {
			e.preventDefault();
			$.getScript('/js/langEN.js');
		});
		
		// Info username
		$('#HelpUserName').hover(function () {
			$('#msgbox-name').removeClass().addClass('messagebox').text('Le pseudo doit être long de 3 à 16 caractère maximum').fadeIn("slow");
			},
			function(){
			$('.messagebox').removeClass().hide();
			}
		);
		// info MDP
		$('#HelpPass').hover(function () {
			$('#msgbox-mdp').removeClass().addClass('messagebox').text('Le mot de passe doit être compris entre 6 et 30 caractères, comporter des chiffres et des caractères spéciaux.').fadeIn("slow");
			},
			function(){
			$('.messagebox').removeClass().hide();
			}
		);
 		
		//Controle de la validité des pseudo

		
		
		//gestion connection
		$('.bouttonCo').click(function(e){
			e.preventDefault();
			$('#Popup').bPopup({
				loadUrl : '/sys/sys_login.php?login=login&username='+$('#username').val()+'&pass='+$('#pass').val(),
				contentContainer: '#contain'
			});
		});
		
		
		//nouvelle gestion inscription
		$('.bouttonInscrip').click(function(e){
			e.preventDefault();
			is_ok = $('#CGUJquery').is(':checked');
			if ( is_ok == true){
			val_CGU = 'ok';
			}
			else
			{
			val_CGU = 'nope';
			}
			if ( $('#mail').val() != undefined){
				val_mail = '&mail='+$('#mail').val();
			}
			else
			{
				val_mail = '';
			}
			$('#Popup').bPopup({
				loadUrl: './sys/sys_inscrip.php?inscrip=ok&newPseudo='+$('#NewPseudo').val()+'&newPass='+$('#NewPass').val()+'&confirmPass='+$('#confirmPass').val()+'&mail='+$('#mail').val()+'&CGU='+val_CGU,//old : regles.php
				contentContainer: '#contain'
			});
		});
	});
})(jQuery);

/*
$("#username").blur(function(){
	$("#msgbox").removeClass().addClass('messagebox').text('Check en cours...').fadeIn("slow");
	$.post("./sys/sys_pseudo.php" ,{ pseudo:$(this).val() } ,function(data)
	{
		if(data=='no')
	{
	$("#msgbox").fadeTo(200,0.1,function()
	{
	$(this).html('Ce pseudo est d‚j… pris').addClass('busy').fadeTo(900,1);
	});
	}
	else
	{
	$("#msgbox").fadeTo(200,0.1,function()
	{
	$(this).html('Ce pseudo est disponible').addClass('dispo').fadeTo(900,1);
	});
	}
	});
});

*/