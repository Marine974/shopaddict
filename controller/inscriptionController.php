<?php
				include('connexionBdd.php');
				
				$Test1 = $Test2 = $Test3 = $Test4 = $Test5 = $Test6 = $Test7 = false; //Liste de conditions à remplir pour reussir l'inscription
				
				if (isset($_POST['nom']) && !empty($_POST['nom'])) //Verification si les champs sont bien remplis
				{
					//echo "Votre nom : " . $_POST['nom'] . "<br/>";
					$Test1=true; //Si oui, le test est valide
				}
				else
				{
				echo 'Vous devez remplir le champ nom.<br/>'; //Si non, une erreur s'affiche
				}
				
				if (isset($_POST['prenom']) && !empty($_POST['prenom'])) //Verification si les champs sont bien remplis
				{
					//echo "Votre prenom : " . $_POST['prenom'] . "<br/>";
					$Test2=true;
				}
				else
				{
					echo 'Vous devez remplir le champ prenom.<br/>';			
				}
				
				/*if (isset($_POST['jnaissance']) && !empty($_POST['jnaissance']))
					{
					echo "Votre jour : " . $_POST['jnaissance'] . "<br/>";
					$Test3=true;
					}
					else
					{
					echo 'Vous devez remplir le champ jour.<br/>';			
					}
					
					if (isset($_POST['mnaissance']) && !empty($_POST['mnaissance']))
					{
					echo "Votre mois : " . $_POST['mnaissance'] . "<br/>";
					$Test4=true;
					}
					else
					{
					echo 'Vous devez remplir le champ mois.<br/>';			
					}
					
					if (isset($_POST['anaissance']) && !empty($_POST['anaissance']))
					{
					echo "Votre année : " . $_POST['anaissance'] . "<br/>";
					$Test5=true;
					}
					else
					{
					echo 'Vous devez remplir le champ année.<br/>';			
				}*/
				
				if (isset($_POST['sexe']) && !empty($_POST['sexe'])) //Verification si les champs sont bien remplis
				{
					//echo "Sexe : " . $_POST['sexe'] . "<br/>";
					$Test3=true;
				}
				else
				{
					echo 'Veuillez indiquer votre sexe.<br/>';
				}
				
				$res  = $bdd->query("SELECT COUNT(*) AS nbr FROM user WHERE email_user = '".$_POST['email']."'"); //Requete verifiant si le mail existe deja
				if (!isset($_POST['email']) || empty($_POST['email']) || preg_match("/^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/", $_POST['email'])!=1) //Verification si les champs sont bien remplis avec les caracteres specifique a une adresse mail
				{
					echo 'Veuillez entrer un mail valide.<br/>';
				}
				elseif($res->fetchColumn() > 0) //Test de la requete
				{
					echo 'Ce mail est déjà utilisé !<br/>';
				}
				else
				{
					//echo "Ce mail n'a jamais été utilisé<br/>";
					//echo "Adresse mail : " . $_POST['email'] . "<br/>";
					$Test4=true;
				}
				
				if (isset($_POST['cp']) && !empty($_POST['cp'])) //Verification si les champs sont bien remplis
				{
					//echo "Département : " . $_POST['cp'] . "<br/>";
					$Test5=true;
				}
				else
				{
					echo "Veuillez indiquer votre département.<br/>";
				}
				
				if (isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['passverif']) && !empty($_POST['passverif']) && (($_POST['password']) == ($_POST['passverif'])))
				//Verification si les champs sont bien remplis et que le premier mot de passe correspond bien au second
				{
					//echo "Votre mot de passe : " . sha1($_POST['mdp']) . "<br/>";
					$Test6=true;
				}
				else
				{
					echo 'Veuillez rentrer et confirmer correctement votre mot de passe.<br/>';			
				}
				
				
				if ($Test1 && $Test2 && $Test3 && $Test4 && $Test5 && $Test6) //Si toutes les conditions sont remplies
				{
					$req=$bdd->prepare('INSERT INTO user(nom_user, prenom_user, age, genre, email_user, cp_user, Parking_id_parking, password)
					VALUES(:nom, :prenom, 0, :sexe, :email, :cp, NULL, :password)'); //Envoi des donnees dans la bdd
					$req->execute(array(
					':nom' => $_POST['nom'],
					':prenom' => $_POST['prenom'],
					':sexe' => $_POST['sexe'],
					':email' => $_POST['email'],
					':cp' => $_POST['cp'],
					':password' => $_POST['password']));
					//var_dump($req->errorInfo());
					header("Refresh: 0.5; url=\"../index.php");
				}
				else 
				{
				echo 'Veuillez retenter votre inscription. <br/>'; //Sinon, echec de l'inscription
				}	