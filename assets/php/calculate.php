<?php
/**
 * Calculate result based on given operator and operands
 * @param  string $operator
 * @param  int  $operand1
 * @param  int  $operand2
 * @return mixed
 */
function calculate($operator, $operand1, $operand2){
    switch($operator){
        case '-':
            return $operand1 - $operand2;
            break;
        case '+':
            return $operand1 + $operand2;
            break;
        case '/':
            if($operand1 > 0 || $operand2 > 0) {
                return $operand1 / $operand2;
            }else{
                return 'Invalid input, cannot divide by zero';
            }
            break;
        case '*':
            return $operand1 * $operand2;
            break;
        default:
            return false;
    }
}
/**
 * Calculate result based on an emoji as an operator
 * @param  string $userEmoji
 * @param  int  $operand1
 * @param  int  $operand2
 * @return mixed
 */
function emoji_calculate($userEmoji, $operand1, $operand2){

    //Validate input
    if(is_numeric($operand1)
        && is_numeric($operand2)
        && isset($userEmoji)
        && !empty($userEmoji)){

        //Declare acceptable emojis by HTML entity, with corresponding operand
        $operators = array('&#128128;' => '-', '&#128125;' => '+', '&#128123;' => '*', '&#128561;' => '/');

        foreach($operators as $emoji => $operator){

            if(html_entity_decode($emoji) == htmlentities($userEmoji)){
                //Calculate result based on associated emoji operator
                return calculate($operator, $operand1, $operand2);
            }

        }

        return false;

    }else{
        http_response_code(400);
        header('Content-Type: application/json; charset=UTF-8');
        return 'Please fill in all fields, the operator and both operands are required.';

    }
}


//Fetch json from POST
$json = json_decode(file_get_contents("php://input"))[0];

echo emoji_calculate($json->operator, $json->operand1, $json->operand2);




