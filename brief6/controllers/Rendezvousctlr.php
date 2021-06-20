<?php 
   require_once __DIR__.'/../models/Rendezvous.php';

   class Rendezvousctlr {


// create table rendez-vous :
function create(){
   header('Access-Control-Allow-Origin: *');
   header('Content-Type: application/json');
   header('Access-Control-Allow-Methods: POST');
   header('Access-Control-Allow-Headers: *');
   $requestBody=json_decode(file_get_contents('php://input'));
   $rendezvous=new Rendezvous();
   $rendezvous->createR($requestBody->DateConsult,$requestBody->TypeConsult,$requestBody->Horaire,$requestBody->Reference);

}


//affichage table des rendez-vous :
function read(){
   header('Access-Control-Allow-Origin: *');
   header('Content-Type: application/json');
   header('Access-Control-Allow-Headers: *');

   $rendezvous=new Rendezvous();
   $result=$rendezvous->readRendezvous();
   echo json_encode($result);
 
}

//affichage rendez-vous avec reference :
function readRefe($ref){
   header('Access-Control-Allow-Origin: *');
   header('Content-Type: application/json');
   header('Access-Control-Allow-Headers: *');

   $rendezvous=new Rendezvous();
   $result=$rendezvous->readReference($ref);
   echo json_encode($result);
}


//delete  un rendez-vous avec id : 
function delete($Id){
   header('Access-Control-Allow-Origin: *');
   header('Content-Type: application/json');
   header('Access-Control-Allow-Methods: DELETE');
   header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

   $rendezvous=new Rendezvous();
   $rendezvous->deleteR($Id);
}



//update rendez-vous :
function select($Id){
   header('Access-Control-Allow-Origin: *');
   header('Content-Type: application/json');
   header('Access-Control-Allow-Headers: *');

   $rendezvous=new Rendezvous();
   $result = $rendezvous->selectRendezvous($Id);
   echo json_encode($result);
}


//save Update rendez-vous :
function saveupdate($Id,$DateConsult,$TypeConsult,$Horaire,$Reference){
   header('Access-Control-Allow-Origin: *');
   header('Content-Type: application/json');
   header('Access-Control-Allow-Methods: PUT');
   header('Access-Control-Allow-Headers: *');
 
   $requestBody= json_decode(file_get_contents('php://input'));
   $rendezvous=new Rendezvous();
   $DateConsult= $requestBody->DateConsult;
   $TypeConsult=$requestBody->TypeConsult;
   $Horaire=$requestBody->Horaire;
   $Reference=$requestBody->Reference;
   $result=$rendezvous->saveRendezvous($Id,$DateConsult,$TypeConsult,$Horaire,$Reference);
}


}

  







 