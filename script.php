<?php
session_start();

const HTTP_OK = 200;
const HTTP_BAD_REQUEST = 400;
const HTTP_METHOD_NOT_ALLOWED = 405;

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) == 'XMLHTTPREQUEST') {
	$response_code = HTTP_BAD_REQUEST;
	$message = "Un erreur s'est produite";

	if ($_POST['action'] == "RegisterData") {

		$response_code = HTTP_OK;
		$message = "Tout s'est bien passé";

		$username = $_POST['username'];
		$name = $_POST['name'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$mdp = $_POST['mdp'];
		$complot = $_POST['complot'];

		$chemin_dos = "assets/Data/" . $username;

		mkdir($chemin_dos, 0777, True);

		file_put_contents($chemin_dos . "/other_user.csv","\n");

		$fichier = fopen("assets/Data/data.csv", "a");

		if ($fichier === false) {
			die("Une erreur s'est produite impossible d'ouvrir le fichier");
		}

		$ligne = $username . "," . $mdp . "," . $name . "," . $lastname . "," . $email . "," . $complot . "\n";
		fwrite($fichier, $ligne);

		fclose($fichier);
	}

	if ($_POST['action'] == "LoginData") {

		$response_code = HTTP_OK;
		$message = "Tout s'est bien passé";

		$username = $_POST['username'];
		$mdp = $_POST['password'];

		$fichier = fopen("assets/Data/data.csv", "r");

		if ($fichier === false) {
			die("Une erreur s'est produite impossible d'ouvrir le fichier");
		}

		$users = array();
		$mdps = array();
		$emails = array();
		$names = array();
		$lastnames = array();
		$complots = array();

		while (!feof($fichier)) {
			list($users[], $mdps[], $names[], $lastnames[], $emails[], $complots[]) = fgetcsv($fichier);
		}

		$number = 0;
		for ($i = 0; $i < sizeof($users); $i++) {
			if ($username == $users[$i] && $mdp == $mdps[$i]) {
				$number = 1;
				$_SESSION['LOGGED_USER'] = $username;
			}
		}

		fclose($fichier);

		if ($number == 0) {
			$response_code = HTTP_OK;
			$message = "incorect_mdp/Mauvais username ou mdp";
		}
	}

	if ($_POST["action"] == "edit_profile_data") {

		// sert plus a rien mais a voir si on peut faire une erreur comme ca
		if (!isset($_SESSION['LOGGED_USER'])) {
			$response_code = HTTP_OK;
			$message = "Assurez vous d'etre bien connecté";
		}
		else {

			$user = $_SESSION['LOGGED_USER'];

			$fichier = fopen("assets/Data/data.csv", "r");

			if ($fichier === false) {
				die("erreur");
			}

			$users = $mdps = $names = $lastnames = $emails = $complots = [];

			while (!feof($fichier)) {
				list($users[], $mdps[], $names[], $lastnames[], $emails[], $complots[]) = fgetcsv($fichier);
			}

			fclose($fichier);

			$type  = $_POST["type"];
			$value = $_POST["contenu"];


			for ($i = 0; $i < sizeof($users); $i++) {
				if ($user == $users[$i]) {
					if ($type == "name") {
						$names[$i] = $value;
					}
					if ($type == "lastname") {
						$lastnames[$i] = $value;
					}
					if ($type == "email") {
						$emails[$i] = $value;
					}
					if ($type == "mdp") {
						$mdps[$i] = $value;
					}
				}
			}

			$fichier = fopen("assets/Data/data.csv", "w");
			for ($i = 0; $i < sizeof($users) - 1; $i++) {
				$ligne = $users[$i] . "," . $mdps[$i] . "," . $names[$i] . "," . $lastnames[$i] . "," . $emails[$i] . "," . $complots[$i] . "\n";
				fwrite($fichier, $ligne);;
			}
			fclose($fichier);

			$response_code = HTTP_OK;
			$message = "ok";
		}
	}

	if ($_POST["action"] == "deco") {
		$message = "ok";
		$response_code = HTTP_OK;
		session_destroy();
	}

	if ($_POST["action"] == "next") {

		$fichier = fopen("assets/Data/" . $_SESSION['LOGGED_USER'] . "/other_user.csv", "r");

		$o_users = $o_complots = $o_friends = $o_swips = $o_bloque = [];

		if ($fichier === false) {
			die("impossible d'ouvrir le fichier");
		}

		while (!feof($fichier)) {
			list($o_users[], $o_complots[], $o_friends[], $o_swips[], $o_bloque[]) = fgetcsv($fichier);
		}

		fclose($fichier);



		if ($_POST['begin'] == 0) {
			$no_user = 0;
			for ($i = 0; $i < sizeof($o_users) - 1; $i++) {
				if ($o_swips[$i] != 1) {
					$response_code = HTTP_OK;
					$message = $o_users[$i] . "/" . $o_complots[$i];
					$no_user = 1;
					break;
				}
			}

			if($no_user == 0){
				$response_code = HTTP_OK;
				$message = "Oups/Il n'y a plus d'utilisateur";
			}
		}

		if ($_POST['begin'] == 1) {

			$all_profil = 0;
			for ($i = 0; $i < sizeof($o_users) - 1; $i++) {
				if ($o_users[$i] == $_POST["user_swip"]) {
					$o_swips[$i] = 1;
				}
				if ($o_swips[$i] != 1) {
					$response_code = HTTP_OK;
					$message = $o_users[$i] . "/" . $o_complots[$i];
					$all_profil = 1;
				}
			}

			$fichier = fopen("assets/Data/" . $_SESSION['LOGGED_USER'] . "/other_user.csv", "w");

			for ($i = 0; $i < sizeof($o_users) - 1; $i++) {
				$ligne = $o_users[$i] . "," . $o_complots[$i] . "," . $o_friends[$i] . "," . $o_swips[$i] . "," . $o_bloque[$i] . "\n";
				fwrite($fichier, $ligne);
			}

			fclose($fichier);

			if ($all_profil == 0) {
				$response_code = HTTP_OK;
				$message = "Oups/Il n'y a plus d'utilisateur";
			}
		}

		if ($_POST['begin'] == 2) {

			$all_profil = 0;
			for ($i = 0; $i < sizeof($o_users) - 1; $i++) {
				if ($o_users[$i] == $_POST["user_swip"]) {
					$o_swips[$i] = 1;
					$o_friends[$i] = 1;
				}
				if ($o_swips[$i] != 1) {
					$response_code = HTTP_OK;
					$message = $o_users[$i] . "/" . $o_complots[$i];
					$all_profil = 1;
				}
			}

			$fichier = fopen("assets/Data/" . $_SESSION['LOGGED_USER'] . "/other_user.csv", "w");

			for ($i = 0; $i < sizeof($o_users) - 1; $i++) {
				$ligne = $o_users[$i] . "," . $o_complots[$i] . "," . $o_friends[$i] . "," . $o_swips[$i] . "," . $o_bloque[$i] . "\n";
				fwrite($fichier, $ligne);
			}

			fclose($fichier);

			if ($all_profil == 0) {
				$response_code = HTTP_OK;
				$message = "Oups/Il n'y a plus d'utilisateur";
			}
		}
	}

	if ($_POST["action"] == "upload_img")
	{
		$response_code = HTTP_OK;
		$message = "ok on est deja la";
		if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {

		    $fileTmpPath = $_FILES['image']['tmp_name'];
	    	                
	        // Créez le chemin complet du fichier de destination
	        $chemin_to_up = "assets/Data/" . $_SESSION['LOGGED_USER'] ."/img_profile.png" ;

	        // Déplacez le fichier téléchargé vers le répertoire de destination
	        if (move_uploaded_file($fileTmpPath, $chemin_to_up)) {
	            $message = 'Image upload';
	        } else {
	            $message = 'Probleme force a toi';
	        }
    	} else {
		    $message = 'Error:';
		}

	}

	response($response_code, $message);

} else {
	$response_code = HTTP_METHOD_NOT_ALLOWED;
	$message = "Method not allowed";

	response($response_code, $message);
}

function response($response_code, $message)
{
	header('Content-Type: application/json');
	http_response_code($response_code);

	$response = [
		"response_code" => $response_code,
		"message" => $message,
	];

	echo json_encode($response);
}
