<?php
// On démarre la session
session_start();
?>
<?php $titre = 'Shop Addict'; ?>

<?php ob_start(); ?>
	<div>
		Vous êtes connecté.
	</div>
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>