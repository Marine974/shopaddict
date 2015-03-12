<?php
include_once('model/getProduits.php');

// si il y a une recherche par nom
if(isset($_GET['recherche']) && !empty($_GET['recherche']))
{
	$produits = getProduitsRecherche($_GET['recherche']);
	$typesProduits = getTypesProduits();
	include_once('view/vueProduits.php');
	
}
// si il y a une recherche par type
elseif(isset($_GET['type_produit']) && !empty($_GET['type_produit']) && empty($_GET['valmax']))
{
	$produits = getProduitsType($_GET['type_produit']);
	$typesProduits = getTypesProduits();
	include_once('view/vueProduits.php');
	
}
// si il y a une recherche par prix et type
elseif(isset($_GET['type_produit']) && !empty($_GET['type_produit']) && isset($_GET['valmin']) && isset($_GET['valmax']) && !empty($_GET['valmin']) && !empty($_GET['valmax']))
{
	$produits = getProduitsPriceCateg($_GET['type_produit'],$_GET['valmin'],$_GET['valmax']);
	$typesProduits = getTypesProduits();
	include_once('view/vueProduits.php');
	
}

// si il y a une recherche par prix
elseif(empty($_GET['type_produit']) && isset($_GET['valmin']) && isset($_GET['valmax']) && !empty($_GET['valmin']) && !empty($_GET['valmax']))
{
	$produits = getProduitsPrice($_GET['valmin'],$_GET['valmax']);
	$typesProduits = getTypesProduits();
	include_once('view/vueProduits.php');
	
}
// si on souhaite voir une fiche produit
elseif(isset($_GET['id_prod']) && !empty($_GET['id_prod']))
{
	$produits = getProduitId($_GET['id_prod']);
	
	foreach($produits as $produit)
	{
		$produitsSim = getProduitsSimilar($produit['type_produit'], $_GET['id_prod']);
		$produitNom = $produit['nom_produit'];
	}
	include_once('view/vueFicheProduit.php');
}
// si aucune action sur le comparateur de prix
else
{	
	$produits = getProduits();
	$typesProduits = getTypesProduits();
	include_once('view/vueProduits.php');
}



