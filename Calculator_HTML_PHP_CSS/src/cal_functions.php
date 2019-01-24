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


// Calculate total number of rows for this month within calendar
function first_day_of_a_month($month_num, $year) {
    $first_day_month = mktime(0, 1, 0, $month_num, 1, $year);
    return $first_day_month;
}

function days_in_a_month($first_day_month) {
    $days_in_month = date("t", $first_day_month);
    return $days_in_month;
}

function first_day_of_a_month_num($first_day_month) {
    $first_day_month_num = date("w", $first_day_month);
    return $first_day_month_num;
}


function total_cal_cells_month($first_day_month_num, $days_in_month) {
    $total_cells = $first_day_month_num + $days_in_month;
    return $total_cells;
}

function total_rows_month($total_cells) {
    if ($total_cells < 36) {
        $cal_rows_number = 5;
    } else {
        $cal_rows_number = 6;
    }
    return $cal_rows_number;
}

function build_calendar($month_num, $year) {
    $init_day_number = 1;
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
