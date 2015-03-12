<?php
// On démarre la session
session_start();
?>
<?php $titre = $produit['nom_produit'] ?>

<?php ob_start(); ?>
<div class="contenu_page">
							<?php
							if(isset($_SESSION['login']) && !empty($_SESSION['login']))
					{?>
							<?php
							foreach($produits as $produit)
							{
							?>
								<img class="img-prod-fiche" src="<?php echo $produit['image_produit']; ?>" align="left" title="<?php echo $produit['nom_produit'];?>"/>
								<h2 class="nom_prod"><?php echo $produit['nom_produit']; ?></h2>
								<h3>Description</h3>
								<?php echo $produit['description_produit']; ?>
								<h3>Prix: <?php echo $produit['prix_produit']; ?>€</h3>
								<span style="font-weight: bold;font-size:110%;">Où?</span></br>
								Centre commercial: <?php echo $produit['nom_mall']; ?> </br>
								Enseigne: <?php echo $produit['nom_store']; ?></br>
								<h3 class="prod_sim">Produits similaires</h3>
								<?php
								foreach($produitsSim as $produitSim)
								{
									?>
									<p><img class="img-prod-sim" src="<?php echo $produitSim['image_produit']; ?>" alt="<?php echo $produitSim['nom_produit']; ?>" 
												title="<?php echo $produitSim['nom_produit']; ?>"/>
									</p>
									<?php
								}
								?>
								</br>
							<?php
							}
							?>
					<?php
					}else
					{
						echo '<p>Vous devez être connecté pour accéder au comparateur.<br/></p>';
					}
					?>
					
</div>
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>