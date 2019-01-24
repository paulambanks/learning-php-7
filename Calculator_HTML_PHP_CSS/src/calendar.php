<?php include "include/page_config.php"; ?>

<!DOCTYPE html>
<html>
    <head>
        <?php include "include/head.php"; ?>
    </head>

    <body>

        <?php include "include/navigation.php"; ?>     

        <header>
            <h1 class="page-title">CALENDAR</h1>
            <p class="page-intro">This is a very simple calendar build only with PHP, CSS and HTML.</p>
        </header>

        <main class="page-container">
            <?php include 'cal_functions.php'; ?>

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
                                $current_calendar = build_calendar($curr_month_num, $curr_year);
                                echo $current_calendar;
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



