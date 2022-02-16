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
        
        table, th, td {
            border: 1px solid;
        }

        td, th {
            padding: 10px 20px;
            text-align: center;
        }

        th {
            background: rgba(0, 0, 0, 0.3);
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
            width: 60%;
            border-radius: 10px;
            box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body>
    <span class="title">Задания с файлами</span>

    <div class="section">
        <h1>Задание #4</h1>
        <?php
            $data = fopen("strings.txt", "r");

            while(!feof($data)) {
                $string = fgets($data);
                if (strlen($string) < 255) {
                    echo $string . "</br>";
                }
            }
        
            fclose($data);
        ?>
    </div>

    <div class="section">
        <h1>Задание #6</h1>
        <table>
            <tr>
                <th>Name</th>
                <th>Last name</th>
                <th>Age</th>
                <th>Height</th>
                <th>Weight</th>
            </tr>
            <?php
                $users_file = fopen("users.txt", "r");
                touch("analytics.txt");
                $analytics = file_get_contents("analytics.txt");

                $users_arr = [];

                if ($users_file) {
                    while (($line = fgets($users_file)) !== false) {
                        $user = explode(" ", $line);
                        array_push($users_arr, $user);
                        echo "<tr><td>" . $user[0] . "</td><td>" . $user[1] . "</td><td>" . $user[2]  . "</td><td>" . $user[3] . "</td><td>". $user[4] . "</td></tr>";
                    }
                
                    fclose($users_file);
                } else {
                    echo "There is no users";
                }

                // Самый молодой и самый старый человек
                $min_age = $users_arr[0][2];
                $max_age = $users_arr[0][2];

                $youngest_person = $users_arr[0][0] . " " . $users_arr[0][1];
                $oldest_person = $users_arr[0][0] . " " . $users_arr[0][1];
                
                foreach ($users_arr as $key => $user) {
                    if($user[2] < $min_age) {
                        $min_age = $user[2];
                        $youngest_person = $user[0] . " " .  $user[1];
                    }
                    if($user[2] > $max_age) {
                        $max_age = $user[2];
                        $oldest_person = $user[0] . " " .  $user[1];
                    }
                }
                
                // Самый высокий и самый низкий человек
                $min_height = $users_arr[0][3];
                $max_height = $users_arr[0][3];

                $lowest_person = $users_arr[0][0] . " " . $users_arr[0][1];
                $highest_person = $users_arr[0][0] . " " . $users_arr[0][1];
                
                foreach ($users_arr as $key => $user) {
                    if($user[3] < $min_height) {
                        $min_height = $user[3];
                        $lowest_person = $user[0] . " " .  $user[1];
                    }
                    if($user[3] > $max_height) {
                        $max_height = $user[3];
                        $highest_person = $user[0] . " " .  $user[1];
                    }
                }

                // Самый худой и самый толстый человек
                $min_weigth = $users_arr[0][4];
                $max_weigth = $users_arr[0][4];

                $thinnest_person = $users_arr[0][0] . " " . $users_arr[0][1];
                $thickest_person = $users_arr[0][0] . " " . $users_arr[0][1];
                
                foreach ($users_arr as $key => $user) {
                    if($user[4] < $min_weigth) {
                        $min_weigth = $user[4];
                        $thinnest_person = $user[0] . " " .  $user[1];
                    }
                    if($user[4] > $max_weigth) {
                        $max_weigth = $user[4];
                        $thickest_person = $user[0] . " " .  $user[1];
                    }
                }

                file_put_contents('./analytics.txt', "Youngest person is $youngest_person($min_age)\nOldest person is $oldest_person($max_age)\n");
                file_put_contents('./analytics.txt', "Lowest person is $lowest_person($min_height)\Highest person is $highest_person($max_height)\n");
                file_put_contents('./analytics.txt', "Thinnest person is $thinnest_person($min_weigth)\Thickest person is $thickest_person($max_weigth)\n");
                
                fclose($users_file)
            ?>
        </table>
    </div>

    <?php
        // Задание #1
        $numbers = fopen("numbers.txt", "w");
        for ($i = 1; $i <= 999; $i++) {
            if($i % 3 === 0) fwrite($numbers, $i . "\n");
            else fwrite($numbers, $i . ' ');
        }
        fclose($numbers);
    ?>

    <?php
        // Задание #2
        $letters = fopen("letters.txt", "w");
        foreach(range('a', 'z') as $letter){
            $string = str_repeat($letter, 10);
            fwrite($letters, $string . "\n");
        }
        fclose($letters);
    ?>

    <?php
        // Задание #3
        $output = fopen("data_output.txt", "w");
        $data = fopen("data.txt", "r");
    
        while(!feof($data)) {
            $string = fgetc($data);
            $new_string = str_ireplace('c', 'a', $string);
            fwrite($data, $new_string);
        }
    
        fclose($data);
        fclose($output);
    ?>

    <?php
        // Задание #5
        $table = fopen("multiplication_table.txt", "w");

        for ( $i = 1; $i <= 20; $i++ ) {
            for ( $k = 1; $k <= 10; $k++ ) {
                fwrite($table, "$i x $k = " . $i * $k . "\n");
            }
            fwrite($table, "\n");
        }

        fclose($table);
    ?>


    
    
</body>
</html>
