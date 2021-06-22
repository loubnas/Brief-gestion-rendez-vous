<?php
require_once 'Connexion.php';
class Rendezvous
{
    private $Id;
    private $DateConsult;
    private $TypeConsult;
    private $Horaire;
    private $Reference;
 

// create rendez-vous :
    public function createR($DateConsult,$TypeConsult,$Horaire,$Reference){    
        $con=new Connexion(); 
        $conn2=$con->con;
        $query=("INSERT INTO `rendezvous`(`DateConsult`, `TypeConsult`, `Horaire`, `Reference`) VALUES ('".$DateConsult."','".$TypeConsult."','".$Horaire."','".$Reference."')");
        $result = $conn2->prepare($query);
        $result->execute();
    }



// affichage rendez-vous :
    public function readRendezvous(){
       $con=new Connexion();
       $conn2=$con->con;
       $query=("SELECT * FROM `rendezvous`");
       $result = $conn2->prepare($query);
       $result->execute();
       return $result->fetchAll(PDO::FETCH_ASSOC);
   }


// affichage d'un rendez-vous avec la reference :
   public function readReference($Reference){
      $con=new Connexion();
      $conn2=$con->con;
      $query=("SELECT * FROM `rendezvous` WHERE Reference='".$Reference."'");
      $result = $conn2->prepare($query);
      $result->execute();
      return $result->fetchAll(PDO::FETCH_ASSOC);
   }


//delete rendez-vous :
    public function deleteR($Id){
      $con=new Connexion();
      $conn2=$con->con;
      $query=("DELETE FROM `rendezvous` WHERE Id=".$Id);
      $result = $conn2->prepare($query);
      $result->execute();

   }


//update rendez-vous :
   public function selectRendezvous($Id){
      $con=new Connexion();
      $conn2=$con->con;
      $query="SELECT * FROM `rendezvous` WHERE Id=$Id";
      $result = $conn2->prepare($query);
      $result->execute();
       return $result->fetchAll(PDO::FETCH_ASSOC);
    }



//save update rendez-vous :

   public function saveRendezvous($Id,$DateConsult,$TypeConsult,$Horaire){
      $con=new Connexion();
      $conn2=$con->con;    
      $query=("UPDATE `rendezvous` SET `DateConsult`='".$DateConsult."',`TypeConsult`='".$TypeConsult."',`Horaire`='".$Horaire."' WHERE Id=".$Id);
      $result = $conn2->prepare($query);
      $result->execute();
   }   

// horaire reservé par date :
public function selectHoraire($DateConsult){
   $con=new Connexion();
   $conn2=$con->con;
   $query="SELECT `Horaire` FROM `rendezvous` WHERE DateConsult='$DateConsult'";
   $result = $conn2->prepare($query);
   $result->execute();
    return $result->fetchAll(PDO::FETCH_ASSOC);
 }





}



