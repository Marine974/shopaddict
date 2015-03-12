<div id="header">
	<a href="index.php"><img src="content/shopaddict_long.png"/></a>
	<?php //Si pas connecté : afficher se connecter
	
/* J'ai modifié cette partie */
if (!isset($_SESSION['login']))
{
?>
	<div id="connecter">
		<form action="index.php?action=connexion" method="POST">
		<input type="email" placeholder="Email" size="15" name="login" required/>
		<input type="password" placeholder="Mot de passe" size="15" name="password" required/>
		<input type="submit" value="Se connecter" />
		</form>
		<span style="font-size: 60%; position: relative; bottom: 7px;"><a href="index.php?action=inscription">Pas encore inscrit?</a></span>
	</div>
	<?php
}
/* Fin modification */

// Le mot de passe et le login ont été envoyé et ils sont bons : afficher se déconnecter
 else
{
	?>
	<div id="deconnecter">
		<a href="index.php?action=deconnexion">Se déconnecter</a>
	</div>
	<?php
}
?>
	
	<div id="menu">
		<span><img src="content/menu.png"/> Menu</span>
		<div class="menu_deroulant">
		<ul>
			<li><a href="index.php">A propos</a></li>
			<li><a href="index.php?action=produits">Comparateur de prix</a></li>
			<li><a href="<?="index.php?action=malls"?>">Liste centres commerciaux</a></li>
				<li><a href="">Informations légales</a></li>
				<li><a href="">Conditions</a></li>
				<li><a href="">FAQ</a></li>
			<li><a href="">Contact</a></li>
		</ul>
	</div>
	</div>
</div>