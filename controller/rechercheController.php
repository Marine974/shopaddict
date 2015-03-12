<?php
include_once('model/getProduits.php');
include_once('model/getMalls.php');

if(isset($_GET['rechercher_produits']) && !empty($_GET['rechercher_produits']))
{
	$produits = getProduitsRecherche($_GET['recherche']);
	
	foreach($produits as $cle => $produit)
	{
		$produits[$cle]['nom_produit'] = htmlspecialchars($produit['nom_produit']);
		$produits[$cle]['nom_store'] = htmlspecialchars($produit['nom_store']);
		$produits[$cle]['nom_mall'] = htmlspecialchars($produit['nom_mall']);
		$produits[$cle]['prix_produit'] = htmlspecialchars($produit['prix_produit']);
	}
	include_once('view/vueProduits.php');
}elseif(isset($_GET['rechercher_malls']) && !empty($_GET['rechercher_malls']))
{
	$malls = getMallsRecherche($_GET['recherche']);

	foreach($malls as $cle => $mall)
	{
		$malls[$cle]['nom_mall'] = htmlspecialchars($mall['nom_mall']);
		$malls[$cle]['adresse_mall'] = htmlspecialchars($mall['adresse_mall']);
		$malls[$cle]['cp_mall'] = htmlspecialchars($mall['cp_mall']);
		$malls[$cle]['tel_mall'] = htmlspecialchars($mall['tel_mall']);
		$malls[$cle]['horaire_mall'] = htmlspecialchars($mall['horaire_mall']);
	}
	include_once('view/vueMalls.php');
}
