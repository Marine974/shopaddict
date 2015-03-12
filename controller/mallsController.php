<?php
include_once('model/getMalls.php');

if(isset($_GET['recherche']) && !empty($_GET['recherche']))
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
}
elseif(isset($_GET['recherche']) AND isset($_GET['departement']) AND !empty($_GET['departement']))
{
	$malls = getMallsRechercheDep($_GET['recherche'], $_GET['departement']);
	
	foreach($malls as $cle => $mall)
	{
		$malls[$cle]['nom_mall'] = htmlspecialchars($mall['nom_mall']);
		$malls[$cle]['adresse_mall'] = htmlspecialchars($mall['adresse_mall']);
		$malls[$cle]['cp_mall'] = htmlspecialchars($mall['cp_mall']);
		$malls[$cle]['tel_mall'] = htmlspecialchars($mall['tel_mall']);
		$malls[$cle]['horaire_mall'] = htmlspecialchars($mall['horaire_mall']);
	}
}
else 
{	
	$malls = getMalls();

	foreach($malls as $cle => $mall)
	{
		$malls[$cle]['id_mall'] = htmlspecialchars($mall['id_mall']);
		$malls[$cle]['nom_mall'] = htmlspecialchars($mall['nom_mall']);
		$malls[$cle]['adresse_mall'] = htmlspecialchars($mall['adresse_mall']);
		$malls[$cle]['cp_mall'] = htmlspecialchars($mall['cp_mall']);
		$malls[$cle]['tel_mall'] = htmlspecialchars($mall['tel_mall']);
		$malls[$cle]['horaire_mall'] = htmlspecialchars($mall['horaire_mall']);
		$malls[$cle]['mall_map_link'] = htmlspecialchars($mall['mall_map_link']);
	}
}
include_once('view/vueMalls.php');