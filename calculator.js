$(function(){
    let fullResult = false;
    let firstOp = true;
    let operation = '';
    let num1 = '0';
    let num2 = '';
    let result = '';
    let operations = ['plus', 'minus', 'xmark', 'divide'];

    let outputCurrent = $('#outputCurrent');
    let outputLast = $('#outputLast');

    $(".btn").on('click', function(){
        let input = $(this).val();

        if (operations.includes(input)){    // OPERATIONS

            if (result == ''){
                if (firstOp){
                    outputLast.html(num1 + simbols(input));
                    firstOp = false;
                } else {
                    getResult(input, false);
                }
            } else if (result == num1 && !fullResult) {
                getResult(input, false);
            } else {
                outputLast.html(result + simbols(input));
                outputCurrent.text(result);
                num1 = result;
            }

            fullResult = false;

            operation = input;
            num2 = '';

        } else if (input == 'equals'){      // RESOLVE OPERATIONS
            getResult(input, true);
        } else {                            // NUMBERS
            if (fullResult){
                num1 = input;
                result = '';
                operation = '';
                outputCurrent.text(num1);
                outputLast.html('');
                firstOp = true;
            } else if (firstOp){
                num1 == 0 ? num1 = input : num1 += input;
                outputCurrent.text(num1);
            } else {
                // if (outputCurrent.text(num1)){
                //     outputCurrent.text('');
                // }
                num2 += input;
                outputCurrent.text(num2);
                
            }
        }
        console.log(num1 + " " + operation + " " + num2 + " " + result);
    })

    async function getResult(input, fullResult){
        try{
            const response = await fetch(`http://localhost/calculadora-v2/index.php?num1=${num1}&num2=${num2}&operation=${operation}`,
                {method:'GET'})
                
            const data = await response.json();
            
            result = data.result;
            console.log(result);
            fullResult ? showFullResult(input) : showResult();

        } catch(error){
            console.error('Error:', error);
        }
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