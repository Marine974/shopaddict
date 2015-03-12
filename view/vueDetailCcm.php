<?php
// On démarre la session
session_start();
?>


<?php ob_start(); ?>

 <?php $titre = 'Liste des magasins'; ?>
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
							
							</form>
								
								<?php 
								foreach($malls as $thisMall)
								{
								?>
								<h3>Centre commercial : <?php echo $thisMall['nom_mall']; ?></h3>
								<iframe src="<?php echo $thisMall['mall_map_link']; ?>" align="right"></iframe>
								Adresse: <?php echo $thisMall['adresse_mall']; ?>, 
								<?php echo $thisMall['cp_mall']; ?> </br>
								Tel: <?php echo $thisMall['tel_mall']; ?> </br>
								Horaires: <?php echo $thisMall['horaire_mall']; ?>
								
									
								<?php
								}
								?>
								
								
							<table>
								<tr>
									<th>Magasins</th>
								</tr>
							<?php
							foreach($magasins as $magasin)
							{
							?>
							
							
							<form action="index.php" method="POST">
							<tr>
								<td><a href=""><?php echo $magasin['nom_store']; ?></a></br>
											
											Type : <?php echo $magasin['type_store']; ?><br />
											Description : <?php echo $magasin['description_store']; ?>
											
											
								</td>
							</tr>
							</form>
							<!-- Fin modif-->
							<?php
							}
							?>
						</table>
						<?php 
									foreach($malls as $thisMall)
									{
									?>
										
									
								<?php
									}
									?>
						<?php
						}else
					{
						echo '<p>Vous devez être connecté pour accéder à la liste des centres commerciaux.<br/></p>';
					}
					?>
						</div>
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>

<!--<object id="map" type="text/html"
data="http://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=Oregon+State+University&sll=37.822802,-115.532227&sspn=25.118232,39.506836&ie=UTF8&hq=Oregon+State+University&hnear=&ll=44.660839,-123.277588&spn=5.477444,9.876709&z=7&output=embed" 
style="float:right; margin-top:100px;margin-right:10px; width:250px;height:300px;" 
</object>