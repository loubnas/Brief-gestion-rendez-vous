<?php 
   require_once __DIR__.'/../models/Client.php';

   class Clientctlr {
     
// create client  :
function create(){
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: *');
    $requestBody=json_decode(file_get_contents('php://input'));
    $client=new Client();
    $client->createClient($requestBody->Reference,$requestBody->Nom,$requestBody->Prenom,$requestBody->Age,$requestBody->Tele);
}

// affi client par ref :
function ClientReference($Reference){
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Headers: *');

    $client=new Client();
    $result=$client->ClientReference($Reference);
    echo json_encode($result);

}






}