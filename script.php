<?php
session_start();

const HTTP_OK = 200;
const HTTP_BAD_REQUEST = 400;
const HTTP_METHOD_NOT_ALLOWED = 405;

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) == 'XMLHTTPREQUEST')
{
	$response_code = HTTP_BAD_REQUEST;
	$message = "Un erreur s'est produite";

	if($_POST['action'] == "RegisterData")  
	{	

		$response_code = HTTP_OK;
		$message = "Tout s'est bien passé";

		$username = $_POST['username'];
		$name = $_POST['name'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$mdp = $_POST['mdp']; 
		$complot = $_POST['complot'];


		$fichier = fopen("assets/Data/data.csv", "a");

		if ($fichier === false){
			die("Une erreur s'est produite impossible d'ouvrir le fichier");
		}

		$ligne = $username .",". $mdp .",". $name .",". $lastname .",". $email .",". $complot ."\n";
		fwrite($fichier, $ligne);

		fclose($fichier);

	}

	if($_POST['action'] == "LoginData")
	{	

		$response_code = HTTP_OK;
		$message = "Tout s'est bien passé";

		$username = $_POST['username'];
		$mdp = $_POST['password'];

		$fichier = fopen("assets/Data/data.csv", "r");

		if ($fichier === false){
			die("Une erreur s'est produite impossible d'ouvrir le fichier");
		}

		$users = array();
		$mdps = array();
		$emails = array();
		$names = array();
		$lastnames = array();
		$complots = array();

		while (!feof($fichier)) {
			list($users[],$mdps[],$names[],$lastnames[],$emails[], $complots[] ) = fgetcsv($fichier);
		}

		$number = 0;
		for ($i = 0; $i < sizeof($users);$i++){
			if ($username == $users[$i] && $mdp == $mdps[$i]){
				$number = 1;
				$_SESSION['LOGGED_USER'] = $username;
			}
		}

		fclose($fichier);

		if($number == 0){
			$response_code = 343;
			$message = "Mauvais username ou mdp";
		}

	}

	if ($_POST["action"] == "edit_profile_data")
	{
		// sert plus a rien mais a voir si on peut faire une erreur comme ca
		if(!isset($_SESSION['LOGGED_USER'])){
		    $response_code = 756;
		    $message = "Assurez vous d'etre bien connecté";
		}
		else
		{

		$user = $_SESSION['LOGGED_USER'];

		$fichier = fopen("assets/Data/data.csv", "r");

		if ($fichier === false){
			die("erreur");
		}

		$users = $mdps = $names = $lastnames = $emails = $complots = [];

		while (!feof($fichier)) {
			list($users[],$mdps[],$names[],$lastnames[],$emails[], $complots[] ) = fgetcsv($fichier);
		}

		fclose($fichier);

		$type  =$_POST["type"];
		$value =$_POST["contenu"];

		

		for ($i = 0; $i < sizeof($users);$i++){
			if ($user == $users[$i]){
				if($type == "name"){
					$names[$i] = $value;
				}
				if($type == "lastname"){
					$lastnames[$i] = $value;
				}
				if($type == "email"){
					$emails[$i] = $value;
				}
			}
		}

		$fichier = fopen("assets/Data/data.csv", "w");
		for ($i = 0; $i < sizeof($users)-1; $i++) {
		    $ligne = $users[$i] .",". $mdps[$i] .",". $names[$i] .",". $lastnames[$i] .",". $emails[$i] .",". $complots[$i] ."\n";
			fwrite($fichier, $ligne);;
		}
		fclose($fichier);
		}

	}

	if ($_POST["action"] == "deco")
	{
		session_destroy();
	}

	if ($_POST["action"] == "next")
	{


		$fichier = fopen("assets/Data/".$_SESSION['LOGGED_USER']."/other_user.csv", "r");

		$o_users = $o_complots = $o_friends = $o_swips = $o_bloque = [];

		if ($fichier === false){
		    die("impossible d'ouvrir le fichier");
		}

		while (!feof($fichier)) {
		    list($o_users[],$o_complots[],$o_friends[],$o_swips[],$o_bloque[]) = fgetcsv($fichier);
		}

		fclose($fichier);

		if($_POST['begin'] == 0){

			for ($i = 0; $i < sizeof($o_users)-1;$i++){
			    if($o_swips[$i] != 1){
			        $response_code = 555;
			        $message = $o_users[$i]."/".$o_complots[$i];
			        break;
			    }
			}
		}

		if($_POST['begin'] == 1){

			for ($i = 0; $i < sizeof($o_users)-1;$i++){
			    if($o_users[$i] == $_POST["user_swip"]){
			        $o_swips[$i] = 1;
			    }
			    if($o_swips[$i] != 1){
			        $response_code = 555;
			        $message = $o_users[$i]."/".$o_complots[$i];
			    }
			}
		}			
	}

	response($response_code, $message);

}
else
{
	$response_code = HTTP_METHOD_NOT_ALLOWED;
	$message = "Method not allowed";

	response($response_code, $message);
}

function response($response_code, $message)
{
	header('Content-Type: application/json');
	http_response_code($reponse_code);

	$response = [
		"response_code" => $response_code,
		"message" => $message,
	];

	echo json_encode($response);
}