<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
		<title>Login</title>
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

			form {
				width: 400px;
				display: flex;
				flex-direction: column;
				border-radius: 10px;
				padding: 15px;
				gap: 20px;
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

			.button-case {
				display: flex;
				justify-content: flex-end;
				width: 100%;
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
		</style>
	</head>
	<body>
		<main>
			<form action="login.php" method="post">
				<span class='title'>Authorization</span>
				<label for="username">
					<span>Username</span>
					<input class="field" type="text" name="username" required id="username">
				</label>
				<label for="password">
					<span>Password</span>
					<input class="field" type="password" name="password" required id="password">
				</label>
				<p class="button-case"><input class="button" type="submit" name="submit" value="Log in"></p>
			</form>
			<a class="link" href="registration.php">Don't have an account?</a>
		</main>
		<?php
			session_start();

			if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
				header("location: home.php");
				exit;
			}

			if(isset($_POST["submit"]))
			{
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "user";

				$conn = new mysqli($servername, $username, $password, $dbname);

				$login_username = $_POST['username'];
				$login_password = $_POST['password'];

				$sql = "SELECT * FROM user_data WHERE login='$login_username' AND password='$login_password'";
				$result = $conn->query($sql);

				if (mysqli_num_rows($result) === 1) {
					$row = mysqli_fetch_assoc($result);
					if ($row['login'] === $login_username && $row['password'] === $login_password) {
						$_SESSION['loggedin'] = true;
						$_SESSION['id'] = $row['id'];
						$_SESSION['username'] = $row['login'];
						$_SESSION['password'] = $row['password'];
						$_SESSION['email'] = $row['email'];
						$_SESSION['date'] = time();
						header("location: home.php");
						exit();
					} else {
						echo "Incorect User name or password";
						exit();
					}
				}

				$conn->close();
			}
		?>
	</body>
</html>