<?php
function getMalls()
{
	include('connexionBdd.php');
	
	$req=$bdd->prepare('	SELECT id_mall, nom_mall, adresse_mall, cp_mall, tel_mall, horaire_mall, mall_map_link
								FROM mall
								ORDER BY id_mall');
	$req->execute();
	$malls = $req->fetchAll();
	
	return $malls;
}

function getMallsRecherche($recherche)
{
	include('connexionBdd.php');
	
	//J'ai rajoué le id_mall à la requete
	$req=$bdd->prepare(' SELECT id_mall, nom_mall, adresse_mall, cp_mall, tel_mall, horaire_mall
								FROM mall m
								WHERE m.nom_mall LIKE "%'.$recherche.'%"
								ORDER BY nom_mall');
	$req->execute();
	$malls = $req->fetchAll();
	
	return $malls;
}
function getMallsRechercheDep($recherche, $departement)
{
	include('connexionBdd.php');
	
	//requete avec code postal
	$req=$bdd->prepare(' SELECT id_mall, nom_mall, adresse_mall, cp_mall, tel_mall, horaire_mall
								FROM mall m
								WHERE m.nom_mall LIKE "%'.$recherche.'%" AND m.cp_mall LIKE "%'.$departement.'%"
								ORDER BY nom_mall');
	$req->execute();
	$malls = $req->fetchAll();
	
	return $malls;
}

function getMallId($id)
{
	include('connexionBdd.php');
	
	$req=$bdd->prepare('	SELECT id_mall, nom_mall, adresse_mall, cp_mall, tel_mall, horaire_mall, mall_map_link
								FROM mall m
								WHERE m.id_mall = "'.$id.'"
								ORDER BY id_mall');
	$req->execute();
	$mall = $req->fetchAll();

	
	return $mall;
}