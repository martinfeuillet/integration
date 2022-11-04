

function getForm () {

    $.getJSON("https://www.heip.fr/integration_welcome/test/assets/json/demande-documentation.json", function(data){

      // On recupere le champs
      for (var i = 0; i < data.fields.length; i++){
        var options = '';

        // Si attribut required est true
        if (data.fields[i].required == true) {
          required = 'required="required"';
        } else {
          required = '';
        }

        //En fonction du type de champs

        // Champs select
        if (data.fields[i].type == 'select') {
          for (var z = 0; z < data.fields[i]['values'].length; z++) {
            options += '<option value="'+data.fields[i]['values'][z].id+'">'+data.fields[i]['values'][z].label+'</option>';
          }
          item = '<div class="block">'+
                    '<label>'+data.fields[i].label+'</label><select id="'+data.fields[i].name+'" name="'+data.fields[i].name+'" value="" '+required+' /></select></div>';
        }

        // Champs input type hidden
        if (data.fields[i].type == 'hidden') {
          item = '<input type="'+data.fields[i].type+'" name="'+data.fields[i].name+'" value="" '+required+' />';
        }

        // Champs input type checkbox
        if (data.fields[i].type == 'checkbox') {
          item = '<div class="block full"><label><input type="'+data.fields[i].type+'" name="'+data.fields[i].name+'" value="" '+required+' />'+data.fields[i].label+'</label></div>';
        }

        // Champs input type text ou email
        if (data.fields[i].type == 'text' || data.fields[i].type == 'email') {
          item = '<div class="block"><label>'+data.fields[i].label+'</label><input type="'+data.fields[i].type+'" name="'+data.fields[i].name+'" value="" '+required+' /></div>';
        }

        // Envoi pour affichage dans le formulaire
        $('#welcome_form input[name="url_ws"]').after(item);
        $( '#'+data.fields[i].name).append('<option value="">Selectionner</option>'+options);


      }
    }).fail(function(){
      console.log("Erreur de chargement du formulaire.");
    });

}

getForm();

function submitForm () {

  $('#welcome_form').submit( function(e) {

    e.preventDefault();

    var str = $(this).serialize();

    $.ajax({
        url: 'http://inseec.fr/integration_welcome/ajax_welcome.php',
        type: "POST",
        data: str,
        dataType: 'json',
        success: function(data){

          alert(str);

        },
        error: function(){
          alert("Erreur sur l'application merci de contacter le service informatique");
        }
      });

  });

}

submitForm();
