<?php

define(EXPRESSION, '/^\s*[0-9]+\s*[-+\/*%]\s*[0-9]\s*$/');

do {
  echo "Enter a expression (e.g. 12 + 3): ";
  $input = stream_get_line(STDIN, 1024, "\n");
  $matches = array();
  // Check if the expression is valid.
  if (preg_match(EXPRESSION, $input, $matches)) {
    // Escape $result so it doesn't get evaluated 
    // prior to the call to eval. Since the input 
    // is also valid php, we just need to make sure
    // we evaluate the expression and capture the result.
    eval("\$result = $input;");
    echo "Result: $result\n";
  }
  else {
    echo <<<EOT
Failed to parse expression! 
Valid operands are: +, -, *, /, %
Please choose one and try again!
Or press CTRL-C to exit:

EOT;
  }
} while (TRUE);

?>
