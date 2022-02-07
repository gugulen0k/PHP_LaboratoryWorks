<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <title>Lab #3</title>

    <style>
        body {
            font-family: 'Amatic SC';
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 50px;
        }

        table {
            border-collapse: collapse;
        }

        td {
            padding: 10px;
        }

        span {
            font-size: 4rem;
            font-family: 'Amatic SC', cursive;
            font-weight: bold;
            text-align: center;
        }

        .title {
            background: #121314;
            color: white;
            padding: 0 15px;
            border-radius: 10px;
        }
        
        h1,
        h3 {
            margin: 0;
            font-family: 'Amatic SC', cursive;
            text-align: center;
        }

        .normal-text {
            font-family: Roboto;
            font-size: 1.5rem;
        }

        .section {
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 20px;
            height: 300px;
            width: 60%;
            border-radius: 10px;
            box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body>
    <span class="title">Задания с датами</span>

    <div class="section">
        <h1>Задание #1</h1>
        <?php
            echo "Текущее время в формате timestamp: " . time();  
        ?>
    </div>

    <div class="section">
        <h1>Задание #2</h1>
        <?php
            echo "Количество секунд, прошедших с 13:12:59 15-го марта 2000 года до настоящего момента времени: " . mktime(13, 12, 59, 3, 15, 2000) . " секунд";
        ?>
    </div>

    <div class="section">
        <h1>Задание #3</h1>
        <?php
            $week = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
            $day = date('w');
            echo "Нынешний день недели: " . $week[$day] . "</br>";

            $day1 = date('w', mktime(0, 0, 0, 12, 11, 2002));
            echo "День недели моего рождения: " . $week[$day1];
        ?>
    </div>
    
    <div class="section">
        <h1>Задание #4</h1>
        <?php
            $year = 2022;
            $isLeapYear = date('L', mktime(0, 0, 0, 1, 1, $year));

            if ($isLeapYear) {
                echo "$year год високосный";
            } else {
                echo "$year год не високосный";
            }
        ?>
    </div>

    <div class="section">
        <h1>Задание #5</h1>
        <?php
            $newyear = mktime(0, 0, 0, 1, 1, date('Y') + 1);
            $sec = $newyear - time();
            $days = floor($sec / (60*60*24));
            echo "До нового года осталось: $days дней";
        ?>
    </div>

    <span class="title">Задания с функциями</span>

    <div class="section">
        <h1>Задание #1</h1>
        <?php
            function isNumberInRange($number) {
                if ($number > 0 && $number < 10) {
                    return true;
                } else {
                    return false;
                }
            }

            echo isNumberInRange(9) == true ? "Число находится в диапазоне от 0 до 10" : "Число не находится в диапазоне от 0 до 10";
        ?>
    </div>

    <div class="section">
        <h1>Задание #2</h1>
        <?php
            function yearsEqualTo13() {
                $years = [];
                for ($i = 1; $i <= 2020; $i++) {
                    if (array_sum(str_split($i)) == 13) {
                        echo "$i, ";
                    }
                }
            }
            echo "<div>Все года от 1 до 2020, сумма цифр которых равна 13:</div>";
            yearsEqualTo13();
        ?>
    </div>

    <div class="section">
        <h1>Задание #3</h1>
        <?php
            function getDivisors($num) {
                $result = [];
                for ($i = 1; $i < $num; $i++)
                    if ($num % $i == 0)
                        array_push($result, $i);
                return $result;
            }

            $number = 10;
            $divisors = getDivisors($number);

            echo "Делители числа $number = " . implode(", ", $divisors);
        ?>
    </div>

    <div class="section">
        <h1>Задание #4</h1>
        <?php
            function luckyTickets() {
                for($i = 100000; $i <= 999999; $i++){
                    $num = (string)$i;
                    if ($num[0] + $num[1] + $num[2] == $num[3] + $num[4] + $num[5]) {
                        $count++;
                    }       
                }
                return $count;
            }
             
            echo 'Всего счастливых билетов: ' . luckyTickets();
        ?>
    </div>

    <div class="section">
        <h1>Задание #5</h1>
        <?php
            function xArray() {
                $array = array_fill(0, 10, 'x');
                echo "<table border=1><tr>";
                for ($i = 0; $i < 10; $i++) {
                    echo "<td>$i</td>";
                }
                echo "</tr><tr>";
                for ($i = 0; $i < 10; $i++) {
                    echo "<td>" . $array[$i] . "</td>";
                }
                echo "</tr>";
                echo "</table>";
            }
            xArray();
        ?>
    </div>

    <div class="section">
        <h1>Задание #6</h1>
        <?php
            function sumOfSubStrings() {
                $str = '1234567890';
                $arr = str_split($str, 2);
                $result = array_sum($arr);
                echo $result;
            }

            sumOfSubStrings();
        ?>
    </div>
    
</body>
</html>
