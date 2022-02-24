<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
        <title>Lab #6</title>
        <style>
            body {
                margin: 0;
                padding: 0;
                height: 100vh;
                display: flex;
                flex-direction: column;  
                gap: 50px;
            }

            .menu {
                display: flex;
                gap: 50px;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }

            img {
                width: 150px;
            }

            .logo {
                padding: 20px 0;
                display: flex;             
                gap: 20px;
                align-items: center;
                justify-content: center;
            }

            .logo span {
                font-size: 5rem;
                font-family: "Amatic SC";
            }

            .button {
                background-color: #EAA9A9;
                border: 0 solid #E5E7EB;
                box-sizing: border-box;
                color: #000000;
                display: flex;
                font-family: Roboto;
                font-size: 1.2rem;
                font-weight: 700;
                justify-content: center;
                line-height: 1.75rem;
                padding: .75rem 1.65rem;
                position: relative;
                text-align: center;
                text-decoration: none #000000 solid;
                text-decoration-thickness: auto;
                width: 100%;
                max-width: 460px;
                position: relative;
                cursor: pointer;
                transform: rotate(-2deg);
                user-select: none;
                -webkit-user-select: none;
                touch-action: manipulation;
            }

            .button:focus {
                outline: 0;
            }

                .button:after {
                content: '';
                position: absolute;
                border: 1px solid #000000;
                bottom: 4px;
                left: 4px;
                width: calc(100% - 1px);
                height: calc(100% - 1px);
                }

                .button:hover:after {
                bottom: 2px;
                left: 2px;
            }
        </style>
    </head>

    <body>
        <div class="logo">
            <img src="./book.png" alt="">
            <span>Library</span>
        </div>

        <div class="menu">
            <a href="./show.php" class="button">Show books</a>
            <a href="./add.php" class="button">Add new book</a>
            <a href="./delete.php" class="button">Delete book</a>
        </div>
    </body>
</html>
