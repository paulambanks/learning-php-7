<!--PAGE CONFIG-->

<?php

switch ($_SERVER["SCRIPT_NAME"]) {
    case "/calendar.php":
        $CURRENT_PAGE = "calendar";
        $PAGE_TITLE = "Calendar";
        break;
    case "/calculator.php":
        $CURRENT_PAGE = "calculator";
        $PAGE_TITLE = "Calculator";
        break;
    default:
        $CURRENT_PAGE = "Index";
        $PAGE_TITLE = "Welcome to my homepage!";
}