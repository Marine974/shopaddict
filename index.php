<?php
require 'controller/controller.php';

try {
    if (isset($_GET['action']))
    {
        if ($_GET['action'] == 'produits')  //si comparateur de prix choisi
        {
            require 'controller/produitsController.php';
        }elseif($_GET['action'] == 'malls')  //si liste centre commerciaux choisie
        {
            require 'controller/mallsController.php';	
        }elseif($_GET['action'] == 'connexion')  //si liste centre commerciaux choisie
        {
					require 'controller/connexionController.php';	
        }elseif($_GET['action'] == 'deconnexion')  //si deconnexion choisi
        {
            require 'controller/deconnexionController.php';	
        }elseif($_GET['action'] == 'inscription')  //si liste centre commerciaux choisie
			{
				require 'view/vueInscription.php';	
			}else
            throw new Exception("Action non valide");
    }elseif(isset($_GET['recherche']))  //si recherche produit ou centre commercial
    {
		if(!empty($_GET['recherche'])) //si recherche non vide
		{
			if(isset($_GET['rechercher_produits'])) //si dans comparateur de prix
			{
				require 'controller/produitsController.php';
			}elseif(isset($_GET['rechercher_malls'])) //si dans liste malls
			{
				require 'controller/mallsController.php';
			}
		}elseif(empty($_GET['recherche']))  //si recherche vide
		{
			if(isset($_GET['rechercher_produits']) && !empty($_GET['rechercher_produits'])) //si actuellement sur vueProduits
			{
				require 'controller/produitsController.php';
			}else  //si actuellement sur vueMalls
			{
				require 'controller/mallsController.php';
			}
		}	
		/* j'ai ajouté/modifié cette zone*/
	}elseif (isset($_GET['identmall'])) 
		{
			require 'controller/detailCcmController.php'; 
		//affiche details du centre à partir de l'id du centre
		
		/* fin de modification*/
		}elseif(isset($_GET['id_prod'])) // si accès à une fiche produit
	 {
			require 'controller/produitsController.php';
	
    }else {  // aucune action définie : affichage de l'accueil
        accueil();
    }
}
catch (Exception $e) {
    erreur($e->getMessage());
}