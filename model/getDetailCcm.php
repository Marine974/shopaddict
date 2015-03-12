<?php
function getNomMapMall($id)
{
	include('connexionBdd.php');
	$req=$bdd->prepare('SELECT nom_mall, mall_map_link
								FROM mall m
								WHERE m.id_mall = "'.$id.'"');
	$req->execute();
	$malls = $req->fetchAll();
	
	foreach($malls as $cle => $mall)
	{
		$malls[$cle]['nom_mall'] = htmlspecialchars($mall['nom_mall']);
		$malls[$cle]['mall_map_link'] = htmlspecialchars($mall['mall_map_link']);
		
	}
	return $malls;
}

function getMagasinsByCcm($id)
{
	include('connexionBdd.php');
	$req=$bdd->prepare('SELECT nom_store, type_store, description_store
								FROM store s
								WHERE s.Mall_id_mall = "'.$id.'"
								ORDER BY nom_store ;');
	$req->execute();
	$magasins = $req->fetchAll();
	
	foreach($magasins as $cle => $magasin)
	{
		$magasins[$cle]['nom_store'] = htmlspecialchars($magasin['nom_store']);
		$magasins[$cle]['type_store'] = htmlspecialchars($magasin['type_store']);
		$magasins[$cle]['description_store'] = htmlspecialchars($magasin['description_store']);
		
	}
	
	return $magasins;
}

/*function getMallsRecherche($recherche)
{
	include('connexionBdd.php');
	
	//J'ai rajoué le id_mall à la requete
	$req=$bdd->prepare('	SELECT id_mall, nom_mall, adresse_mall, cp_mall, tel_mall, horaire_mall
								FROM mall m
								WHERE m.nom_mall LIKE "%'.$recherche.'%"
								ORDER BY nom_mall');
	$req->execute();
	$malls = $req->fetchAll();
	
	return $malls;
}*/