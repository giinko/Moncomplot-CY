

function register() {
	//récupération des variables 

	var name = document.getElementById("name_register").value;
	var lastname = document.getElementById("lastname_register").value;
	var username = document.getElementById("username_register").value;
	var email = document.getElementById("email_register").value;
	var mdp1 = document.getElementById("password1_register").value;
	var mdp2 = document.getElementById("password2_register").value;
	var complot = document.getElementById("complot_register").value;

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
				window.location.href = "index.html";
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

function edit_profile(id) {
	var tt = id.split('_')[1];
	var span_name = document.getElementById(id);
	span_name.innerHTML = "";

	var input = document.createElement("input");
	input.id = "edit_profile_input";
	input.placeholder = tt;

	var but = document.createElement("button");
	but.textContent = "Valider";
	var chaine = 'valide_edit_profile("' + tt + '")'
	but.setAttribute('onclick', chaine);

	var a = document.createElement("a");
	a.textContent = "Retour";
	a.href = "profile.php";

	span_name.appendChild(input);
	span_name.appendChild(but);
	span_name.appendChild(a);


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

// fonction comencer a swip les profils

//<div class="profile-card">
  //              <img src="https://via.placeholder.com/300x400.png?text=Noémie" class="background-img" alt="Background Image">
    //            <div class="info">
      //              <h1 id="nom_swipe_pageabo">Noémie</h1>
        //            <p id="age_swipe_pageabo">34 ans</p>
          //      </div>
          //  </div>
          //  <button> Ajouter </button>
          //  <button> Next </button>

function begin_swip()
{

	$.ajax({
		type: "POST",
		url: "../../script.php",
		data: {
			action: "next",
			begin : 0,
			user_swip : 1 // à définir
		},
		dataType: "json",

		success: function (response) {
			var resp = response.message.split("/");

			var div_card = document.getElementById("profile_card");
			div_card.innerHTML="";

			var img_back = document.createElement("img");
			img_back.src = "https://via.placeholder.com/300x400.png?text="+resp[0];
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

			var but2 = document.createElement("button");
			but2.textContent = "next";
			but2.setAttribute('onclick', "next()");


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


function next()
{

	var user = document.getElementById("key_user").textContent;

	$.ajax({
		type: "POST",
		url: "../../script.php",
		data: {
			action: "next",
			begin : 1,
			user_swip : user
		},
		dataType: "json",

		success: function (response) {
			var resp = response.message.split("/");

			var div_card = document.getElementById("profile_card");
			div_card.innerHTML="";

			var img_back = document.createElement("img");
			img_back.src = "https://via.placeholder.com/300x400.png?text="+resp[0];
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

			var but2 = document.createElement("button");
			but2.textContent = "next";
			but2.setAttribute('onclick', "next()");


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