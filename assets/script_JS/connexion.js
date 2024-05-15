
// Sélection de toutes les cartes
/*
const cards = document.querySelectorAll('.conspiration-card');
Ajout d'un gestionnaire d'événements click à chaque carte
cards.forEach(card => {
	card.addEventListener('click', function () {
		// Supprimer la classe "selected" de toutes les cartes
		cards.forEach(card => {
			card.classList.remove('selected');
		});
		cards.classList.add('selected'); // Si elle n'est pas sélectionnée, la sélectionner
	});
});
*/
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

function register() {
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
		var div_error_reg = document.getElementById("erreur_message_register");
		div_error_reg.innerHTML = "";

		var elem_center = document.createElement("center");
		var elem_span = document.createElement("span");
		var textNode = document.createTextNode("Veuillez selectionnez un complot");

		elem_span.appendChild(textNode);
		elem_span.classList.add("red");
		elem_center.appendChild(elem_span);
		div_error_reg.appendChild(elem_center);

		return 1;
	}

	// Vérifier que chaque champs est remplit (non vide)


	//username seulement lettre et chiffre et n'existe pas dans la base de donnée

	//password compris entre 8 et 20 caratères + pass1 == pass2


	// Si les 2 mdp sont différent on renvoie une erreur
	if (mdp1 != mdp2) {

		var div_error_reg = document.getElementById("erreur_message_register");
		div_error_reg.innerHTML = "";

		var elem_center = document.createElement("center");
		var elem_span = document.createElement("span");
		var textNode = document.createTextNode("Les mots de passes ne sont pas identiques");

		elem_span.appendChild(textNode);
		elem_span.classList.add("red");
		elem_center.appendChild(elem_span);
		div_error_reg.appendChild(elem_center);

		document.getElementById("password1_register").value = "";
		document.getElementById("password2_register").value = "";

		return 1;
	}

	//nom et prenom uniquement des lettres

	//email n'existe pas dans la base de donné

	//complot différent de "chsoir complot"

	//Check si les variables sont bonnne :
	// (mdp1 == mdp 1) / (email est bien un email) / (pas de chiffre ou carac bizzare dans name et lastname) / ...

	//Si c'est bon on supp les champs 

	// ... on verra les autres après

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

	//Check les variable si besoin
	//Si tt est ok requette ajax :

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

			if (response.response_code == 343) {
				var div_err_log = document.getElementById("erreur_message");
				div_err_log.innerHTML = "";
				var elem_center = document.createElement("center");
				var elem_span = document.createElement("span");

				var textNode = document.createTextNode(response.message);
				elem_span.appendChild(textNode);

				elem_span.classList.add("red");
				elem_center.appendChild(elem_span);
				div_err_log.appendChild(elem_center);

				document.getElementById("username_loginpage").value = '';
				document.getElementById("password_loginpage").value = '';
			}
			else if (response.response_code == 200) {
				window.location.href = "index.php";
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
