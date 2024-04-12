<?php
//include_once 'calculate.php';

function simbol($text){
    return '<i class="fa-solid fa-'.$text.'"></i>';
}

function generateCalculator($var){
    foreach($var as $row){
        echo '<div class="row me-2">';
        foreach($row as $cell){
            $aux = "<".$cell['type']." ";
            isset($cell['id']) ? $aux.="id='".$cell['id']."' " : $aux.="";
            isset($cell['class']) ? $aux.="class='".$cell['class']."' " : $aux.="";
            isset($cell['value']) ? $aux.="value='".$cell['value']."' " : $aux.="";
            isset($cell['style']) ? $aux.="style='".$cell['style']."'>" : $aux.=">";
            isset($cell['html']) ? $aux.=$cell['html'] : $aux.="";
            $aux .= "</".$cell['type'].">";
            echo $aux;
        }
        echo '</div>';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/16714a3788.js" crossorigin="anonymous"></script>
    <script src="calculator.js"></script>
</head>
<body>
    <div class="container mt-5">
        <?php
        // type, id, class, value, html, style
        $var = [
            [
                ['type'=>'div', 'id'=>'outputLast', 'class'=>'col-9 text-end text-secondary fs-3 bg-light', 'style'=>'height: 100px;'],
                ['type'=>'button', 'id'=>'reset', 'class'=>'btn col-3 fs-1', 'value'=>'reset', 'html'=>'C'],
            ],[
                ['type'=>'div', 'id'=>'outputCurrent', 'class'=>'col-9 text-end fs-3 bg-light', 'html'=>'0' ,'style'=>'height: 100px;'],
                ['type'=>'button', 'id'=>'delete', 'class'=>'btn col-3 fs-1', 'value'=>'delete', 'html'=>simbol('delete-left')],
            ],[
                ['type'=>'button', 'id'=>'n7', 'class'=>'btn col fs-1', 'value'=>'7', 'html'=>'7',],
                ['type'=>'button', 'id'=>'n8', 'class'=>'btn col fs-1', 'value'=>'8', 'html'=>'8',],
                ['type'=>'button', 'id'=>'n9', 'class'=>'btn col fs-1', 'value'=>'9', 'html'=>'9',],
                ['type'=>'button', 'id'=>'division', 'class'=>'btn col fs-1', 'value'=>'divide', 'html'=>simbol('divide'),],
            ],[
                ['type'=>'button', 'id'=>'n4', 'class'=>'btn col fs-1', 'value'=>'4', 'html'=>'4',],
                ['type'=>'button', 'id'=>'n5', 'class'=>'btn col fs-1', 'value'=>'5', 'html'=>'5',],
                ['type'=>'button', 'id'=>'n6', 'class'=>'btn col fs-1', 'value'=>'6', 'html'=>'6',],
                ['type'=>'button', 'id'=>'multiplication', 'class'=>'btn col fs-1', 'value'=>'xmark', 'html'=>simbol('xmark'),]
            ],[
                ['type'=>'button', 'id'=>'n1', 'class'=>'btn col fs-1', 'value'=>'1', 'html'=>'1',],
                ['type'=>'button', 'id'=>'n2', 'class'=>'btn col fs-1', 'value'=>'2', 'html'=>'2',],
                ['type'=>'button', 'id'=>'n3', 'class'=>'btn col fs-1', 'value'=>'3', 'html'=>'3',],
                ['type'=>'button', 'id'=>'subtraction', 'class'=>'btn col fs-1', 'value'=>'minus', 'html'=>simbol('minus'),]
            ],[
                ['type'=>'div', 'class'=>'col', 'value'=>'', 'html'=>''],
                ['type'=>'button', 'id'=>'n0', 'class'=>'btn col fs-1', 'value'=>'0', 'html'=>'0'],
                ['type'=>'button', 'id'=>'resolve', 'class'=>'btn col fs-1', 'value'=>'equals', 'html'=>simbol('equals')],
                ['type'=>'button', 'id'=>'sum', 'class'=>'btn col fs-1', 'value'=>'plus', 'html'=>simbol('plus')]
            ]
        ];

        generateCalculator($var);
        ?>

    </div>
</body>
</html>