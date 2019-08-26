<?php
ini_set('display_errors',1);
header("Access-Control-Allow-Origin: http://localhost/intern-manager/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
require_once '../../classes/Professor.php';
require_once '../../config/Database.php';

$database = new Database();
$db = $database->getConnection();
$data = json_decode(file_get_contents("php://input"));
$professor = new Professor($db,$data);
if(
    $professor->noEmptyFields() &&
    $professor->register_prof()
){
    http_response_code(200);
    echo json_encode(array("message" => "Professor was created."));
}
else{
    http_response_code(400);
    echo json_encode(array("message" => "Unable to create professor."));
}