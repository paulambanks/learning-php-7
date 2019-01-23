<?php

// Test if the operator is valid
function validOperator($operator) {
    $validOperators = array("+", "-", "*", "/");
    return in_array($operator, $validOperators);
}

// Return operator if valid or prompt the user if invalid
function promptOperator() {
    $operator = stream_get_line(STDIN, 100, "\n");
    if (validOperator($operator)) {
        return $operator;
    }
    do {
        echo "Wrong operator\n";
        echo "Please pick your operator: \n";
        $operator = stream_get_line(STDIN, 100, "\n");
    } while (!validOperator($operator));
    
    return $operator;
}

// Return number if valid or prompt the user if invalid
function promptNumber() {
    $number = stream_get_line(STDIN, 100, "\n");
    if (is_numeric($number)) { 
        return $number;
    }
    do {
        echo "Sorry, seems like you did not pick a valid number\n";
        echo "Pick a number again: \n";
        $number = stream_get_line(STDIN, 100, "\n");
    } while (!is_numeric($number));
    
    return $number;
}
// Test if the user's answer is valid
function validAnswer($answer) {
  $validAnswer = array("Y", "N", "y", "n");
  return in_array($answer, $validAnswer);
}

// Return user's answer if valid or prompt the user if invalid
function promptNextCalculation() {
  $answer = stream_get_line(STDIN, 100, "\n");
  if (validAnswer($answer)) {
    return $answer;
  }
  do {
    echo "I didn't get it\n";
    echo "Would you like to calculate again?: \n";
    $answer = stream_get_line(STDIN, 100, "\n");
  } while (!validAnswer($answer));
   
  return $answer;
}

// Acts on user's response to continue calculations
function calculateMore($answer) {
  switch ($answer) {
    case "y":
        $calculateMore = true; // keeps asking for numbers
        break;

    case "n":
        $calculateMore = false;
        echo "Thanks for being with us!\n";  // finish calculations
        die(); 
        break;
    }
    return $calculateMore;
}
// Performs calculations
function calculate($first, $second, $operator) {
    switch ($operator) {
        case "+":
            $result = $first + $second;
            break;
        case "-":
            $result = $first - $second;
            break;
        case "/":
            if ($second == 0) {
                echo "You cannot perform this operation";
                die(); // Exits the program if divsor is 0
            } else {
                $result = $first / $second;
            }
            break;
        case "*":
            $result = $first * $second;
            break;
    }
    echo "The result is " . $result . "\n\n";
}

// Calculating loop
do {
  echo "Pick the first number: \n"; 
  $first = promptNumber();
  
  echo "Pick the second number: \n"; 
  $second = promptNumber();
  
  echo "Pick the operator: \n";  
  $operator = promptOperator();
  
  calculate($first, $second, $operator); 

  echo "Would you like to calculate more?(y/n): \n";
  $answer = promptNextCalculation();
  
  calculateMore($answer);
  
} while ($calculateMore = true);
