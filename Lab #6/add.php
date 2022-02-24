<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: Roboto;
                transition: 300ms cubic-bezier(.03,.58,.42,.89);
            }

            body {
                height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            form {
                border: 2px solid rgba(0, 0, 0, 0.2);
                border-radius: 20px;
                padding: 20px;
                width: 400px;
                display: flex;
                gap: 20px;
                flex-direction: column;
            }

            label {
                display: flex;
                flex-direction: column;
                
            }

            label span {
                font-size: 1rem;
                background: rgba(0, 0, 0, 0.2);
                width: max-content;
                padding: 5px 15px;
                border-radius: 5px 5px 0 0;
            }

            input {
                outline: none;
                font-size: 1.05rem;
                padding: 5px;
                border: 2px solid rgba(0, 0, 0, 0.2);
                border-radius: 0 5px 5px 5px;
                font-family: Roboto;
            }

            input:hover, 
            input:focus {
                border-color: rgba(0, 0, 0, 0.5);
            }

            .button {
                border: 2px solid rgba(0, 0, 0, 0.2);
                background: rgba(0, 0, 0, 0);
                font-size: 1rem;
                padding: 10px;
                border-radius: 5px;
                cursor: pointer;
            }

            .button:hover {
                background: rgba(0, 0, 0, 0.1);
                border-color: rgba(0, 0, 0, 0.5)
            }

            .link {
                position: absolute;
                left: 10px;
                top: 10px;
                display: flex;
                padding: 5px;
                align-items: center;                
            }

            img {
                width: 30px;
            }
        </style>
        <title>Add new book</title>
    </head>
    <body>
        <a class="link button" href="./index.php"><img src="back.png" alt=""></a>
        <form action="add.php" method="post">
            <label for="book-name">
                <span>Book name</span>
                <input type="text" name="bookName" required id="book-name">
            </label>
            <label for="author">
                <span>Author</span>
                <input type="text" name="author" required id="author">
            </label>
            <label for="editorial">
                <span>Editorial</span>
                <input type="text" name="editorial" required id="editorial">
            </label>
            <label for="release-year">
                <span>Release year</span>
                <input type="number" min="1" name="releaseYear" required id="release-year">
            </label>
            <label for="genre">
                <span>Genre</span>
                <input type="text" name="genre" required id="genre">
            </label>
            <label for="language">
                <span>Language</span>
                <input type="text" name="language" required id="language">
            </label>
            <input class="button" name="submit" type="submit" value="Submit">
        </form>
        <?php
            if(isset($_POST["submit"]))
            {
                $data = $_POST["bookName"] . ", " . $_POST["author"] . ", " . $_POST["editorial"] . ", " . $_POST["releaseYear"] . ", " . $_POST["genre"] . ", " . $_POST["language"] . "\n";
                $myfile = fopen("books.txt", "a") or die("Unable to open file!");
                fwrite($myfile, $data);
                fclose($myfile);
            }
        ?>
    </body>
</html>