<!DOCTYPE html>

<html>
    <head>
        <!--Meta information goes here-->

        <meta charset="UTF-8"> <!--charset attribute specifies the character encoding-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--gives the browser instructions on how to control the page's dimensions and scaling.-->
        <meta http-equiv="X-UA-Compatible" content="ie=edge"><!--Read more about browser support, especially for IE--> 
        <meta name="description" content=""><!--Write here your page description-->
        <meta name="author" content=""><!--Who is the author?-->
        <title>Basic Calendar</title><!--Title that will appear in a browser tag-->

        <!--User/Bootstrap CSS, fonts, icons-->

        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/calculator.css">
        <link rel="stylesheet" type="text/css" href="css/calendar.css">
        <!--Add linking to your css file-->
        <link href="https://fonts.googleapis.com/css?family=Coiny" rel="stylesheet"><!--Really good fonts source: https://fonts.google.com/-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"><!--Adding cool icons to the site from https://fontawesome.com/icons-->

    </head>
    <body>

        <nav class="nav"> 
            <ul class="nav-list"> 
                <li class="nav-list-item"> 
                    <a class="nav-list-item-link" href="index.php">HOME</a> 
                </li> 
                <li class="nav-list-item"> 
                    <a class="nav-list-item-link" href="calendar.php">CALENDAR</a> 
                </li> 
                <li class="nav-list-item"> 
                    <a class="nav-list-item-link" href="calculator.php">CALCULATOR</a> 
                </li> 
            </ul>
        </nav>

        <header>
            <h1 class="page-title">CALENDAR</h1>
            <p class="page-intro">Calendar build in PHP, HTML and CSS</p>
            <p class="page-intro"><?php echo "Today is " . date("l, jS F Y"); ?></p>
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
        if($totalCells < 36){
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
                    <td>MON</td>
                    <td>TUE</td>
                    <td>WED</td>
                    <td>THU</td>
                    <td>FRI</td>
                    <td>SAT</td>
                    <td>SUN</td>
                  </tr>

                  <?php # Create Rows
                  for($currentRow=1; $currentRow <= $rowNumber; $currentRow++){
                    if($currentRow == 1){ ?>  
                      <tr>
                        <?php for($currentCell  = 0; $currentCell<7; $currentCell++){
                        if($currentCell == $firstDay){ # First Day of the Month?> 
                          <td><?php echo $dayNumber ?></td>
                          <?php $dayNumber++;
                          } elseif($dayNumber > 1){ # First Day Passed so output Date ?>
                            <td><?php echo $dayNumber ?></td>
                            <?php $dayNumber++;
                          } else { ?>
                            <td>&nbsp;</td>
                            <?php 
                          }
                        }
                      ?>
                      </tr>
                    <?php } else { ?>
                      <tr>
                    <?php for($currentCell = 0; $currentCell < 7; $currentCell++){
                      if($dayNumber > $daysInMonth) {?>
                        <td>&nbsp;</td>
                        <?php } else { ?>  
                          <td><?php echo $dayNumber?></td>
                          <?php $dayNumber++; 
                        }
                      }?>
                    </tr>
                    <?php }}?>
                </table>
              </td>
            </tr>
        </table>
        </div>
        </main>

        <footer></footer>
    </body>
</html>
