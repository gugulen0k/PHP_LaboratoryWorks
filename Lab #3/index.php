<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab #3</title>
</head>
<body>
    <h3>================================= [ Task #1 ] =================================</h3>
    <?php
        $numbers = [4, -8, 7, -6, 0, -7, 5];
        $temp = [];
        $length = count($numbers);

        for($i = 0; $i < $length; $i++)
        { 
            if ($numbers[$i] < 0) {
                array_push($temp, $numbers[$i]);
                unset($numbers[$i]);
            }
        }

        asort($numbers);
        arsort($temp);       
        $final_arr = array_merge($numbers, $temp);

        echo '<p>'. implode(', ', $final_arr) . '</p>';       
    ?>
    <h3>================================= [ Task #2 ] =================================</h3>
    <?php
        $numbers = [14, -2, 3, 14, 3, -2, 5];
        $cleanArray = array_unique($numbers); 
        echo count($cleanArray);
    ?>
    <h3>================================= [ Task #3 ] =================================</h3>
    <?php
        $arr = [-1, 2, 5, 0, 2];
 
        $sum = array_sum($arr);
        $new_arr = [];
         
        for($i = 0; $i < count($arr) - 1; $i++) {
            $new_arr[2 * $i] = $arr[$i];
            $new_arr[2 * $i + 1] = $sum - $arr[$i] - $arr[$i+1];
            $new_arr[2 * $i + 2] = $arr[$i + 1];
        }
         
        echo '<p>'. implode(', ', $new_arr) . '</p>';
    ?>
    <h3>================================= [ Task #4 ] =================================</h3>
    <?php
        $array = [42, 46, 72, 45, 79, 45, 51, 69, 57, 22];
        shuffle($array);

        $k = 5; // позиция элемента
        $copy = $array;
        sort($copy);    
        $value = $copy[$k - 1];
         
        echo '<p>'. implode(', ', $array) . '</p>';
        echo '<p>На позиции ' . $k . ' в отсортированном массиве будет значение ' . $value . ' [' . $min . ']</p>';
        
    ?>
    <h3>================================= [ Task #5 ] =================================</h3>
    <?php
        $str = 'london is the capital of great britain';
        echo ucwords($str);
    ?>
    <h3>================================= [ Task #6 ] =================================</h3>
    <?php
        $str = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto, fugit?';
        $last3 = substr($str, -3, 3);
        echo $last3;
    ?>
    <h3>================================= [ Task #7 ] =================================</h3>
    <?php
        $str = 'picture.png';
        if (substr($str, -4) == '.png' || substr($str, -4) == '.jpg')
            echo 'да';
        else 
            echo 'нет'
    ?>
    <h3>================================= [ Task #8 ] =================================</h3>
    <?php
        $str = '1a2b3c4b5d6e7f8g9h0';
        $exitStr = preg_replace("/\d/", "", $str);
        echo $exitStr;
    ?>
    <h3>================================= [ Task #9 ] =================================</h3>
    <?php
        $arr = ['html', 'css', 'php'];
        $str = implode(', ', $arr);
        echo $str;
    ?>
</body>
</html>
 
