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
				font-family: 'Work Sans';
				transition: 300ms cubic-bezier(.03, .58, .42, .89);
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

            .field {
                margin: 10px;
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

            .absolute {
                position: absolute;
                top: 20px;
                left: 20px;
            }

            section {
                display: flex;
				flex-direction: column;
                gap: 10px;
                border-radius: 10px;
				padding: 15px;
                box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;
            }
        </style>
        <title>Home</title>
    </head>
    <body>
        <main>
            <section>
                <?php
                    session_start();

                    echo "<div>Hello " . $_SESSION['username'] . "</div>";

                    $_COOKIE['counter']++;
                    setcookie("counter", $_COOKIE['counter']);
                    echo 'You visited our site ' . $_COOKIE['counter'] . ' times';

                    $date = time();
                    $differenceInSeconds = $date - $_SESSION['date'];
                    echo "<div>You logged in " . $differenceInSeconds . " seconds ago</div>";

                    $birthdate = date("d-m-Y");
                    $origin = new DateTime($birthdate);
                    $target = new DateTime($_COOKIE['birthday']);
                    $interval = $origin->diff($target);
                    $days = $interval->format('%a');

                    if($days == 0) {
                        echo "<div>Happy birthday, " . $_SESSION['username'] . "! 🎂</div>";
                    } else {
                        echo "<div>Until your birthday " . $days . " days</div>";
                    }
                ?>
            </section>

            <form action="home.php" method="post">
                <?php
                    if(!isset($_COOKIE["birthday"])) {
                        echo '<input type="date" name="birthday" class="field" id="birthday">';
                        echo '<input type="submit" name="save_birthday" class="button" value="Save">';
                    }
                ?>

                <input type="submit" name="submit" class="button absolute" value="Log out">
            </form>
            <?php
                if(array_key_exists('save_birthday', $_POST)) {
                    $birthday = date('d-m-Y', strtotime($_POST['birthday']));
                    setcookie('birthday', $birthday);
                }

                if(isset($_POST["submit"])) {
                    unset($_SESSION['loggedin']);
                    unset($_SESSION['id']);
                    unset($_SESSION['username']);
                    unset($_SESSION['password']);
                    unset($_SESSION['email']);
                    unset($_SESSION['date']);
                    header("location: login.php");
                }
            ?>
        </main>
    </body>
</html>