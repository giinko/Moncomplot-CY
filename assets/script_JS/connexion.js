function register()
{
	//récupération des variables 

	var username = document.getElementById("register_username").value;
	var name = document.getElementById("register_name").value;
	var lastname = document.getElementById("register_lastname").value;
	var email = document.getElementById("register_email").value;
	var mdp1 = document.getElementById("register_mdp1").value;
	var mdp2 = document.getElementById("register_mdp2").value;

	//Check si les variables sont bonnne :
	// (mdp1 == mdp 1) / (email est bien un email) / (pas de chiffre ou carac bizzare dans name et lastname) / ...

	//Si c'est bon on supp les champs 
	document.getElementById("register_username").value = '';
	document.getElementById("register_name").value = '';
	document.getElementById("register_lastname").value = '';
	document.getElementById("register_email").value = '';
	// ... on verra les autres après

	//AJAX

	$.ajax({
		type: "POST",
		url: "../../script.php",
		data: {
			action : "RegisterData",
			username : username,
			name : name,
			lastname : lastname,
			email : email,
			mdp : mdp1
		},
		dataType: "json",

		success : function(){
			console.log("C'est passé");
		},
		error : function(){
			console.log("erreur");
		}
	})
}

function login()
{	
	event.preventDefault();
	var username = document.getElementById("username_loginpage").value;
	var password = document.getElementById("password_loginpage").value;

	//Check les variable si besoin
	//Si tt est ok requette ajax :

	$.ajax({
		type: "POST",
		url: "../../script.php",
		data: {
			action : "LoginData",
			username : username,
			password : password
		},
		dataType: "json",

		success : function(response){

			if(response.response_code==343){
				var div_err_log = document.getElementById("erreur_message");
				div_err_log.innerHTML="";
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
			else if(response.response_code==200){
				window.location.href = "index.html";
			}


		},
		error : function(){
			console.log("erreur");
		}
	})
}