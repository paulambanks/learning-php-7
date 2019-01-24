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
            $month_num = date("n");
            $month_letters = strtoupper(date("F"));
            $today_day = date("d");
            $today_week_day = strtoupper(date("l"));
            $year = date("Y");
            $firstDay = mktime(0, 1, 0, $month_num, 1, $year); //timestamp mktime(hour,minute,second,month,day,year);

            $daysInMonth = date("t", $firstDay);

            $firstDay = date("w", $firstDay);

            # Calculate number of rows
            $totalCells = $firstDay + $daysInMonth;
            if ($totalCells < 36) {
                $rowNumber = 5;
            } else {
                $rowNumber = 6;
            }
            $dayNumber = 1;
            ?>

            <div class="calendar">
                <table class="calendar-main-table">
                    <tr class="calendar-top today-date">
                        <td><?php echo $today_day; ?></td>
                    </tr>
                    <tr class="calendar-top today-week-day">
                        <td><?php echo $today_week_day; ?></td>
                    </tr>
                    <tr class="calendar-top current-month-year">
                        <td><?php echo $month_letters . " " . $year; ?></td>
                    </tr>
                    <tr class="calendar-top week-day-list">
                        <td>
                            <table class="table-week-day-list">
                                <tr>
                                    <td>SUN</td>
                                    <td>MON</td>
                                    <td>TUE</td>
                                    <td>WED</td>
                                    <td>THU</td>
                                    <td>FRI</td>
                                    <td>SAT</td>
                                </tr>

                                <?php
                                # Create Rows
                                for ($currentRow = 1; $currentRow <= $rowNumber; $currentRow++) {
                                    if ($currentRow == 1) {
                                        ?>  
                                        <tr>
                                            <?php
                                            for ($currentCell = 0; $currentCell < 7; $currentCell++) {
                                                if ($currentCell == $firstDay) {
                                                    ?> 
                                                    <td><?php echo $dayNumber ?></td>
                                                    <?php
                                                    $dayNumber++;
                                                } elseif ($dayNumber > 1) {
                                                        ?>
                                                        <td><?php echo $dayNumber ?></td>
                                                        <?php
                                                        $dayNumber++;
                                                    } else {
                                                        ?>
                                                        <td>&nbsp;</td>
                                                        <?php
                                                    }
                                                }
                                            
                                            ?>
                                        </tr>
                                        <?php } else { ?>
                                        <tr>
                                            <?php
                                            for ($currentCell = 0; $currentCell < 7; $currentCell++) {
                                                if ($dayNumber > $daysInMonth) {
                                                    ?>
                                                    <td>&nbsp;</td>
                                                <?php } else { ?>  
                                                    <td><?php echo $dayNumber ?></td>
                                                    <?php
                                                    $dayNumber++;
                                                }
                                            }
                                            ?>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>

        </main>

<?php include ("include/footer.php"); ?> 
    </body>
</html>



