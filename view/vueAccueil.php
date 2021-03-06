<?php
// On démarre la session
session_start();
?>
<?php $titre = 'Shop Addict'; ?>

<?php ob_start(); ?>
<div class="presentation">
				<div class="text_pres">
					<h2>L'appli des centres commeciaux</h2>
					Shop Addict est une application mobile qui vous accompagne dans de nombreux centres commerciaux et qui met à votre disposition de nombreuses fonctionnalités pour rendre votre shopping plus efficace!
				</div>
				<div class="bouton_telecharger">
					<span>Télécharger</span>
				</div>
			</div>
			<div class="fonction1">
				<div class="image1">
					<img src="content/image12.png"/>
				</div>
				<div class="text_fonc1">
						<h2>Temps réel</h2>
						<p>Découvrez toutes les bonnes affaires, les exclusivités de vos magasins favoris ainsi que les évèvenements de centres commerciaux à proximité.</p>
				</div>
			</div>
			<div class="fonction2">
				<div class="image2">
					<img src="content/image23.png"/>
				</div>
				<div class="text_fonc2">
						<h2>Comparer</h2>
						<p>Rechercher et comparer les produits de magasins d'un ou plusieurs centres commerciaux et économisez sur vos achats!</p>
					</div>
			</div>
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>