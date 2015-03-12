

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr"/>
    <head>
        <meta charset="utf-8" />
		<link rel="stylesheet" href="../content/style.css" />
		<link rel="stylesheet" href="../content/menu_horizontal.css" />
		<link rel="icon" href="../content/favicon.ico" />
        <title><?= $titre ?></title>
    </head>
	 
	 <body>
		 <div id="bloc_page">
			<?php include ("header.php"); ?>
				<?= $contenu ?>
			<?php include ("footer.php"); ?>
			</div>
    </body>
</html>