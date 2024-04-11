function login()
{
	console.log("salut bg");
}

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