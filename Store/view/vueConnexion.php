<?php
// On démarre la session
session_start();
?>
<?php $titre = 'Shop Addict'; ?>

<?php ob_start(); ?>
	<div>
		Connectez-vous à Shop Addict
	</div>
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>