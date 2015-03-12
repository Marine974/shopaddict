<?php
// Fonction qui récupère les champs d'un user
function getUserId($login, $password)
{
	include_once('connexionBdd.php');			
			
	$req = $bdd->query("	SELECT * FROM user 
								WHERE email_user = '".$_POST['login']."' 
								AND password = '".$_POST['password']."'");
	
	$req->execute(array(
			'login' => $login,
			'password' => $password));
 
			$resultat = $req->fetch();
			
			if (!$resultat) // si la requête n'a aucun résultat
			{
				// script qui affiche un message d'alerte quand les identifiants ne sont pas corrects
				echo '<script>
				alert("Mauvais identifiant ou mot de passe !");
				</script>';
				header("Refresh: 0.0; url=\"./index.php"); // ramène à la page index
			}
			else
			{
				// commencer la session
				session_start();
				$_SESSION['id_user'] = $resultat['id_user'];
				$_SESSION['nom_user'] = $resultat['nom_user'];
				$_SESSION['prenom_user'] = $resultat['prenom_user'];
				$_SESSION['genre'] = $resultat['genre'];
				$_SESSION['cp_user'] = $resultat['cp_user'];
				$_SESSION['login'] = $resultat['email_user'];
				$_SESSION['type_user'] = $resultat['type_user'];
				$_SESSION['age'] = $resultat['age'];
				header ('location: index.php');
			}
}