<?php

$curr_month_num = date('n'); // number representing current month
$prev_month_num = date('n', strtotime('-1 months')); // number representing previous month
$next_month_num = date('n', strtotime('+1 months')); // number representing next month

$curr_month_letters = strtoupper(date('F')); // current month
$prev_month_letters = strtoupper(date('F', strtotime('-1 months'))); // previous month
$next_month_letters = strtoupper(date('F', strtotime('+1 months'))); // next month

$today_day = date("d"); // number representing today 

$today_week_day = strtoupper(date("l")); // today's weekday


$curr_year = date('Y'); // number representing current month
$prev_year = date('Y', strtotime('-1 year')); // number representing previous month
$next_year = date('Y', strtotime('+1 year')); // number representing next month

$first_day_curr_month = mktime(0, 1, 0, $curr_month_num, 1, $curr_year); //timestamp mktime(hour,minute,second,month,day,year);
$first_day_prev_month = mktime(0, 1, 0, $prev_month_num, 1, $curr_year); //timestamp mktime(hour,minute,second,month,day,year);
$first_day_next_month = mktime(0, 1, 0, $next_month_num, 1, $curr_year); //timestamp mktime(hour,minute,second,month,day,year);

$days_in_curr_month = date("t", $first_day_curr_month);
$days_in_prev_month = date("t", $first_day_prev_month);
$days_in_next_month = date("t", $first_day_next_month);

$first_day_curr_month_num = date("w", $first_day_curr_month);
$first_day_prev_month_num = date("w", $first_day_prev_month);
$first_day_next_month_num = date("w", $first_day_next_month);

function first_day_of_a_month($month_num, $year) {
    /**
     * Returns a timestamp for the first day of the month
     * 
     * @param int $month_num
     * @param int $year
     * @return timestamp $first_day_month 
     */
    $first_day_month = mktime(0, 1, 0, $month_num, 1, $year);
    return $first_day_month;
}

function days_in_a_month($month_num) {
    /**
     * Returns number of days in the given month 
     * 
     * @param int $month_num
     * @return int $days_in_month (28 -> 31)
     */
    $days_in_month = date("t", $month_num);
    return $days_in_month;
}

function first_day_of_a_month_num($first_day_month) {
    /**
     * Converts a day timestamp into a numerical value  
     * 
     * @param timestamp $first_day_month
     * @return int $first_day_month_num
     */
    $first_day_month_num = date("w", $first_day_month);
    return $first_day_month_num;
}

function total_cells_month($first_day_month_num, $days_in_month) {
    /**
     * Returns a total number of cells for a current calendar month  
     * 
     * @param int $first_day_month_num
     * @param int $days_in_month
     * @return int $total_cells
     */
    $total_cells = $first_day_month_num + $days_in_month;
    return $total_cells;
}

function total_rows_month($total_cells) {
    /**
     * Returns a total number of rows for a current calendar month  
     * 
     * @param int $total_cells
     * @return int $rows_number
     */
    if ($total_cells < 36) {
        $rows_number = 5;
    } else {
        $rows_number = 6;
    }
    return $rows_number;
}


function build_calendar($month_num, $year) {
    $init_day_number = 1;
    $first_day_month = first_day_of_a_month($month_num, $year);
    
    for ($current_row = 1; $current_row <= total_rows_month($total_cell); $current_row++) {
        if ($current_row == 1) {
            echo "<tr>";
            for ($current_cell = 0; $current_cell < 7; $current_cell++) {

                if ($current_cell == first_day_of_a_month_num($first_day_month)) {

                    echo "<td>$init_day_number</td>";
                    $init_day_number++;
                } else {

                    if ($init_day_number > 1) {
                        echo "<td>$init_day_number</td>";
                        $init_day_number++;
                    } else {
                        echo "<td>&nbsp;</td>";
                    }
                }
            } echo "</tr>" . "\n";
        } else {
            echo "<tr>";

            for ($current_cell = 0; $current_cell < 7; $current_cell++) {
                if ($init_day_number > days_in_a_month($first_day_month)) {
                    echo "<td>&nbsp;</td>";
                } else {
                    echo "<td>$init_day_number</td>";
                    $init_day_number++;
                }
            } echo "</tr>" . "\n";
        }
    }
}


