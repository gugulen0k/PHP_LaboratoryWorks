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

            main {
				width: 100%;
				height: 100vh;
				display: flex;
				justify-content: center;
				align-items: center;
				flex-direction: column;
				gap: 20px;
			}

			form {
				width: 400px;
				display: flex;
				flex-direction: column;
				border-radius: 10px;
				padding: 15px;
				gap: 10px;
				box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;
			}

			.field {
				font-size: 1.2rem;
				padding: 5px;
				outline: none;
				border: 1px solid rgba(0, 0, 0, 0.2);
				border-radius: 5px;
			}

			.field:hover,
			.field:focus,
			.field:active {
				border: 1px solid rgba(0, 0, 0, 0.8);
			}

			.button {
				font-size: 1.3rem;
				padding: 5px;
				outline: none;
				border: 1px solid rgba(0, 0, 0, 0.2);
				border-radius: 5px;
				cursor: pointer;
				background: white;
				width: 100px;
			}

			.button:hover,
			.button:focus,
			.button:active {
				background: black;
				color: white;
			}

			.title {
				display: flex;
				justify-content: center;
				margin: 10px 0 10px 0;
				font-size: 2rem;
				font-weight: bold;
			}

			.title img {
				width: 40px;
			}

			.link {
				text-decoration: none;
				color: #499ac9;
			}

            label {
				display: flex;
				flex-direction: column;
			}

			label span {
				font-size: 1.1rem;
				font-weight: 500;
				margin-bottom: 5px;
			}

            .buttons {
                display: flex;
                justify-content: space-between;
            }

            .link-button {
                font-size: 1.3rem;
				padding: 5px;
				outline: none;
				border: 1px solid rgba(0, 0, 0, 0.2);
				border-radius: 5px;
				cursor: pointer;
				background: white;
				width: 100px;
                text-decoration: none;
                text-align: center;
                color: black;
            }

            .link-button:hover,
			.link-button:focus,
			.link-button:active {
				background: black;
				color: white;
			}

            .message {
                color: lightgreen;
            }
        </style>
        <title>Register</title>
    </head>

    <body>
        <main>
            <form action="registration.php" method="post">
                <span class="title">Registration</span>
                <label for="username">
                    <span>Username</span>
                    <input class="field" type="text" name="username" required id="username">
                </label>
                <label for="password">
                    <span>Password</span>
                    <input class="field" type="password" name="password" required id="password">
                </label>
                <label for="email">
                    <span>Email</span>
                    <input class="field" type="email" min="1" name="email" required id="email">
                </label>
                <div class="buttons">
                    <a class="link-button" href="./login.php">Log in</a>
                    <input class="button" name="submit" type="submit" value="Sign up">
                </div>
            </form>
            <?php
                if(isset($_POST["submit"]))
                {
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "user";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    $login_username = $_POST['username'];
                    $login_password = $_POST['password'];
                    $login_email = $_POST['email'];

                    $sql = "INSERT INTO `user_data` (`id`, `login`, `password`, `email`) VALUES (NULL, '$login_username', '$login_password', '$login_email');";
                    $result = $conn->query($sql);

                    if ($result == TRUE) {
                        echo "<p class='message'>New record created successfully.</p>";
                    } else {
                        echo $result;
                    }

                    $conn->close();
                }
            ?>
        </main>
    </body>
</html>