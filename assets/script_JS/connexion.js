
function cards_register(complot) {

	var scroll_boc = document.getElementById("scroll_box_reg");

	var all_div_cards = scroll_boc.querySelectorAll(':scope > div');

	all_div_cards.forEach(function (div) {

		if (complot == div.getAttribute('value')) {

			div.id = "selected";
			div.className = "selected";
		}
		else {
			div.id = "not_selected";
			div.className = "conspiration-card";
		}

	});
}

function error_register(text){

	var div_error_reg = document.getElementById("erreur_message_register");
	div_error_reg.innerHTML = "";

	var elem_center = document.createElement("center");
	var elem_span = document.createElement("span");
	var textNode = document.createTextNode(text);

	elem_span.appendChild(textNode);
	elem_span.classList.add("red");
	elem_center.appendChild(elem_span);
	div_error_reg.appendChild(elem_center);

}

function empty(value)
{
	return(
		value === undefined || value === null || value === "" || value === false
		)
}

function register() {
	
	event.preventDefault();

	//récupération des variables 

	var name = document.getElementById("name_register").value;
	var lastname = document.getElementById("lastname_register").value;
	var username = document.getElementById("username_register").value;
	var email = document.getElementById("email_register").value;
	var mdp1 = document.getElementById("password1_register").value;
	var mdp2 = document.getElementById("password2_register").value;
	var complot_cards = document.getElementById("selected");

	if (complot_cards) {
		var complot = document.getElementById("selected").getAttribute('value');
	}
	else {
		error_register("Veuillez selectionnez un complot");
		return 1;
	}

	// Vérifier que chaque champs est remplit (non vide)

	if(empty(name) || empty(lastname) || empty(username) || empty(email) || empty(mdp1) || empty(mdp2)){
		error_register("Tous les champs sont obligatoires");
		return 1;
	}

	//username seulement lettre et chiffre

	if (!(/^[a-zA-Z0-9]*$/.test(username))) {

    	error_register("Le pseudo ne peut contenir que des lettres ou des chifres");
    	document.getElementById("username_register").value = "";

    	return 1;
	}

	if (!(/^[a-zA-Z]*$/.test(name))) {

    	error_register("Merci de rentré un prénom valide");
    	document.getElementById("name_register").value = "";

    	return 1;
	}

	if (!(/^[a-zA-Z]*$/.test(lastname))) {

    	error_register("Merci de rentré un nom valide");
    	document.getElementById("lastname_register").value = "";

    	return 1;
	}

	// username n'existe pas dans la base de donnée
	// email n'existe pas dans la base de donné

	

	// Si les 2 mdp sont différent on renvoie une erreur
	if (mdp1 != mdp2) {

		error_register("Les mots de passes ne sont pas identiques");
		document.getElementById("password1_register").value = "";
		document.getElementById("password2_register").value = "";

		return 1;
	}

	//password compris entre 5 et 20 caratères
	if((mdp1.lenght < 5) && (mdp1.lenght > 20)){

		error_register("Les mots de passes doivent etre compris entre 5 et 20 caractères");
		document.getElementById("password1_register").value = "";
		document.getElementById("password2_register").value = "";

		return 1;

	}

	// Verif si le mail ressemble a un mail valide
	var verif_mail = email.split("@");

	if(empty(verif_mail[0]) || empty(verif_mail[1]) ){

		error_register("Merci d'entrer un mail valide");
		document.getElementById("email_register").value = "";
		return 1;
	}
	else{
		var verif_mail2 = verif_mail[1].split(".");
		if(empty(verif_mail2[0]) || empty(verif_mail2[1]) ){
			error_register("Merci d'entrer un mail valide");
			document.getElementById("email_register").value = "";
			return 1;
		}
	}



	//AJAX
	$.ajax({
		type: "POST",
		url: "../../script.php",
		data: {
			action: "RegisterData",
			username: username,
			mdp: mdp1,
			name: name,
			lastname: lastname,
			email: email,
			complot: complot
		},
		dataType: "json",

		success: function () {
			window.location.href = "login.php";
		},
		error: function () {
			console.log("erreur");
		}
	})
}

function login() {

	event.preventDefault();

	var username = document.getElementById("username_loginpage").value;
	var password = document.getElementById("password_loginpage").value;

	$.ajax({
		type: "POST",
		url: "../../script.php",
		data: {
			action: "LoginData",
			username: username,
			password: password
		},
		dataType: "json",

		success: function (response) {

			var resp = response.message.split("/");
			
			if (response.response_code == 200){

				if(resp[0] == "incorect_mdp"){
					var div_err_log = document.getElementById("erreur_message");
					div_err_log.innerHTML = "";
					var elem_center = document.createElement("center");
					var elem_span = document.createElement("span");

					var textNode = document.createTextNode(resp[1]);
					elem_span.appendChild(textNode);

					elem_span.classList.add("red");
					elem_center.appendChild(elem_span);
					div_err_log.appendChild(elem_center);

					document.getElementById("username_loginpage").value = '';
					document.getElementById("password_loginpage").value = '';
				}

				else{
					window.location.href = "index.php";
				}
			}

		},

		error: function () {
			console.log("erreur");
		}
	})
}

function valide_edit_profile(ok) {

	var recup = document.getElementById("edit_profile_input").value;
	console.log(ok);

	//On peut rajouter des cheacks pour vérif qu'il n'y a aucun problème sur les nouvelles variabel entré meme si le JS est tres permissif

	$.ajax({
		type: "POST",
		url: "../../script.php",
		data: {
			action: "edit_profile_data",
			type: ok,
			contenu: recup
		},
		dataType: "json",

		success: function () {
			window.location.href = "profile.php";
		},
		error: function () {
			console.log("erreur");
		}
	})



}

function edit_profile(id, name) {
	var tt = id.split('_')[1];
	var span_name = document.getElementById(id);
	span_name.innerHTML = "";

	var input = document.createElement("input");
	input.id = "edit_profile_input";
	console.log(name);
	input.value = name;
	input.placeholder = tt;

	var valider = document.createElement("img");
	valider.src = "../../valide.png";
	valider.id = "button_valid";
	var chaine = 'valide_edit_profile("' + tt + '")'
	valider.setAttribute('onclick', chaine);

	var link = document.createElement("a");
	link.href = "profile.php";
	var retour = document.createElement("img");
	retour.src = "../../croix.png";
	retour.id = "button_return";

	link.appendChild(retour);
	link.appendChild(valider); //Je test un truc sur cette ligne tu pourra sup stv mais c'est une idéee (ça marche pas jsp pk)
	span_name.appendChild(input);
	span_name.appendChild(valider);
	span_name.appendChild(link);


}

function deco() {

	$.ajax({
		type: "POST",
		url: "../../script.php",
		data: {
			action: "deco"
		},
		dataType: "json",

		success: function () {
			window.location.href = "login.php";
		},
		error: function () {
			console.log("erreur");
		}
	})
}

function begin_swip() {

	$.ajax({
		type: "POST",
		url: "../../script.php",
		data: {
			action: "next",
			begin: 0,
			user_swip: "0"
		},
		dataType: "json",

		success: function (response) {
			var resp = response.message.split("/");

			var div_card = document.getElementById("profile_card");
			div_card.innerHTML = "";

			var img_back = document.createElement("img");
			img_back.src = "https://via.placeholder.com/300x400.png?text=" + resp[0];
			img_back.className = "background-img";

			var div_info = document.createElement("div");
			div_info.className = "info";

			var h1 = document.createElement("h1");
			h1.textContent = resp[0]
			h1.id = "key_user";


			var p = document.createElement("p");
			p.textContent = resp[1]

			var but1 = document.createElement("button");
			but1.textContent = "Ajouter";
			but1.setAttribute('onclick', "next(2)");

			var but2 = document.createElement("button");
			but2.textContent = "next";
			but2.setAttribute('onclick', "next(1)");


			div_info.appendChild(h1);
			div_info.appendChild(p);
			div_info.appendChild(but1);
			div_info.appendChild(but2);

			div_card.appendChild(img_back);
			div_card.appendChild(div_info);

		},
		error: function (response) {
			console.log("erreur " + response.message);
		}
	})
}


function next(beg)
{

	var user = document.getElementById("key_user").textContent;

	$.ajax({
		type: "POST",
		url: "../../script.php",
		data: {
			action: "next",
			begin: beg,
			user_swip: user
		},
		dataType: "json",

		success: function (response) {
			var resp = response.message.split("/");

			var div_card = document.getElementById("profile_card");
			div_card.innerHTML = "";

			var img_back = document.createElement("img");
			img_back.src = "https://via.placeholder.com/300x400.png?text=" + resp[0];
			img_back.className = "background-img";

			var div_info = document.createElement("div");
			div_info.className = "info";

			var h1 = document.createElement("h1");
			h1.textContent = resp[0]
			h1.id = "key_user";


			var p = document.createElement("p");
			p.textContent = resp[1]

			var but1 = document.createElement("button");
			but1.textContent = "Ajouter";
			but1.setAttribute('onclick', "next(2)");

			var but2 = document.createElement("button");
			but2.textContent = "next";
			but2.setAttribute('onclick', "next(1)");


			div_info.appendChild(h1);
			div_info.appendChild(p);
			div_info.appendChild(but1);
			div_info.appendChild(but2);

			div_card.appendChild(img_back);
			div_card.appendChild(div_info);
		},
		error: function () {
			console.log("erreur");
		}
	})
}


function upload_img()
{

	var img = document.getElementById("img_up_profile");
	var imageDisplay = document.getElementById('imageDisplay');


	var reader = new FileReader();

	reader.onload = function(img){
		imageDisplay.src = e.target.result;
        imageDisplay.style.display = 'block';
	}

	console.log("ok");

}
