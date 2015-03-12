<?php
// On démarre la session
session_start();
?>
<?php $titre = 'Liste Centres Commerciaux'; ?>

<?php ob_start(); ?>
<div class="contenu_page">


<?php
							/* J'ai modifié cette partie */
							if(isset($_SESSION['login']) && !empty($_SESSION['login']))
							/* Fin modification */
					{?>
							<form action="index.php" method="GET">
								<input type="search" placeholder="Rechercher un centre commercial" name="recherche"/></br>
								<div class="inputAndSubmit">
								<input  placeholder="Département" name="departement"/>
								<input type="submit" value="Rechercher" name="rechercher_malls"/>
								</div>
							</form></br>
							<table>
								<tr>
									<th>Centre commercial</th>
									<th></th>
								</tr>
							<?php
							foreach($malls as $mall)
							{
							?>
							<!-- Je mets le résultat dans une form pour permettre de demander une nouvelle page-->
							
							<form action="index.php" method="GET">
							<tr>
								<td class="cellLeft"><a href=""><?php echo $mall['nom_mall']; ?></a></br>
											Adresse: <?php echo $mall['adresse_mall'] . ", " . $mall['cp_mall'];?> </br>
											Tel: <?php echo $mall['tel_mall']; ?></br>
											Horaires: <?php echo $mall['horaire_mall']; ?>
											<input type="hidden" name="identmall" value = "<?php echo $mall['id_mall'];?>"/>
								<td class="cellRight">
											<input type="submit" name="vueDetailCcm" value="Voir"/>
								</td>
								</td>
							</tr>
							</form>
							<!-- Fin modif-->
							<?php
							}
							?>
						</table>
						<?php
						}else
					{
						echo '<p>Vous devez être connecté pour accéder à la liste des centres commerciaux.<br/></p>';
					}
					?>
						</div>
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>