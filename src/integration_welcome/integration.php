<?php
//echo "coucou";
function form_demande_entrante($type = "demande-documentation", $domaine = null) {
    echo "<BR>FONCTION form_demande_entrante_MODIFIEEE() OK";
}

function formulaire_demande_entrante($params) {
    //Gerer l'ordre d'affichage des champs
    $champs = array(
        'ambassador',
        'title',
        'firstName',
        'lastName',
        'email',
        'mobilePhoneNumber',
        'fixedPhoneNumber',
        'address',
        'postalCode',
        'city',
        'nationality',
        'country',
        'youAre',
        'isEnterprise',
        'enterpriseAutocomplete',
        'enterprise',
        'desiredProgram',
        'program',
        'admissionLevel',
        'campus',
        'desiredSchool',
        'speciality',
        'theme',
        'currentEstablishmentAutocomplete',
        'currentEstablishment',
        'educationLevel',
        'educationLevelType',
        'educationLevelSpeciality',
        'backToSchool',
        'commentary',
        'consent',
        'source'
    );
    $champs_actifs = array();

    $url_ws = 'https://www.inseec.education//inseecu/fr/api/form/demande-documentation';
    $form = json_decode(file_get_contents($url_ws));
    //print_r($form);
    $content_after_submission = $form->content;
    $tag = $form->tag;
    $fields = $form->fields;
    for ($f = 0; $f < count($fields); $f++) {
        $name = $fields[$f]->name;
        $champs_actifs[$name] = $f;
    }
    $date = new DateTime();
    $timestamp = $date->getTimestamp();
    echo '<script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>';
    echo '<script type="text/javascript" src="/integration_welcome/js/jssha256.js"></script>';
    echo '<script type="text/javascript" src="https://lp.heip.fr/integration_welcome/js/main_welcome.js"></script>';
    // echo '<link rel="stylesheet" type="text/css" href="https://lp.heip.fr/integration_welcome/css/style_welcome.css" />';
    if ($params['nb_colonnes'] == 2) {
        echo '<style type="text/css">';
        echo '
            section.formulaire_welcome .block{
                width : 48%;
                margin-left : 1%;
                margin-right : 1%;
            }';
        echo '</style>';
    }
    if ($params['couleur_1'] != '') {
        echo '<style type="text/css">';
        echo '
            section.formulaire_welcome{
                color : #' . $params['couleur_1'] . ';
            }
            section.formulaire_welcome .block input,
            section.formulaire_welcome .block select{
                border-bottom: solid 1px #' . $params['couleur_1'] . ';
            }';
        echo '</style>';
    }
    if ($params['couleur_2'] != '') {
        echo '<style type="text/css">';
        echo '
            section.formulaire_welcome h3,
            section.formulaire_welcome h2,
            section.formulaire_welcome p strong,
            section.formulaire_welcome .cta:hover,
            section.formulaire_welcome p a{
                color : #' . $params['couleur_2'] . ';
            }
            section.formulaire_welcome .cta{
                background-color: #' . $params['couleur_2'] . ';
                border: solid 2px #' . $params['couleur_2'] . ';
            }
            section.formulaire_welcome .block input[type=submit]{
                background-color: #' . $params['couleur_2'] . ';
            }';
        echo '</style>';
    }
    echo '<section class="formulaire_welcome">';
    echo ' <h2 class="uppercase title-first font-semibold text-center">Demande de rappel</h2>';
    echo '<form method="post" name="formulaire_demande_entrante" id="welcome_form" target="/integration_welcome/ajax_welcome.php"> ';
    echo '<input type="hidden" name="url_ws" value="' . $url_ws . '?timestamp=' . $timestamp . '" />';
    for ($c = 0; $c < count($champs); $c++) {
        if (array_key_exists($champs[$c], $champs_actifs)) {
            $f = $champs_actifs[$champs[$c]];
            $id = $fields[$f]->id;
            $name = $fields[$f]->name;
            $type = $fields[$f]->type;
            $label = $fields[$f]->label;
            $required = $fields[$f]->required;
            $parent = $fields[$f]->parent;
            echo '<div class="block';
            if ($name == 'consent') {
                echo ' full';
            }
            echo '"';
            /* masquer des champs  */
            //if ($name=='desiredProgram'){
            //  echo ' style="display:none;"';
            // }
            echo '>';

            if ($type == 'select') {
                echo '<select name="' . $name . '" id="champ_' . $name . '"';
                echo '>';
                if (($name != 'educationLevelType') && ($name != 'educationLevelSpeciality')) {
                    echo '<option value="">' . $label . '</option>';
                    $values = $fields[$f]->values;
                    for ($v = 0; $v < count($values); $v++) {
                        $val_id = $values[$v]->id;
                        $val_label = $values[$v]->label;
                        $val_parent = $values[$v]->parent;
                        $val_preferred = $values[$v]->preferred;
                        echo '<option value="' . $val_id . '"';
                        /* definir une valeur par defaut */
                        //if (($name == 'desiredProgram') && ($val_id == 1264)){
                        //  echo ' selected';
                        // }
                        echo '>' . $val_label . '</option>';
                    }
                }
                echo '</select>';
            } else if ($type == 'text') {
                if ($name == 'ambassador') {
                    echo '<input type="hidden" name="' . $name . '" value="' . $params['ambassadeur_id'] . '" id="champ_' . $name . '" />';
                } else {
                    echo '<input type="text" name="' . $name . '" value="" id="champ_' . $name . '" placeholder="' . $label . '" />';
                }
            } else if ($type == 'textarea') {
                if ($name == 'commentary') {
                    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    echo '<input type="hidden" name="' . $name . '" value="' . $actual_link . '" id="champ_' . $name . '"/>';
                } else {
                    //echo '<label>'.$label.'</label>';
                    echo '<textarea id="champ_' . $name . '" name="' . $name . '" class="form-control" placeholder="' . $label . '" ' . $required . '></textarea>';
                }
            } else if ($type == 'email') {
                // echo '<label>' . $label . '</label>';
                echo '<input type="email" name="' . $name . '" value="" id="champ_' . $name . '" placeholder="' . $label . '" />';
            } else if ($type == 'hidden') {
                if ($name == 'source') {
                    $value = $_GET['utm_source'] ?? '';
                    if ($value == '') {
                        $value = 'Naturel';
                    }
                }
                echo '<input type="hidden" name="' . $name . '" value="' . $value . '" id="champ_' . $name . '" />';
            } else if ($type == 'checkbox') {
                echo '<label><input type="checkbox" name="' . $name . '" id="champ_' . $name . '" />' . $label . '</label>';
            }
            echo '</div>';
        }
    }
    echo '<div class="block full"><input type="submit" name="sumbit" value="Valider" /></div>';
    echo '</form>';
    echo '</section>';
}
function formulaire_evenements($params) {
    //Gerer l'ordre d'affichage des champs
    $champs = array(
        'event',
        'title',
        'isEnterprise',
        'enterpriseAutocomplete',
        'enterprise',
        'firstName',
        'lastName',
        'email',
        'mobilePhoneNumber',
        'fixedPhoneNumber',
        'address',
        'postalCode',
        'city',
        'country',
        'desiredProgram',
        'program',
        'admissionLevel',
        'campus',
        'educationLevel',
        'educationLevelType',
        'educationLevelSpeciality',
        'currentEstablishmentAutocomplete',
        'currentEstablishment',
        'commentary',
        'consent',
        'source'
    );
    $champs_actifs = array();

    $url_ws = 'https://www.inseec.education//inseecu/fr/api/form/demande-documentation';
    $form = json_decode(file_get_contents($url_ws));
    //print_r($form);
    $content_after_submission = $form->content;
    $tag = $form->tag;
    $fields = $form->fields;
    for ($f = 0; $f < count($fields); $f++) {
        $name = $fields[$f]->name;
        $champs_actifs[$name] = $f;
    }
    echo '<script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>';
    echo '<script type="text/javascript" src="js/jssha256.js"></script>';
    echo '<script type="text/javascript" src="https://' . $params['domaine'] . '/integration_welcome/js/main_welcome.js"></script>';
    // echo '<link rel="stylesheet" type="text/css" href="https://' . $params['domaine'] . '/integration_welcome/css/style_welcome.css" />';
    if ($params['nb_colonnes'] == 2) {
        echo '<style type="text/css">';
        echo '
            section.formulaire_welcome .block{
                width : 48%;
                margin-left : 1%;
                margin-right : 1%;
            }';
        echo '</style>';
    }
    if ($params['couleur_1'] != '') {
        echo '<style type="text/css">';
        echo '
            section.formulaire_welcome{
                color : #' . $params['couleur_1'] . ';
            }
            section.formulaire_welcome .block input,
            section.formulaire_welcome .block select{
                border-bottom: solid 1px #' . $params['couleur_1'] . ';
            }';
        echo '</style>';
    }
    if ($params['couleur_2'] != '') {
        echo '<style type="text/css">';
        echo '
            section.formulaire_welcome h3,
            section.formulaire_welcome h2,
            section.formulaire_welcome p strong,
            section.formulaire_welcome .cta:hover,
            section.formulaire_welcome p a{
                color : #' . $params['couleur_2'] . ';
            }
            section.formulaire_welcome .cta{
                background-color: #' . $params['couleur_2'] . ';
                border: solid 2px #' . $params['couleur_2'] . ';
            }
            section.formulaire_welcome .block input[type=submit]{
                background-color: #' . $params['couleur_2'] . ';
            }';
        echo '</style>';
    }
    echo '<section class="formulaire_welcome">';
    echo '<form method="post" name="formulaire_demande_entrante" id="welcome_form" target="https://' . $params['domaine'] . '/integration_welcome/ajax_welcome.php"> ';
    echo '<input type="hidden" name="url_ws" value="' . $url_ws . '" />';
    for ($c = 0; $c < count($champs); $c++) {
        if (array_key_exists($champs[$c], $champs_actifs)) {
            $f = $champs_actifs[$champs[$c]];
            $id = $fields[$f]->id;
            $name = $fields[$f]->name;
            $type = $fields[$f]->type;
            $label = $fields[$f]->label;
            $contraint = $fields[$f]->contraint;
            $required = $fields[$f]->required;
            $parent = $fields[$f]->parent;
            if ($name == 'event') {
                echo '<div class="block_evenements">';
                $values = $fields[$f]->values;
                for ($v = 0; $v < count($values); $v++) {
                    $val_id = $values[$v]->id;
                    $val_label = $values[$v]->label;
                    $val_parent = $values[$v]->parent;
                    $val_preferred = $values[$v]->preferred;
                    echo '<div class="event_date';
                    if ($v == 0) {
                        echo ' actif';
                    }
                    echo '" name="' . $val_id . '">';
                    $campus = $values[$v]->campus;
                    $location = $values[$v]->location;
                    $start_date = $values[$v]->start_date;
                    $start_time = $values[$v]->start_time;
                    $end_date = $values[$v]->end_date;
                    $end_time = $values[$v]->end_time;

                    echo '</div>';
                }
                echo '</div>';
            }
            echo '<div class="block';
            if ($name == 'consent') {
                echo ' full';
            }
            echo '"';
            /* masquer des champs  */
            if ($name == 'event') {
                echo ' style="display:none;"';
            }
            echo '>';

            if ($type == 'select') {
                echo '<label>' . $label . '</label>';
                echo '<select name="' . $name . '" id="champ_' . $name . '"';
                echo '>';
                if (($name != 'educationLevelType') && ($name != 'educationLevelSpeciality')) {
                    echo '<option value="">Selectionner</option>';
                    $values = $fields[$f]->values;
                    for ($v = 0; $v < count($values); $v++) {
                        $val_id = $values[$v]->id;
                        $val_label = $values[$v]->label;
                        $val_parent = $values[$v]->parent;
                        $val_preferred = $values[$v]->preferred;
                        echo '<option value="' . $val_id . '"';
                        /* definir une valeur par defaut */
                        //if (($name == 'desiredProgram') && ($val_id == 1264)){
                        //  echo ' selected';
                        // }
                        echo '>' . $val_label . '</option>';
                    }
                }
                echo '</select>';
            } else if ($type == 'text') {
                echo '<label>' . $label . '</label>';
                echo '<input type="text" name="' . $name . '" value="" id="champ_' . $name . '" />';
            } else if ($type == 'email') {
                echo '<label>' . $label . '</label>';
                echo '<input type="email" name="' . $name . '" value="" id="champ_' . $name . '" />';
            } else if ($type == 'hidden') {
                if ($name == 'source') {
                    $value = $_GET['utm_source'];
                    if ($value == '') {
                        $value = 'Naturel';
                    }
                }
                echo '<input type="hidden" name="' . $name . '" value="' . $value . '" id="champ_' . $name . '" />';
            } else if ($type == 'checkbox') {
                echo '<label><input type="checkbox" name="' . $name . '" id="champ_' . $name . '" />' . $label . '</label>';
            }
            echo '</div>';
        }
    }
    echo '<div class="block full"><input type="submit" name="sumbit" value="Envoyer" /></div>';
    echo '</form>';
    echo '</section>';
}
function formulaire_contact_ambassadeur($params) {
    //Gerer l'ordre d'affichage des champs
    $champs = array(
        'ambassador',
        'title',
        'isEnterprise',
        'enterpriseAutocomplete',
        'enterprise',
        'firstName',
        'lastName',
        'email',
        'mobilePhoneNumber',
        'fixedPhoneNumber',
        'address',
        'postalCode',
        'city',
        'country',
        'desiredProgram',
        'program',
        'admissionLevel',
        'campus',
        'educationLevel',
        'educationLevelType',
        'educationLevelSpeciality',
        'currentEstablishmentAutocomplete',
        'currentEstablishment',
        'commentary',
        'consent',
        'source'
    );
    $champs_actifs = array();

    $url_ws = 'https://www.inseec.education//inseecu/fr/api/form/demande-documentation';
    $form = json_decode(file_get_contents($url_ws));
    //print_r($form);
    $content_after_submission = $form->content;
    $tag = $form->tag;
    $fields = $form->fields;
    for ($f = 0; $f < count($fields); $f++) {
        $name = $fields[$f]->name;
        $champs_actifs[$name] = $f;
    }
    echo '<script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>';
    echo '<script type="text/javascript" src="js/jssha256.js"></script>';
    echo '<script type="text/javascript" src="https://' . $params['domaine'] . '/integration_welcome/js/main_welcome.js"></script>';
    // echo '<link rel="stylesheet" type="text/css" href="https://' . $params['domaine'] . '/integration_welcome/css/style_welcome.css" />';
    if ($params['nb_colonnes'] == 2) {
        echo '<style type="text/css">';
        echo '
            section.formulaire_welcome .block{
                width : 48%;
                margin-left : 1%;
                margin-right : 1%;
            }';
        echo '</style>';
    }
    if ($params['couleur_1'] != '') {
        echo '<style type="text/css">';
        echo '
            section.formulaire_welcome{
                color : #' . $params['couleur_1'] . ';
            }
            section.formulaire_welcome .block input,
            section.formulaire_welcome .block select{
                border-bottom: solid 1px #' . $params['couleur_1'] . ';
            }';
        echo '</style>';
    }
    if ($params['couleur_2'] != '') {
        echo '<style type="text/css">';
        echo '
            section.formulaire_welcome h3,
            section.formulaire_welcome h2,
            section.formulaire_welcome p strong,
            section.formulaire_welcome .cta:hover,
            section.formulaire_welcome p a{
                color : #' . $params['couleur_2'] . ';
            }
            section.formulaire_welcome .cta{
                background-color: #' . $params['couleur_2'] . ';
                border: solid 2px #' . $params['couleur_2'] . ';
            }
            section.formulaire_welcome .block input[type=submit]{
                background-color: #' . $params['couleur_2'] . ';
            }';
        echo '</style>';
    }
    echo '<section class="formulaire_welcome">';
    echo '<form method="post" name="formulaire_demande_entrante" id="welcome_form" target="https://' . $params['domaine'] . '/integration_welcome/ajax_welcome.php"> ';
    echo '<input type="hidden" name="url_ws" value="' . $url_ws . '" />';
    for ($c = 0; $c < count($champs); $c++) {
        if (array_key_exists($champs[$c], $champs_actifs)) {
            $f = $champs_actifs[$champs[$c]];
            $id = $fields[$f]->id;
            $name = $fields[$f]->name;
            $type = $fields[$f]->type;
            $label = $fields[$f]->label;
            $contraint = $fields[$f]->contraint;
            $required = $fields[$f]->required;
            $parent = $fields[$f]->parent;
            echo '<div class="block';
            if ($name == 'consent') {
                echo ' full';
            }
            echo '"';
            /* masquer des champs  */
            //if ($name=='desiredProgram'){
            //  echo ' style="display:none;"';
            // }
            echo '>';

            if ($type == 'select') {
                echo '<label>' . $label . '</label>';
                echo '<select name="' . $name . '" id="champ_' . $name . '"';

                echo '>';
                if (($name != 'educationLevelType') && ($name != 'educationLevelSpeciality')) {
                    echo '<option value="">Selectionner</option>';
                    $values = $fields[$f]->values;
                    for ($v = 0; $v < count($values); $v++) {
                        $val_id = $values[$v]->id;
                        $val_label = $values[$v]->label;
                        $val_parent = $values[$v]->parent;
                        $val_preferred = $values[$v]->preferred;
                        echo '<option value="' . $val_id . '"';
                        /* definir une valeur par defaut */
                        //if (($name == 'desiredProgram') && ($val_id == 1264)){
                        //  echo ' selected';
                        // }
                        echo '>' . $val_label . '</option>';
                    }
                }
                echo '</select>';
            } else if ($type == 'text') {
                echo '<label>' . $label . '</label>';
                echo '<input type="text" name="' . $name . '" value="" id="champ_' . $name . '" />';
            } else if ($type == 'email') {
                echo '<label>' . $label . '</label>';
                echo '<input type="email" name="' . $name . '" value="" id="champ_' . $name . '" />';
            } else if ($type == 'hidden') {
                if ($name == 'source') {
                    $value = $_GET['utm_source'];
                    if ($value == '') {
                        $value = 'Naturel';
                    }
                }
                echo '<input type="hidden" name="' . $name . '" value="' . $value . '" id="champ_' . $name . '" />';
            } else if ($type == 'checkbox') {
                echo '<label><input type="checkbox" name="' . $name . '" id="champ_' . $name . '" />' . $label . '</label>';
            }
            echo '</div>';
        }
    }
    echo '<div class="block full"><input type="submit" name="sumbit" value="Envoyer" /></div>';
    echo '</form>';
    echo '</section>';
}
