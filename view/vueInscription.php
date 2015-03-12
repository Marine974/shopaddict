<?php $titre = 'Formulaire inscription'; ?>

<?php ob_start(); ?>
<div class="contenu_page">
    <form action="controller/inscriptionController.php" onsubmit="return verifChamps()" method="POST">
		<div id="formulaire_inscription">
			<h4>Veuillez remplir ce formulaire pour vous inscrire:</h4>
				<fieldset>
				<legend>Informations personnelles</legend>
				<label for="nom">Nom: &emsp;&emsp;&emsp;&emsp;&emsp;</label> <!--Champ texte pour le nom-->
				<input type="text" name="nom" value="<?php if(isset($_POST['nom'])){echo htmlentities($_POST['nom'], ENT_QUOTES, 'UTF-8');} ?>" required/><br />
				
				<label for="prenom">Prénom:&emsp;&emsp;&emsp;&emsp;</label> <!--Champ texte pour le prenom-->
				<input type="text" name="prenom" value="<?php if(isset($_POST['prenom'])){echo htmlentities($_POST['prenom'], ENT_QUOTES, 'UTF-8');} ?>" required/><br />			
				
				<label for="age">Date de naissance:</label>
				<select name="jnaissance" id ="jnaissance" > //Utilisation d'une liste deroulante pour choisir le jour de naissance
					<?php   
						$_POST['jour']=$_SESSION['form']['jour'];
						for ($i=1;$i<=31;$i++)  
						{
							if ($i==$_POST['jour']) echo '<option value="'.$i.'" selected="selected">'.$i.'</option>';
							else echo '<option value="'.$i.'">'.$i.'</option>';
						}
					?>
				</select>
				<select name="mnaissance" id ="mnaissance" > //Utilisation d'une liste deroulante pour choisir le mois de naissance
					<?php   
						$_POST['mois']=$_SESSION['form']['mois'];
						for ($i=1;$i<=12;$i++)  
						{
							if ($i==$_POST['mois']) echo '<option value="'.$i.'" selected="selected">'.$i.'</option>';
							else echo '<option value="'.$i.'">'.$i.'</option>';
						}
					?>
				</select>
				<select name="anaissance" id ="anaissance" > //Utilisation d'une liste deroulante pour choisir l'annee de naissance
					<?php   
						$_POST['annee']=$_SESSION['form']['annee'];
						for ($i=1930;$i<=2015;$i++)  
						{
							if ($i==$_POST['annee']) echo '<option value="'.$i.'" selected="selected">'.$i.'</option>';
							else echo '<option value="'.$i.'">'.$i.'</option>';
						}
					?>
				</select>
				<br />	
				
				<label for="sexe">Sexe:  &emsp;&emsp; &emsp;&emsp;&emsp;</label> <!--Liste déroulante pour choisir le sexe-->
				<select name="sexe" id="sexe" >
					<option value="M">M</option>
					<option value="F">F</option>
				</select>
				<br />
				</fieldset>
				<fieldset>
				<legend>Contacts</legend>
				<label for="email">Email:&emsp; &emsp; &nbsp;</label>
				<input type="email" name="email" value="<?php if(isset($_POST['email'])){echo htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8');} ?>" required/><br />
				
				Adresse: &emsp; &nbsp;
				<label for="numero"></label> <!--Champ texte pour entrer un numero de voierie-->
				<input type="text" name="numero" width="5" height="50" placeholder="Numéro" value="<?php if(isset($_POST['numero'])){echo htmlentities($_POST['numero'], ENT_QUOTES, 'UTF-8');} ?>" />
				
				<label for="tvoie"></label> <!--Liste déroulante pour choisir le type de voie-->
				<select name="tvoie" id="tvoie" >
					<option value="1">Rue</option>
					<option value="2">Avenue</option>
					<option value="3">Boulevard</option>
					<option value="4">Chemin</option>
					<option value="5">Allée</option>
				</select>
				
				<label for="voie"></label> <!--Champ texte pour le nom de la voie-->
				<input type="text" name="voie" placeholder="Nom de la voie" value="<?php if(isset($_POST['voie'])){echo htmlentities($_POST['voie'], ENT_QUOTES, 'UTF-8');} ?>" /><br />
				
				<label for="cp">Code postal:</label> <!--Liste deroulante pour choisir son departement-->
				<select name="cp" id ="cp" >
					<?php   
						$_POST['cp']=$_SESSION['form']['cp'];
						for ($i=01;$i<=95;$i++)  
						{
							if ($i==$_POST['cp']) echo '<option value="'.$i.'" selected="selected">'.$i.'</option>';
							else echo '<option value="'.$i.'">'.$i.'</option>';
						}
					?>
				</select>
				
				<label for="ville">Ville: </label> <!--Champ texte pour indiquer sa ville-->
				<input type="text" name="ville" value="<?php if(isset($_POST['ville'])){echo htmlentities($_POST['ville'], ENT_QUOTES, 'UTF-8');} ?>" /><br />
				</fieldset>
				
				<fieldset>
				<legend>Mot de passe</legend>
				<label for="password">Mot de passe <span class="small">(6 caract&egrave;res min.):</span></label> <!--Champ special password pour choisir un mot de passe-->
				<input type="password" name="password" minlength="6" required/><br />
				
				<label for="passverif">Confirmer le mot de passe:&nbsp;</label> <!--Confirmation du mot de passe-->
				<input type="password" name="passverif" />
				</fieldset>
				<br />
				<div class="inputAndSubmit">
				<input type="submit" value="Valider"/>
				</div>
			</div>
		</form>
	</div>		
	<?php $contenu = ob_get_clean(); ?>
	
<?php require 'gabarit.php'; ?>