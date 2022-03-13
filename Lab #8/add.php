<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: "Work Sans";
                transition: 300ms cubic-bezier(.03,.58,.42,.89);
            }

            body {
                height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
            }

            .message {
                margin: 20px 0;
                color: limegreen;
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
                font-family: 'Work Sans';
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
        <form action="add.php" method="post" enctype="multipart/form-data">
            <label for="book-name">
                <span>Book name</span>
                <input type="text" name="book-name" required id="book-name">
            </label>
            <label for="author">
                <span>Author</span>
                <input type="text" name="author" required id="author">
            </label>
            <label for="release-year">
                <span>Release year</span>
                <input type="number" min="1" name="release-year" required id="release-year">
            </label>
            <label for="publishing">
                <span>Publishing</span>
                <input type="text" name="publishing" required id="publishing">
            </label>
            <label for="subjects">
                <span>Subjects</span>
                <input type="text" name="subjects" required id="subjects">
            </label>
            <label for="price">
                <span>Price</span>
                <input type="number" name="price" required id="price">
            </label>
            <label for="photo">
                <span>Photo</span>
                <input type="file" name="photo" required id="photo">
            </label>
            <input class="button" name="submit" type="submit" value="Submit">
        </form>
        <?php
            if(isset($_POST["submit"]))
            {
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "library";

                $conn = new mysqli($servername, $username, $password, $dbname);

                $book_name = $_POST['book-name'];
                $author = $_POST['author'];
                $year = $_POST['release-year'];
                $publishing = $_POST['publishing'];
                $subjects = $_POST['subjects'];
                $price = $_POST['price'];

                $uploaddir = './covers/';
                $file_name = $_FILES['photo']['name'];
                $uploadfile = $uploaddir . basename($_FILES['photo']['name']);

                $sql = "INSERT INTO `elib` (`id`, `title`, `author`, `year`, `publishing`, `subjects`, `price`, `photo`) VALUES (NULL, '$book_name', '$author', '$year', '$publishing', '$subjects', '$price', '$file_name');";
                $result = $conn->query($sql);

                move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile);

                if ($result == TRUE) {
                    echo "<p class='message'>New record created successfully.</p>";
                }

                $conn->close();
            }
        ?>
    </body>
</html>