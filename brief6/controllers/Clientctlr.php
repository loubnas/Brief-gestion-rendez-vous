<?php 
   require_once __DIR__.'/../models/Client.php';

   class Clientctlr {
     
// create client  :
function create(){
    $requestBody=json_decode(file_get_contents('php://input'));
    $client=new Client();
    $client->createClient($requestBody->Reference,$requestBody->Nom,$requestBody->Prenom,$requestBody->Age,$requestBody->Tele);
}

// affi client par ref :
function ClientReference($Reference){
    $client=new Client();
    $result=$client->ClientReference($Reference);
    echo json_encode($result);

}






}