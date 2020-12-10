<?php
require "../includes/calls.inc.php";

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$method = $_SERVER['REQUEST_METHOD'];
$id = $_GET['booth'];
if($method != 'GET')
{
    http_response_code(400);
    return;
}

$returnarray = get_company_booth($id);

$json = json_encode($returnarray, JSON_PRETTY_PRINT);
echo $json;

