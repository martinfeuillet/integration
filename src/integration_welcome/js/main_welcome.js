$(document).ready(function(){
	console.log($('#champ_ambassador').val());
	if ($('#champ_ambassador').length > 0){
		var type_tag = 'AMBASSADEURS';
	}else{
		var type_tag = 'DOCUMENTATION';
	}
	console.log(type_tag);
	$( "#welcome_form" ).submit(function( event ) {
		console.log( "Handler for .submit() called." );
		event.preventDefault();
		$("input[type=submit]").attr('disabled', 'disabled');

		var $this = $(this);
		var desiredProgram = $('#champ_desiredProgram').val();
		var sel = document.getElementById("champ_desiredProgram");
		var sel2 = document.getElementById("champ_campus");
		if (sel != null) {
			var program_content = sel.options[sel.selectedIndex].text;
		} else {
		 var program_content = '';
	 	}
		if (sel2 != null) {
			var campus_content = sel2.options[sel2.selectedIndex].text;
		} else {
			var campus_content = '';
		}

		var data = {
      "url_ws" : $('input[name="url_ws"]').val(),
      "title":  $('#champ_title').val(),
      "lastName": $('#champ_lastName').val(),
      "firstName": $('#champ_firstName').val(),
      "email": $('#champ_email').val(),
      "mobilePhoneNumber":  $('#champ_mobilePhoneNumber').val(),
      "fixedPhoneNumber": $('#champ_fixedPhoneNumber').val(),
      "address": $('#champ_address').val(),
      "postalCode": $('#champ_postalCode').val(),
      "city": $('#champ_city').val(),
      "nationality": $('#champ_nationality').val(),
      "country": $('#champ_country').val(),
      "youAre": $('#champ_youAre').val(),
      "isEnterprise": $('#champ_isEnterprise').val(),
      "enterpriseAutocomplete": $('#champ_enterpriseAutocomplete').val(),
      "enterprise": $('#champ_enterprise').val(),
      "desiredProgram": $('#champ_desiredProgram').val(),
      "program": $('#champ_program').val(),
      "admissionLevel": $('#champ_admissionLevel').val(),
      "campus": $('#champ_campus').val(),
      "desiredSchool": $('#champ_desiredSchool').val(),
      "speciality": $('#champ_speciality').val(),
      "theme": $('#champ_theme').val(),
      "currentEstablishmentAutocomplete": $('#champ_currentEstablishmentAutocomplete').val(),
      "currentEstablishment": $('#champ_currentEstablishment').val(),
      "educationLevel": $('#champ_educationLevel').val(),
      "educationLevelType": $('#champ_educationLevelType').val(),
      "educationLevelSpeciality": $('#champ_educationLevelSpeciality').val(),
      "backToSchool": $('#champ_backToSchool').val(),
      //"commentary": $('#champ_commentary').val(),
      "consent": $('#champ_consent').val(),
      "source": $('#champ_source').val(),
    };

		$.ajax({
			url : $this.attr('target'),
			type : "post",
			data : data,
			cache : false,
			dataType : 'json',
			success : function(json){
				if (json.erreurs.length > 0){
					console.log('erreur');
					$('input').css('border', 'none');
					$('select').css('border', 'none');
					var tableau_champs_erreur=json.erreurs;
					//console.log(json.erreurs);
					$.each(tableau_champs_erreur, function( index, value ) {
						$('#champ_'+value).css('border', 'solid 1px #ef473c');
					});
					$("input[type=submit]").removeAttr('disabled');
					//alert('Merci de renseigner tous les champs obligatoires');
				}else{
					console.log('pas d-erreur');
					if (json.success){
						console.log('success true');
						var mail = $('#champ_email').val();
            mail = digest_hex = SHA256_hash(mail);

						// GTM
						dataLayer.push({
							'event': 'conversion',
							'reference' : Date.now(),
							'mail' : data.email,
							'path' : window.location.pathname,
							'formCategory' : 'DOCUMENTATION',
							'program': program_content,
							'campus' : campus_content,
							'schoolCity' : data.city,
							'jpoCity' : data.event,
							'backToSchool' : data.backToSchool,
							'backToSchoolYear' : data.backToSchoolYear,
							'admissionLevel' : data.admissionLevel,
							'source' : data.source,
						});

						$('.formulaire_welcome').html(json.message);

						(function(e,a){
		          var i=e.length,y=5381,k='script',s=window,v=document,o=v.createElement(k);
		            for(;i;){i-=1;y=(y*33)^e.charCodeAt(i)}y='_EA_'+(y>>>=0);
		            (function(e,a,s,y){s[a]=s[a]||function(){(s[y]=s[y]||[]).push(arguments);s[y].eah=e;};}(e,a,s,y));
		            i=new Date/1E7|0;o.ea=y;y=i%26;o.async=1;o.src='//'+e+'/'+String.fromCharCode(97+y,122-y,65+y)+(i%1E3)+'.js?2';
		            s=v.getElementsByTagName(k)[0];s.parentNode.insertBefore(o,s);})('dxe2.heip.fr','EA_push');
		          EA_push(
		          'uid', mail //mail hashé SHA-256//
		          ,'ref', Date.now() //timestamp//
		          ,'estimate','1' //valeur 1 immuable//
		          ,'type', 'DOCUMENTATION'+' '+program_content
		          ,'path', window.location.pathname //URI (doit être unique à chaque page)//
		          ,'pagegroup','FORMULAIRE'
		          ,'ville-ecole', data.city //null si l’information n’est pas disponible//
		          ,'ville-jpo', data.event //null si l’information n’est pas disponible//
		          ,'campus', campus_content//null si l’information n’est pas disponible//
		          ,'niveau-entree', data.admissionLevel//null si l’information n’est pas disponible//
		          ,'annee-entree', data.backToSchoolYear//null si l’information n’est pas disponible//
		          ,'date-rentree', data.backToSchool//null si l’information n’est pas disponible//
		          ,'choix-programme', program_content//null si l’information n’est pas disponible//
		          ,'source', data.source//null si l’information n’est pas disponible//
						);
						//SI LEAD (documentation, jpo ou candidature, etc) === CANDIDATURE PAR EXEMPLE
							/**if (typeof abtasty !== 'undefined') {
		            console.log('ABtasty Ok');
	              abtasty.send("transaction", {
								  tid: mail, //Transaction ID
								  ta: "Global Lead generation", //Transaction Affiliation - Name of the transaction goal
								  tr: 1, //Transaction Revenue => Sauf si vous connaissez la valeur moyenne de vos leads
								  tc: "EUR", //Transaction Currency
								  icn: 1 //Number of items
								});
	              abtasty.send("transaction", {
	                tid: mail, //Transaction ID
	                ta: "Lead generation - "+type_tag_eulerian, //Transaction Affiliation - Name of the transaction goal
	                tr: 1, //Transaction Revenue => Sauf si vous connaissez la valeur moyenne de vos leads
	                tc: "EUR", //Transaction Currency
	                icn: 1 //Number of items
	              });
							}**/
					}else{
						console.log('error');
					}
				}
			}
		});
	});

	$('#champ_educationLevel').change(function(){
		if ($('#champ_educationLevelType').length > 0){
			var educationLevel = $(this).val();
			$.ajax({
				url : "ajax.php",
				type : "post",
				data : 'form_type=get_educationLevelType&educationLevel='+educationLevel,
				cache : false,
				dataType : 'json',
				success : function(json){
					$('#champ_educationLevelType').html(json.options);
				}
			});
		}else{
			console.log('pas trouvé');
		}
	});

	$('#champ_educationLevelType').change(function(){
		if ($('#champ_educationLevelSpeciality').length > 0){
			var educationLevelType = $(this).val();
			$.ajax({
				url : "ajax.php",
				type : "post",
				data : 'form_type=get_educationLevelSpeciality&educationLevelType='+educationLevelType,
				cache : false,
				dataType : 'json',
				success : function(json){
					$('#champ_educationLevelSpeciality').html(json.options);
				}
			});
		}else{
			console.log('pas trouvé');
		}
	});
});
