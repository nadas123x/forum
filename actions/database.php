<?php
//faire des requetes sql avk PDO
try{
	//s il arrive pas a se co,i va afficher une exception
$bdd= new PDO ('mysql:host=localhost:3307;dbname=forum;charset=utf8;','nada','',);

}catch(Exception $e){
	die('erreur trouvée:' .$e->getMessage());
}


