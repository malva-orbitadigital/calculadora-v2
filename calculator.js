$(function(){
    let fullResult = false;
    let firstOp = true;
    let operation = '';
    lastInput = '';
    let num1 = '0';
    let num2 = '';
    let result = '';
    let operations = ['plus', 'minus', 'xmark', 'divide'];
    let actions = ['delete', 'reset'];

    let outputCurrent = $('#outputCurrent');
    let outputLast = $('#outputLast');

    $(".btn").on('click', function(){
        let input = $(this).val();

        if (operations.includes(input)){    // OPERATIONS

            if (operations.includes(lastInput)){        // change operation
                outputLast.html(num1 + simbols(input));
            } else if (result == ''){                   // first operation
                if (firstOp){                           
                    outputLast.html(num1 + simbols(input));
                    firstOp = false;
                } else {                                // resolve + first operation
                    getResult(input, false);
                }
            } else if (result == num1 && !fullResult) { // resolve + operation
                getResult(input, false);
            } else {                                   // set operation
                outputLast.html(result + simbols(input));
                outputCurrent.text(result);
                num1 = result;
            }

            operation = input;
            fullResult = false;

            num2 = '';

        } else if (input == 'equals'){      // RESOLVE OPERATIONS
            getResult(input, true);
        } else if (input == 'reset') {      // RESET
            reset('0');
        } else if (input == 'delete') {     // DELETE ONE NUMBER 
            if (lastInput == 'equals') {                // delete history
                outputLast.html('');
            } else if (!operations.includes(lastInput)){          // last input: number -> delete digit
                if (num2 == ''){
                    if (num1.length == 1){
                        num1 = '0';
                    } else {
                        num1 = num1.substring(0, num1.length - 1);
                    }
                } else {
                    if (num2.length == 1){
                        num2 = '0';
                    } else {
                        num2 = num2.substring(0, num2.length - 1);
                    }
                }
                num2 == '' ? outputCurrent.text(num1) : outputCurrent.text(num2);
            } 
        } else {                            // NUMBERS
            if (fullResult){                            // last input: enter -> reset and show number
                reset(input);
            } else if (firstOp){                        // first operation -> set n1
                num1 == 0 ? num1 = input : num1 += input;
                outputCurrent.text(num1);
            } else {                                    // set n2 (n1 is previous result)
                num2 == 0 ? num2 = input : num2 += input;
                outputCurrent.text(num2);
            }
        }
        lastInput = input;
        console.log(num1 + " " + operation + " " + num2 + " " + result);
    })

    async function getResult(input, fullResult){
        try{
            const response = await fetch(`http://localhost/calculadora-v2/calculate.php?num1=${num1}&num2=${num2}&operation=${operation}`,
                {method:'GET'})
                
            const data = await response.json();
            
            result = data.result;
            console.log(result);
            fullResult ? showFullResult(input) : showResult();

        } catch(error){
            console.error('Error:', error);
        }
    }

    function reset(n1){
        num1 = n1;
        num2 = '';
        result = '';
        operation = '';
        outputCurrent.text(num1);
        outputLast.html('');
        firstOp = true;
        fullResult = false;
    }

    function showFullResult(input){
        outputCurrent.text(result);
        outputLast.html(num1 + simbols(operation) + num2 + simbols(input));
        num2 = '';
        num1 = result;
        fullResult = true;
    }

    function showResult(){
        outputCurrent.text(result);
        outputLast.html(result + simbols(operation));
        num2 = '';
        num1 = result;
    }

    function simbols(simbol){
        return ' <i class="fs-5 fa-solid fa-'+simbol+'"></i> '
    }


})