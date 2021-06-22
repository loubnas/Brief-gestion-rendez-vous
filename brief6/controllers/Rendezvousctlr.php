<?php 
   require_once __DIR__.'/../models/Rendezvous.php';

   class Rendezvousctlr {


// create table rendez-vous :
function create(){
   $requestBody=json_decode(file_get_contents('php://input'));
   $rendezvous=new Rendezvous();
   $rendezvous->createR($requestBody->DateConsult,$requestBody->TypeConsult,$requestBody->Horaire,$requestBody->Reference);

}


//affichage table des rendez-vous :
function read(){
   $rendezvous=new Rendezvous();
   $result=$rendezvous->readRendezvous();
   echo json_encode($result);
 
}

//affichage rendez-vous avec reference :
function readRefe($ref){
   $rendezvous=new Rendezvous();
   $result=$rendezvous->readReference($ref);
   echo json_encode($result);
}


//delete  un rendez-vous avec id : 
function delete($Id){
   $rendezvous=new Rendezvous();
   $rendezvous->deleteR($Id);
}



//update rendez-vous :
function select($Id){
   $rendezvous=new Rendezvous();
   $result = $rendezvous->selectRendezvous($Id);
   echo json_encode($result);
}


//save Update rendez-vous :
function saveupdate(){
   $requestBody= json_decode(file_get_contents('php://input'));
   $rendezvous=new Rendezvous();
   $Id= $requestBody->Id;
   $DateConsult= $requestBody->DateConsult;
   $TypeConsult=$requestBody->TypeConsult;
   $Horaire=$requestBody->Horaire;
   
   $result=$rendezvous->saveRendezvous($Id,$DateConsult,$TypeConsult,$Horaire);
}


// select horaire reservé par date :
function selectHorai($DateConsult){
   $rendezvous=new Rendezvous();
   $result = $rendezvous-> selectHoraire($DateConsult);
   echo json_encode($result);
}

}

  







 