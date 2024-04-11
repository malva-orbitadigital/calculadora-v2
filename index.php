<?php
include_once 'calculate.php';

$data = [$_GET['num1'], $_GET['num2'], $_GET['operation']];

$result = doOperation($data[0], $data[1], $data[2]);
send_response([
    'status' => 'success',
    'result' => $result
]);

function send_response($response, $code = 200){
    http_response_code($code);
    die(json_encode($response));
}
