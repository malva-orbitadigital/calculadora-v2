<?php

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

function doOperation($num1, $num2, $operation){
    if ($operation == ''){
        return $num1;
    } else if ($num2 == ''){
        $num2 = $num1;  
    } 
    $n1 = floatval($num1);
    $n2 = floatval($num2);
    switch ($operation) {
        case "plus":
            return $n1 + $n2;
        case "minus":
            return $n1 - $n2;
        case "xmark":
            return $n1 * $n2;
        default:
            if ($n2 == 0){
                return "No se puede dividir entre 0";
            }
            return $n1 / $n2;
    }
}