<?php
function getProduits()
{
	include('connexionBdd.php');
	
	$req=$bdd->prepare('	SELECT id_produit, nom_produit, nom_store, nom_mall, prix_produit, image_produit, description_produit
								FROM PRODUIT p
								INNER JOIN STORE_PRODUIT sp
								ON p.id_produit = sp.Produit_id_produit
								INNER JOIN STORE s
								ON sp.Store_id_store = s.id_store
								INNER JOIN MALL m
								ON sp.Store_Mall_id_mall = m.id_mall
								ORDER BY prix_produit');
	$req->execute();
	$produits = $req->fetchAll();
	
	foreach($produits as $cle => $produit)
	{
		$produits[$cle]['nom_produit'] = htmlspecialchars($produit['nom_produit']);
		$produits[$cle]['nom_store'] = htmlspecialchars($produit['nom_store']);
		$produits[$cle]['nom_mall'] = htmlspecialchars($produit['nom_mall']);
		$produits[$cle]['prix_produit'] = htmlspecialchars($produit['prix_produit']);
	}
	
	return $produits;
}

function getProduitsPriceCateg($type,$min,$max)
{
include('connexionBdd.php');
	
	$req=$bdd->prepare('	SELECT id_produit, nom_produit, nom_store, nom_mall, prix_produit, image_produit, description_produit
								FROM PRODUIT p
								INNER JOIN STORE_PRODUIT sp
								ON p.id_produit = sp.Produit_id_produit
								INNER JOIN STORE s
								ON sp.Store_id_store = s.id_store
								INNER JOIN MALL m
								ON sp.Store_Mall_id_mall = m.id_mall
								WHERE p.type_produit LIKE "%'.$type.'%"
								AND p.prix_produit > "'.$min.'"
								AND p.prix_produit < "'.$max.'"
								ORDER BY prix_produit');
	$req->execute();
	$produits = $req->fetchAll();
	
	foreach($produits as $cle => $produit)
	{
		$produits[$cle]['id_produit'] = htmlspecialchars($produit['id_produit']);
		$produits[$cle]['nom_produit'] = htmlspecialchars($produit['nom_produit']);
		$produits[$cle]['nom_store'] = htmlspecialchars($produit['nom_store']);
		$produits[$cle]['nom_mall'] = htmlspecialchars($produit['nom_mall']);
		$produits[$cle]['prix_produit'] = htmlspecialchars($produit['prix_produit']);
		$produits[$cle]['image_produit'] = htmlspecialchars($produit['image_produit']);
		$produits[$cle]['description_produit'] = htmlspecialchars($produit['description_produit']);
	}
	
	return $produits;
}

function getProduitsPrice($min,$max)
{
include('connexionBdd.php');
	
	$req=$bdd->prepare('	SELECT id_produit, nom_produit, nom_store, nom_mall, prix_produit, image_produit, description_produit
								FROM PRODUIT p
								INNER JOIN STORE_PRODUIT sp
								ON p.id_produit = sp.Produit_id_produit
								INNER JOIN STORE s
								ON sp.Store_id_store = s.id_store
								INNER JOIN MALL m
								ON sp.Store_Mall_id_mall = m.id_mall
								WHERE p.prix_produit > "'.$min.'"
								AND p.prix_produit < "'.$max.'"
								ORDER BY prix_produit');
	$req->execute();
	$produits = $req->fetchAll();
	
	foreach($produits as $cle => $produit)
	{
		$produits[$cle]['id_produit'] = htmlspecialchars($produit['id_produit']);
		$produits[$cle]['nom_produit'] = htmlspecialchars($produit['nom_produit']);
		$produits[$cle]['nom_store'] = htmlspecialchars($produit['nom_store']);
		$produits[$cle]['nom_mall'] = htmlspecialchars($produit['nom_mall']);
		$produits[$cle]['prix_produit'] = htmlspecialchars($produit['prix_produit']);
		$produits[$cle]['image_produit'] = htmlspecialchars($produit['image_produit']);
		$produits[$cle]['description_produit'] = htmlspecialchars($produit['description_produit']);
	}
	
	return $produits;
}

// récupère les produits en fonction d'une recherche
function getProduitsRecherche($recherche)
{
	include('connexionBdd.php');
	
	$req=$bdd->prepare('	SELECT id_produit, nom_produit, nom_store, nom_mall, prix_produit, image_produit, description_produit
								FROM PRODUIT p
								INNER JOIN STORE_PRODUIT sp
								ON p.id_produit = sp.Produit_id_produit
								INNER JOIN STORE s
								ON sp.Store_id_store = s.id_store
								INNER JOIN MALL m
								ON sp.Store_Mall_id_mall = m.id_mall
								WHERE p.nom_produit LIKE "%'.$recherche.'%"
								ORDER BY prix_produit');
	$req->execute();
	$produits = $req->fetchAll();
	
	foreach($produits as $cle => $produit)
	{
		$produits[$cle]['id_produit'] = htmlspecialchars($produit['id_produit']);
		$produits[$cle]['nom_produit'] = htmlspecialchars($produit['nom_produit']);
		$produits[$cle]['nom_store'] = htmlspecialchars($produit['nom_store']);
		$produits[$cle]['nom_mall'] = htmlspecialchars($produit['nom_mall']);
		$produits[$cle]['prix_produit'] = htmlspecialchars($produit['prix_produit']);
		$produits[$cle]['image_produit'] = htmlspecialchars($produit['image_produit']);
		$produits[$cle]['description_produit'] = htmlspecialchars($produit['description_produit']);
	}
	
	return $produits;
}

// récupère les produits en fonction d'un type/catégorie
function getProduitsType($type)
{
	include('connexionBdd.php');
	
	$req=$bdd->prepare('	SELECT id_produit, nom_produit, nom_store, nom_mall, prix_produit, image_produit, description_produit
								FROM PRODUIT p
								INNER JOIN STORE_PRODUIT sp
								ON p.id_produit = sp.Produit_id_produit
								INNER JOIN STORE s
								ON sp.Store_id_store = s.id_store
								INNER JOIN MALL m
								ON sp.Store_Mall_id_mall = m.id_mall
								WHERE p.type_produit LIKE "%'.$type.'%"
								ORDER BY prix_produit');
	$req->execute();
	$produits = $req->fetchAll();
	
	foreach($produits as $cle => $produit)
	{
		$produits[$cle]['id_produit'] = htmlspecialchars($produit['id_produit']);
		$produits[$cle]['nom_produit'] = htmlspecialchars($produit['nom_produit']);
		$produits[$cle]['nom_store'] = htmlspecialchars($produit['nom_store']);
		$produits[$cle]['nom_mall'] = htmlspecialchars($produit['nom_mall']);
		$produits[$cle]['prix_produit'] = htmlspecialchars($produit['prix_produit']);
		$produits[$cle]['image_produit'] = htmlspecialchars($produit['image_produit']);
		$produits[$cle]['description_produit'] = htmlspecialchars($produit['description_produit']);
	}
	
	return $produits;
}

// récupère un produit en fonction d'un Id
function getProduitId($id)
{
	include('connexionBdd.php');
	
	$req=$bdd->prepare('	SELECT id_produit, nom_produit, type_produit, nom_store, nom_mall, prix_produit, image_produit, description_produit
								FROM PRODUIT p
								INNER JOIN STORE_PRODUIT sp
								ON p.id_produit = sp.Produit_id_produit
								INNER JOIN STORE s
								ON sp.Store_id_store = s.id_store
								INNER JOIN MALL m
								ON sp.Store_Mall_id_mall = m.id_mall
								WHERE p.id_produit = "'.$id.'" ');
	$req->execute();
	$produits = $req->fetchAll();
	
	foreach($produits as $cle => $produit)
	{
		$produits[$cle]['id_produit'] = htmlspecialchars($produit['id_produit']);
		$produits[$cle]['nom_produit'] = htmlspecialchars($produit['nom_produit']);
		$produits[$cle]['type_produit'] = htmlspecialchars($produit['type_produit']);
		$produits[$cle]['nom_store'] = htmlspecialchars($produit['nom_store']);
		$produits[$cle]['nom_mall'] = htmlspecialchars($produit['nom_mall']);
		$produits[$cle]['prix_produit'] = htmlspecialchars($produit['prix_produit']);
		$produits[$cle]['image_produit'] = htmlspecialchars($produit['image_produit']);
		$produits[$cle]['description_produit'] = htmlspecialchars($produit['description_produit']);
	}
	
	return $produits;
}

// récupère les produits similaires à un produit depuis don type et son id
function getProduitsSimilar($type, $id)
{
	include('connexionBdd.php');
	
	$req=$bdd->prepare('	SELECT id_produit, nom_produit, type_produit, nom_store, nom_mall, prix_produit, image_produit, description_produit
								FROM PRODUIT p
								INNER JOIN STORE_PRODUIT sp
								ON p.id_produit = sp.Produit_id_produit
								INNER JOIN STORE s
								ON sp.Store_id_store = s.id_store
								INNER JOIN MALL m
								ON sp.Store_Mall_id_mall = m.id_mall
								WHERE p.id_produit <> "'.$id.'"
								AND p.type_produit LIKE "'.$type.'"');
	$req->execute();
	$produitsSim = $req->fetchAll();
	
	foreach($produitsSim as $cle => $produitSim)
	{
		if($produitSim['id_produit'] != $id)
		{
			$produitsSim[$cle]['id_produit'] = htmlspecialchars($produitSim['id_produit']);
			$produitsSim[$cle]['nom_produit'] = htmlspecialchars($produitSim['nom_produit']);
			$produitsSim[$cle]['type_produit'] = htmlspecialchars($produitSim['type_produit']);
			$produitsSim[$cle]['nom_store'] = htmlspecialchars($produitSim['nom_store']);
			$produitsSim[$cle]['nom_mall'] = htmlspecialchars($produitSim['nom_mall']);
			$produitsSim[$cle]['prix_produit'] = htmlspecialchars($produitSim['prix_produit']);
			$produitsSim[$cle]['image_produit'] = htmlspecialchars($produitSim['image_produit']);
			$produitsSim[$cle]['description_produit'] = htmlspecialchars($produitSim['description_produit']);
		}else
		{
		}
	}
	return $produitsSim;
}

// récupère tous les types existants de tous les produits
function getTypesProduits()
{
	include('connexionBdd.php');
	
	$req=$bdd->prepare('	SELECT DISTINCT type_produit
								FROM produit');
	$req->execute();
	$typesProduits = $req->fetchAll();
	
	foreach($typesProduits as $cle => $typeProduit)
{
	$typesProduits[$cle]['type_produit'] = htmlspecialchars($typeProduit['type_produit']);
}

	return $typesProduits;
}