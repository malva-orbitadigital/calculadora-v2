<?php
include_once 'Calculator.php';

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$num1 = $_GET['num1']??'';
$num2 = $_GET['num2']??'';
$operation = $_GET['operation']??'';

$calc = new Calculator($num1, $num2, $operation);

send_response([
    'status' => 'success',
    'result' => $calc->calculate()
]);

function send_response($response, $code = 200){
    http_response_code($code);
    die(json_encode($response));
}