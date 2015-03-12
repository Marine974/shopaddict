<?php
include_once('model/getDetailCcm.php');
include_once('model/getMalls.php');

if(isset($_GET['identmall']) && !empty($_GET['identmall']))
{
	$malls = getMallId($_GET['identmall']);
	
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
	
	$magasins = getMagasinsByCcm($_GET['identmall']);	
	
}/*else
{	
	$malls = getMalls();

	foreach($malls as $cle => $mall)
	{
		$malls[$cle]['nom_mall'] = htmlspecialchars($mall['nom_mall']);
		$malls[$cle]['adresse_mall'] = htmlspecialchars($mall['adresse_mall']);
		$malls[$cle]['cp_mall'] = htmlspecialchars($mall['cp_mall']);
		$malls[$cle]['tel_mall'] = htmlspecialchars($mall['tel_mall']);
		$malls[$cle]['horaire_mall'] = htmlspecialchars($mall['horaire_mall']);
	}
}*/
include_once('view/vueDetailCcm.php');