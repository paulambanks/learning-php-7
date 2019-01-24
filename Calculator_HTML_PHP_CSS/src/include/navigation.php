<!--NAVIGATION-->

<nav class="nav"> 
    <ul class="nav-list"> 
        <li class="nav-list-item"> 
            <a class="nav-list-item-link <?php if ($CURRENT_PAGE == "Index") {?>active<?php }?>" href="index.php">HOME</a> 
        </li> 
        <li class="nav-list-item"> 
            <a class="nav-list-item-link <?php if ($CURRENT_PAGE == "Calendar") {?>active<?php }?>" href="calendar.php">CALENDAR</a> 
        </li> 
        <li class="nav-list-item"> 
            <a class="nav-list-item-link <?php if ($CURRENT_PAGE == "Calculator") {?>active<?php }?>" href="calculator.php">CALCULATOR</a> 
        </li> 
    </ul>
</nav>
