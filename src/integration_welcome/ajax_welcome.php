<?php
//var_dump($_POST);
$url_ws=$_POST['url_ws'];
$form = json_decode(file_get_contents($url_ws));

$reponse['form_type']=$_POST['form_type'];

$fields=$form->fields;

if ($reponse['form_type'] == 'get_educationLevelType'){
	$educationLevel=$_POST['educationLevel'];
	$reponse['options']='<option value="">Select</option>';
	for($f=0 ; $f<count($fields) ; $f++){
		$id=$fields[$f]->id;
		$name=$fields[$f]->name;
		$parent=$fields[$f]->parent;
		if ($name == 'educationLevelType'){
            $values=$fields[$f]->values;
			for($v=0 ; $v<count($values) ; $v++){
				$val_id=$values[$v]->id;
				$val_label=$values[$v]->label;
				$val_parent=$values[$v]->parent;
				$val_preferred=$values[$v]->preferred;
				if ($val_parent == $educationLevel){
					$reponse['options'].='<option value="'.$val_id.'">'.$val_label.'</option>';
				}
			}
		}
	}
}else if ($reponse['form_type'] == 'get_educationLevelSpeciality'){
	$educationLevelType=$_POST['educationLevelType'];
	$reponse['options']='<option value="">Select</option>';
	for($f=0 ; $f<count($fields) ; $f++){
		$id=$fields[$f]->id;
		$name=$fields[$f]->name;
		$parent=$fields[$f]->parent;
		if ($name == 'educationLevelSpeciality'){
            $values=$fields[$f]->values;
			for($v=0 ; $v<count($values) ; $v++){
				$val_id=$values[$v]->id;
				$val_label=$values[$v]->label;
				$val_parent=$values[$v]->parent;
				$val_preferred=$values[$v]->preferred;
				if ($val_parent == $educationLevelType){
					$reponse['options'].='<option value="'.$val_id.'">'.$val_label.'</option>';
				}
			}
		}
	}
}else{
	$reponse['erreurs']=array();
	//Laisser vide pour utiliser le message de remerciement welcome
	$reponse['message']='';
	$data=array();
	for($f=0 ; $f<count($fields) ; $f++){
		$id=$fields[$f]->id;
		$name=$fields[$f]->name;
		$type=$fields[$f]->type;
		$label=$fields[$f]->label;
		$contraint=$fields[$f]->contraint;
		$required=$fields[$f]->required;
		$parent=$fields[$f]->parent;

		if ($required){
			if (strlen($_POST[$name]) < 1 ){
				$reponse['erreurs'][] = $name;
			}else{
				if ($name == 'email'){
					if (!filter_var($_POST[$name], FILTER_VALIDATE_EMAIL)){ $reponse['erreurs'][] = 'email'; }
				}
				// traiter contraintes
			}
		}
		$data[$name]=$_POST[$name];
	}

	if (count($reponse['erreurs']) < 1){
		// Method: POST, PUT, GET etc
		// Data: array("param" => "value") ==> index.php?param=value

		function CallAPI($method, $url, $data = false){
		    $curl = curl_init();

		    switch ($method){
		        case "POST":
		            curl_setopt($curl, CURLOPT_POST, 1);

		            if ($data)
		                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		            break;
		        case "PUT":
		            curl_setopt($curl, CURLOPT_PUT, 1);
		            break;
		        default:
		            if ($data)
		                $url = sprintf("%s?%s", $url, http_build_query($data));
		    }

		    // Optional Authentication:
		    //curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		    //curl_setopt($curl, CURLOPT_USERPWD, "username:password");

		    curl_setopt($curl, CURLOPT_URL, $url);
		    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		    $result = curl_exec($curl);

		    curl_close($curl);

		    return $result;
		}


		$reponse_api=json_decode(CallAPI('POST', $url_ws, $data));
		//print_r($reponse_api);
		$reponse['success'] = $reponse_api->success;
		if ($reponse['message'] == ''){
			$reponse['message']=$reponse_api->message;
		}

		$reponse['tag']=$reponse_api->tag;
	}
	//print_r($reponse);
}

echo json_encode($reponse);
