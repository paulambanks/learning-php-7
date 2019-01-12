<?php
//1. Write a PHP program to check if a given positive integer is a power of two.

function IsPowerOfTwo($number) 
 /**
 * Checks if a given positive integer is a power of two
 *
 * @param integer $number Positive integer
 * @return string "Number is/is not power of two"
 */  
{
    # Using bit manipulation
    if (($number & ($number - 1 )) == 0) {
        return "$number is a power of two"; 
    } else {
        return "$number is not a power of two"; 
    }
}
print_r(IsPowerOfTwo(4)."\n");
print_r(IsPowerOfTwo(36)."\n");
print_r(IsPowerOfTwo(16)."\n");

?>