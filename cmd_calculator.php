<?php

$calculateMore = true; // Open a loop for calculator and choice of continuing the calculations

while ($calculateMore == true) { // while it's true the calculator will keep running
    
  // Ask user to pick a first number

    echo "Pick a number1: \n";
    $number1 = stream_get_line(STDIN, 100, "\n");

    // Test if user picked a valid number

    while (!is_numeric($number1)) {
        // Loop that user enters when provides an incorrect/invalid number. 
        //Function is_numeric($var) checks if a $var is numeric.
        echo "Pick a number1: \n";
        $number1 = stream_get_line(STDIN, 100, "\n");
    }

    // If user picked a valid number1, ask user to pick a second number

    echo "Thank you. Now please pick a number2: \n";
    $number2 = stream_get_line(STDIN, 100, "\n");

    // Again test if user picked a valid number

    while (!is_numeric($number2)) {
        // Loop that user enters when provides an incorrect/invalid number. 
        // Function is_numeric($var) checks if a $var is numeric.
        echo "Pick a number2: \n";
        $number2 = stream_get_line(STDIN, 100, "\n");
    }

    // Ask user to pick an operand

    echo "Thank you, now pleae pick the operand. Please keep choices to '+, -, *, /' \n";
    $operand = stream_get_line(STDIN, 100, "\n");

    // Check if the operand is valid
    $correctOperator = false;

    if ($operand == "+" || $operand == "-" || $operand == "*" || $operand == "/") {
        $correctOperator = true;
    } else {
        $correctOperator = false;

        while ($correctOperator == false) {
            echo "wrong operator\n";
            echo "Pick the operand: \n";
            $operand = stream_get_line(STDIN, 100, "\n");
            if ($operand == "+" || $operand == "-" || $operand == "*" || $operand == "/") {
                $correctOperator = true; // If user finally provides a valid operand he gets back to main loop and accept the operand as valid.
            }
        }
    }
    // Knowing now that the operand is correct, apply calculations
    if ($correctOperator == true) {
        switch ($operand) {
            case "+":
                echo "$number1 + $number2 is " . $number1 + $number2 . "\n";
                break;
            case "-":
                echo "$number1 - $number2 is " . $number1 - $number2 . "\n";
                break;
            case "/":
                if ($number2 == 0) {
                    echo "You cannot perform this operation";
                    die(); // Exits the program if divider(number2) == 0"
                } else {
                    echo "$number1 / $number2 is " . $number1 / $number2 . "\n";
                }
                break;
            case "*":
                echo "$number1 * $number2 is " . $number1 * $number2 . "\n";
                break;
            default:
                echo "Thanks!";
        }
    }


    echo "\n";

    // Ask the user whether he would you like to continue calculations

    echo "Would you like to calculate more?(y/n): \n";
    $answer = stream_get_line(STDIN, 100, "\n");

    // Test whether the answer is Y or N.
    $correctAnswer = false;

    if ($answer == "y" || $answer == "n") {
        $correctAnswer = true;
    } else {
        $correctAnswer = false;

        while ($correctAnswer == false) {
            echo "Sorry didn't get it";
            echo "Would you like to calculate more?(y/n): \n";
            $answer = stream_get_line(STDIN, 100, "\n");
            if ($answer == "y" || $answer == "n") {
                $correctAnswer = true; // If user finally provides a valid answer he gets back to main loop and accept the answer as valid.
            }
        }
    }
    // Knowing now that the answer is correct, apply the decision
    if ($correctAnswer == true) {
        switch ($answer) {
            case "y":
                $calculateMore = true; // keeps asking for numbers
                break;

            case "n":
                $calculateMore = false; 
                echo "Thanks for being with us!";  // finish calculations
                break;
            
            default:
                "Thanks";
        }
    }
}
?>
