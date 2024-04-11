<?php


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