<?php
/* J'ai modifié cette partie */
include_once('model/getUserId.php');

if(isset($_POST['login']) && isset($_POST['password']))
{
	$login = htmlspecialchars($_POST['login']);
	$password = htmlspecialchars($_POST['password']);
	getUserId($login, $password);
}
/* Fin modification */