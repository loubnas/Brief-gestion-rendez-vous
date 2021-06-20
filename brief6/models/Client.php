<?php
require_once 'Connexion.php';

 class Client {
    private $Reference;
    private $Nom;
    private $Prenom;
    private $Age;
    private $Tele;

 
//create client : 
function createClient($Reference,$Nom,$Prenom,$Age,$Tele){
    $con=new Connexion(); 
    $conn2=$con->con;
    $query=("INSERT INTO `client`(`Reference`, `Nom`, `Prenom`, `Age`, `Tele`) VALUES ('".$Reference."','".$Nom."','".$Prenom."',".$Age.",'".$Tele."')");
    $result = $conn2->prepare($query);
    $result->execute();
}

//affichage des rendezvous par client 
function ClientReference($Reference){
    $con=new Connexion(); 
    $conn2=$con->con; 
    $query=("SELECT * FROM `client` WHERE Reference='".$Reference."'");
    $result = $conn2->prepare($query);
    $result->execute();
    return $result->rowCount();


}


}