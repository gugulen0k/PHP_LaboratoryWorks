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

			input {
                outline: none;
                font-size: 1rem;
                padding: 5px;
                border: 1px solid rgba(0, 0, 0, 0.2);
                border-radius: 5px;
                font-family: Roboto;
            }

            input:hover,
            input:focus {
                border-color: rgba(0, 0, 0, 0.5);
            }

			input[type='submit'] {
				cursor: pointer;
			}

			body {
				height: 100vh;
				display: flex;
				gap: 50px;
				flex-direction: column;
				justify-content: center;
				align-items: center;
			}

			img {
				width: 100px;
			}

			.weather-info {
				display: flex;
				align-items: center;

				width: max-content;
				padding: 20px;
				border-radius: 10px;

				gap: 20px;
				box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
			}
		</style>
		<title>Lab 7</title>
	</head>
	<body>
		<form action="index.php" method="post">
			<span>Date</span>
			<input name="date" type="date">
			<input name="submit" type="submit" value="OK">
		</form>
		<?php
			$db = mysqli_connect('localhost', 'root', '', 'weather');

			if(isset($_POST["submit"])) {
				$date = $_POST['date'];
				$sql_query = "SELECT Name, Today, Temperature, Speed, Direction FROM daily_weather INNER JOIN weather_type ON daily_weather.Type=weather_type.Id WHERE daily_weather.Today='$date'";
				$record = mysqli_query($db, $sql_query);
				$row = mysqli_fetch_array($record);

				echo "<div class='weather-info'>";
					echo "<div class='block'>";
						echo "<div>Date: " . $row['Today'] . "</div>";
						echo "<div>Temperature: " . $row['Temperature'] . "</div>";
						echo "<div>Wind: " . $row['Speed'] . " " . $row['Direction'] . "</div>";
					echo "</div>";
					echo "<img src='/weather/" . $row['Name'] . "' alt=''/>";
				echo "</div>";
			}
		?>
	</body>
</html>