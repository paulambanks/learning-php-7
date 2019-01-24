<?php include "include/page_config.php"; ?>

<!DOCTYPE html>
<html>
    <head>
        <?php include "include/head.php"; ?>
    </head>

    <body>

        <?php include "include/navigation.php"; ?>      

        <header>
            <h1 class="page-title">CALCULATOR</h1>
            <p class="page-intro">This is a very simple calculator build only with PHP, CSS and HTML Feel free to have some fun with it. The calculator numerical input will be filtered so make sure you're using numbers. Also... make sure you are not dividing by 0.</p>
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
                <form method="POST" action="index.php">
                    <input type="text" name="first" class="num" autocomplete="off" placeholder="Enter the first number">
                    <input type="text" name="second" class="num" autocomplete="off" placeholder="Enter the second number">
                    <?php echo ($errorMsg !== null) ? '<p class="error-msg"><i class="fas fa-exclamation-circle"></i> ERROR: ' . $errorMsg . '</p>' : null; ?>
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

        <?php include ("include/footer.php"); ?> 
    </body>
</html>




