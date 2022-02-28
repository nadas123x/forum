<?php
session_start();

//require plante la page si y a une erreur au niv de l'appel du fich ,include va generer mass erreurs et va essayer d afficher wkha kyn faute!!

require('actions/database.php');

//isset pour verifier si une var existe

    //Vérifier si l'user a bien complété tous les champs
if (isset($_POST['validate'])){
	//les champs pas vide!!
  if(!empty($_POST['pseudo']) AND !empty($_POST['lastname']) AND !empty($_POST['firstname']) AND !empty($_POST['password'])){

 $user_pseudo = htmlspecialchars($_POST['pseudo']);
 $user_lastname = htmlspecialchars($_POST['lastname']);
  $user_firstname = htmlspecialchars($_POST['firstname']);
  $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $checkIfUserAlreadyExists = $bdd->prepare('SELECT pseudo from users WHERE pseudo=?');
  $checkIfUserAlreadyExists->execute(array($user_pseudo)); //pseudo entré par utilisateur f forms

  if ($checkIfUserAlreadyExists->rowCount() == 0){

 //Insérer l'utilisateur dans la bdd!!!!!

 $insertUserOnWebsite = $bdd->prepare('INSERT INTO users(pseudo, nom, prenom, mdp)VALUES(?, ?, ?, ?)');
 $insertUserOnWebsite->execute(array($user_pseudo, $user_lastname, $user_firstname, $user_password));


  

//recuperer données de utilisateur
 $getInfosOfThisUserReq = $bdd->prepare('SELECT id ,pseudo,nom,prenom FROM users WHERE nom = ? AND prenom = ? AND pseudo = ?');
  $getInfosOfThisUserReq->execute(array($user_lastname, $user_firstname, $user_pseudo));
//stocker tt les infos recuperes f userInfos!!
   $usersInfos = $getInfosOfThisUserReq->fetch(); 

  //Authentifier l'utilisateur sur le site et récupérer ses données dans des variables globales sessions
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $usersInfos['id'];
            $_SESSION['lastname'] = $usersInfos['nom'];
            $_SESSION['firstname'] = $usersInfos['prenom'];
            $_SESSION['pseudo'] = $usersInfos['pseudo'];


header('Location:index.php');
}else{
  	  	$errorMsg="Utilisateur existe!";

  }

  }else{
  	$errorMsg="Veuillez compléter tous les champs";
  }
  
}
?>