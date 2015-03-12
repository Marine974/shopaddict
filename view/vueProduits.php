<?php
// On démarre la session
session_start();
?>

<?php $titre = 'Comparateur de prix'; ?>

<?php ob_start(); ?>
<div class="contenu_page">
							<?php
							/* J'ai modifié cette partie */
							if(isset($_SESSION['login']) && !empty($_SESSION['login']))
							/* Fin modification */
					{?>
							<form action="index.php?action=produits" method="GET">
								<input type="search" placeholder="Rechercher un produit" name="recherche"/>
							
							<fieldset class="budget">
										<legend>Budget</legend>
											<label for="minimum">Minimum: </label>
											<input id="example1" type="range" min="0" max="300" step="1" value="0" onchange="textbox1.value = example1.value" />
											<input name="valmin" id="textbox1" type="text" />
											<label for="maximum">&nbsp;&nbsp;&nbsp;&nbsp;Maximum: </label>
											<input id="example2" type="range" min="100" max="1000" step="1" value="1000" onchange="valmax.value = example2.value" />
											<input name="valmax" id="textbox2" type="text" />
							</fieldset>
							<div class="inputAndSubmit">
							<select id="type_produit" name="type_produit">		
								<option value="" disabled selected>Catégorie</option>

												<?php
													foreach($typesProduits as $typeProduit)
													{
													?>
													<option value="<?php echo $typeProduit['type_produit'] ?>">
														<?php 
															echo $typeProduit['type_produit']
														?>
													</option>
													<?php
													}
												?>
								</select>
								<input type="submit" value="Rechercher" name="rechercher_produits"/>
								</div>
							</form></br>
							<table>
								<tr>
									<th class="produit">Produit</th>
									<th class="prix">Prix</th>
									<th></th>
								</tr>
							<?php
							foreach($produits as $produit)
							{
							?>
							<tr>
								<td><img class="img-prod-list" src="<?php echo $produit['image_produit']; ?>" /> 
								<a href=""><?php echo $produit['nom_produit']; ?></a></br>
											Magasin: <?php echo $produit['nom_store']; ?> </br>
											Centre commercial: <?php echo $produit['nom_mall']; ?></br>
								</td>
								<td class="cellLeft"><?php echo $produit['prix_produit']; ?>€
								<form action="index.php" method="GET">
								<input type="hidden" name="id_prod" value="<?php echo $produit['id_produit']; ?>"/>
								</td>
								<td class="cellRight">
								<input type="submit" value="Voir l'offre"/>
								</form></td>
							</tr>
							<?php
							}
							?>
						</table>
					<?php
					}else
					{
						echo '<p>Vous devez être connecté pour accéder au comparateur.<br/></p>';
					}
					?>
					
</div>
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>