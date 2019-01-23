<!DOCTYPE html>

<html>
    <head>
        <!--Meta information goes here-->

        <meta charset="UTF-8"> <!--charset attribute specifies the character encoding-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--gives the browser instructions on how to control the page's dimensions and scaling.-->
        <meta http-equiv="X-UA-Compatible" content="ie=edge"><!--Read more about browser support, especially for IE--> 
        <meta name="description" content=""><!--Write here your page description-->
        <meta name="author" content=""><!--Who is the author?-->
        <title>Basic Calculator</title><!--Title that will appear in a browser tag-->

        <!--User/Bootstrap CSS, fonts, icons-->

        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/calculator.css"><!--Add linking to your css file-->
        <link href="https://fonts.googleapis.com/css?family=Coiny" rel="stylesheet"><!--Really good fonts source: https://fonts.google.com/-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"><!--Adding cool icons to the site from https://fontawesome.com/icons-->

    </head>
    <body>

        <nav class="nav"> 
            <ul class="nav-list"> 
                <li class="nav-list-item"> 
                    <a class="nav-list-item-link" href="index.php">ABOUT ME</a> 
                </li> 
                <li class="nav-list-item"> 
                    <a class="nav-list-item-link" href="/Favourites.php">FAVOURITES</a> 
                </li> 
                <li class="nav-list-item"> 
                    <a class="nav-list-item-link" href="Calculator.php">CALCULATOR</a> 
                </li> 
            </ul>
        </nav>

        <header>
            <h1 class="page-title">CALCULATOR</h1>
            <p class="page-intro">This is a very simple calculator build only with PHP, CSS and HTML
                Feel free to have some fun with it. The calculator numerical input will 
                be filtered so make sure you're using numbers :) Also... make sure you are not dividing by 0.</p>
        </header>

        <main class="page-container">

            <?php
            if (null !== filter_input(INPUT_POST, 'calculate', FILTER_VALIDATE_FLOAT)) {
                $first = (filter_input(INPUT_POST, 'first', FILTER_VALIDATE_FLOAT));
                $second = (filter_input(INPUT_POST, 'second', FILTER_VALIDATE_FLOAT));
                $operation = (filter_input(INPUT_POST, 'operation', FILTER_SANITIZE_STRING));
                switch ($operation) {
                    case "Addition":
                        $result = $first + $second;
                        break;
                    case "Subtraction":
                        $result = $first - $second;
                        break;
                    case "Division":
                        $errorMsg = null;
                        if ($second == 0) {
                            $errorMsg = "Can't use 0 as a divider";
                        } else {
                            $result = $first / $second;
                            break;
                        }
                    case "Multiplication":
                        $result = $first * $second;
                        break;
                }
            }
            ?>

            <div class="calculator">
                <h1 class="title">CALCULATOR</h1>
                <form method="POST" action="Calculator.php">
                    <input type="text" name="first" class="num" autocomplete="off" placeholder="Enter the first number">
                    <input type="text" name="second" class="num" autocomplete="off" placeholder="Enter the second number">
                    <?php echo ($errorMsg !== null)?'<p class="error-msg"><i class="fas fa-exclamation-circle"></i> ERROR: ' . $errorMsg . '</p>':null; ?>
                    <select class="opt" name="operation">
                        <option value="Addition">+</option>
                        <option value="Subtraction">-</option>
                        <option value="Multiplication">*</option>
                        <option value="Division">:</option>
                    </select>
                    <input type="submit" name="calculate" value="calculate" class="button">
                </form>
                <?php if (null !== filter_input(INPUT_POST, 'calculate', FILTER_VALIDATE_FLOAT)) { ?>
                    <input type="text" value="<?php echo $result; ?>" class="num">
                <?php } else { ?>
                    <input type="text" value="0" class="num">
                <?php } ?>
            </div>
        </main>

        <footer></footer>
    </body>
</html>
