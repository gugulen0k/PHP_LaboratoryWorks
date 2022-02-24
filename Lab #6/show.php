<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Show books</title>
        <style>
            #books {
                font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #books td, #books th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #books tr:nth-child(even){background-color: #f2f2f2;}

            #books tr:hover {background-color: #ddd;}

            #books th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #b74b4b;
                color: white;
            }
        </style>
    </head>
    <body>
        <table id="books">
            <tr>
                <th>Book name</th>
                <th>Author</th>
                <th>Editorial</th>
                <th>Release year</th>
                <th>Genre</th>
                <th>Language</th>
            </tr>
            <?php
                $books_file = fopen("books.txt", "r");
                $books_arr = [];

                if ($books_file) {
                    while (($line = fgets($books_file)) !== false) {
                        $book = explode(", ", $line);
                        array_push($books_arr, $book);
                        echo "<tr><td>" . $book[0] . "</td><td>" . $book[1] . "</td><td>" . $book[2]  . "</td><td>" . $book[3] . "</td><td>". $book[4] . "</td><td>". $book[5] ."</td></tr>";
                    }
                
                    fclose($books_file);
                } else {
                    echo "There is no books";
                }
            ?>
        </table>
    </body>
</html>