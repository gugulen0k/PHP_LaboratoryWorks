<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lab #2</title>
        <style>
            .red {
                color: red;
            }
            .blue {
                color: blue;
            }
            .black {
                background: rgba(0, 0, 0, 0.5);
                color: white;
            }
            .calendar {
                text-align: center;
                padding: 5px;
            }
        </style>
    </head>
    <body>
        <h3>====================== [ Task #1 ] ======================</h3>
        <?php
            $final = 100 ;
            $start = 2 ;

            for ( $i = 1 ; $i < $final ; $i++ )
            {
                for ( $j = 1 ; $j <= $i ; $j++)
                {
                    if ( $i % $j == 0 )
                    {
                        $start++ ;
                    }
                }
                if ( $start <= 2 )
                {
                    echo $i . "&nbsp;|&nbsp;";
                }
                $start = 0;
            }
        ?>
        <h3>====================== [ Task #2 ] ======================</h3>
        <?php
            for ( $i = 1; $i < 10; $i++ ) {
                for ( $k = 1; $k < 10; $k++ ) {
                  echo "$i x $k = " . $i * $k . "&nbsp;&nbsp;&nbsp;&nbsp;";
                }
                echo "</br>";
            }
        ?>

        <h3>====================== [ Task #3 ] ======================</h3>
        <?php
            for ( $i = ord('a'); $i <= ord('z'); $i++ )
            {
                if(!preg_match('/^[^aeiou]*$/i', chr($i))) echo "<span class='red'>" . chr($i) . "</span>";
                else echo "<span class='blue'>" . chr($i) . "</span>";
            }
        ?>

        <h3>====================== [ Task #4 ] ======================</h3>
        <?php
            for ( $i = 0; $i <= 100; $i++ ) {
                if ($i % 2 == 0) echo "<div class='black'>" . $i . "</div>";
                else echo "<div>" . $i . "</div>";
                
            }
        ?>

        <h3>====================== [ Task #5 ] ======================</h3>
        <?php
            echo "<table>";
            for ( $i = 1; $i <= 31; $i++ ) {
                // echo "<tr>";
                if ($i % 7 == 0) echo "<td class='calendar'> " . $i . " </td>" . "</tr>";
                else echo "<td class='calendar'> " . $i . " </td>";
            }
            echo "</table>"
        ?>

        <h3>====================== [ Task #6 ] ======================</h3>
        <table border='2'>
        <?php
            for($i = 1; $i < 9;$i++)
            {
                echo "<tr>"; 
                for($j = 1; $j < 9; $j++)
                {
                    $total = $i + $j;
                    if($total % 2 == 0)
                    {
                        echo "<td style='background-color: black;' width = 50px; height = 50px;> </td>";
                    }
                    else
                    {
                        echo "<td width = 50px; height = 50px;> </td>";
                    }
                    
                }
                echo "</tr>";
            }
        ?>
        </table>

    </body>
</html>