<?php
class Calculator{

    // type, id, class, value, html, style
    static array $var = [
        [
            ['type'=>'div', 'id'=>'outputLast', 'class'=>'col-9 text-end text-secondary fs-3 bg-light', 'style'=>'height: 100px;'],
            ['type'=>'button', 'id'=>'reset', 'class'=>'btn col-3 fs-1', 'value'=>'reset', 'html'=>'C'],
        ],[
            ['type'=>'div', 'id'=>'outputCurrent', 'class'=>'col-9 text-end fs-1 bg-light', 'html'=>'0' ,'style'=>'height: 100px;'],
            ['type'=>'button', 'id'=>'delete', 'class'=>'btn col-3 fs-1', 'value'=>'delete', 'html'=>'<i class="fa-solid fa-delete-left"></i>'],
        ],[
            ['type'=>'button', 'id'=>'n7', 'class'=>'btn col fs-1', 'value'=>'7', 'html'=>'7'],
            ['type'=>'button', 'id'=>'n8', 'class'=>'btn col fs-1', 'value'=>'8', 'html'=>'8'],
            ['type'=>'button', 'id'=>'n9', 'class'=>'btn col fs-1', 'value'=>'9', 'html'=>'9'],
            ['type'=>'button', 'id'=>'division', 'class'=>'btn col fs-1', 'value'=>'divide', 'html'=>'<i class="fa-solid fa-divide"></i>'],
        ],[
            ['type'=>'button', 'id'=>'n4', 'class'=>'btn col fs-1', 'value'=>'4', 'html'=>'4'],
            ['type'=>'button', 'id'=>'n5', 'class'=>'btn col fs-1', 'value'=>'5', 'html'=>'5'],
            ['type'=>'button', 'id'=>'n6', 'class'=>'btn col fs-1', 'value'=>'6', 'html'=>'6'],
            ['type'=>'button', 'id'=>'multiplication', 'class'=>'btn col fs-1', 'value'=>'xmark', 'html'=>'<i class="fa-solid fa-xmark"></i>']
        ],[
            ['type'=>'button', 'id'=>'n1', 'class'=>'btn col fs-1', 'value'=>'1', 'html'=>'1'],
            ['type'=>'button', 'id'=>'n2', 'class'=>'btn col fs-1', 'value'=>'2', 'html'=>'2'],
            ['type'=>'button', 'id'=>'n3', 'class'=>'btn col fs-1'   , 'value'=>'3', 'html'=>'3'],
            ['type'=>'button', 'id'=>'subtraction', 'class'=>'btn col fs-1', 'value'=>'minus', 'html'=>'<i class="fa-solid fa-minus"></i>']
        ],[
            ['type'=>'div', 'class'=>'col', 'value'=>'', 'html'=>''],
            ['type'=>'button', 'id'=>'n0', 'class'=>'btn col fs-1', 'value'=>'0', 'html'=>'0'],
            ['type'=>'button', 'id'=>'resolve', 'class'=>'btn col fs-1', 'value'=>'equals', 'html'=>'<i class="fa-solid fa-equals"></i>'],
            ['type'=>'button', 'id'=>'sum', 'class'=>'btn col fs-1', 'value'=>'plus', 'html'=>'<i class="fa-solid fa-plus"></i>']
        ]
    ];

    private float $n1;
    private float $n2;
    private string $operation;

    function __construct(string $num1, string $num2, string $operation){
        $this->operation = $operation;
        $this->n1 = floatval($num1);
        $this->n2 = floatval($num2);
    }

    public function calculate() {
        if ($this->operation == ''){
            return $this->n1;
        }
        if ($this->n2 == ''){
            $this->n2 = $this->n1;  
        } 
        switch ($this->operation) {
            case "plus":
                return $this->sum();
            case "minus":
                return $this->substract();
            case "xmark":
                return $this->multiply();
            case "divide":
                return $this->divide();
            case "root":
                return $this->root();
            case "power":
                return $this->power();
        }
    }

    private function sum() : float{
        return $this->n1 + $this->n2;
    }

    private function substract() : float{
        return $this->n1 - $this->n2;
    }

    private function multiply() : float{
        return $this->n1 * $this->n2;
    }

    private function divide() {
        if ($this->n2 == 0){
            return "No se puede dividir entre 0";
        }
        return $this->n1 / $this->n2;
    }

    private function root() : float{
        return 0.0;
    }

    private function power() : float{
        return 0.0;
    }

    static public function generateCalculator() : string {
        $html = "";
        foreach(self::$var as $row){
            $html .= '<div class="row me-2">';
            foreach($row as $cell){
                $aux = "<".$cell['type']." ";
                isset($cell['id']) ? $aux.="id='".$cell['id']."' " : $aux.="";
                isset($cell['class']) ? $aux.="class='".$cell['class']."' " : $aux.="";
                isset($cell['value']) ? $aux.="value='".$cell['value']."' " : $aux.="";
                isset($cell['style']) ? $aux.="style='".$cell['style']."'>" : $aux.=">";
                isset($cell['html']) ? $aux.=$cell['html'] : $aux.="";
                $aux .= "</".$cell['type'].">";
                $html .= $aux;
            }
            $html .= '</div>';
        }
        return $html;
    }

}