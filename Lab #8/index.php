<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<title>Lab 8</title>
	<style>
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-family: 'Work Sans';
			transition: 300ms cubic-bezier(.03,.58,.42,.89);
		}

		.styled-table {
			border-collapse: collapse;
			font-size: 0.9em;
			font-family: sans-serif;
			min-width: 400px;
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
		}

		.styled-table thead tr {
			background-color: #009879;
			color: #ffffff;
			text-align: left;
		}

		.styled-table th,
		.styled-table td {
			padding: 12px 15px;
		}

		.styled-table tbody tr {
			border-bottom: 1px solid #dddddd;
		}

		.styled-table tbody tr:nth-of-type(even) {
			background-color: #f3f3f3;
		}

		.styled-table tbody tr:last-of-type {
			border-bottom: 2px solid #009879;
		}

		.styled-table tbody tr .active-row {
			font-weight: bold;
			color: #009879;
		}

		.cover {
			width: 150px;
			height: 100px;
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
			display: flex;
			padding: 15px;
			margin: 10px 0;
			align-items: center;
			justify-content: center;
		}

		.add_new {
			width: 30px;
		}

		.prices {
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: space-between;
			gap: 5px;
			background: lightyellow;
			margin: 10px;
			padding: 10px;
			width: max-content;
			border-radius: 10px;
			border: 1px solid #666652;
		}

		.title {
			font-size: 1.3rem;
			font-weight: bold;
		}
	</style>
</head>
<body>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "library";

		$conn = new mysqli($servername, $username, $password, $dbname);

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}


		$sql = "SELECT * FROM eLib";

		$result = $conn->query($sql);
	?>
		<table class="styled-table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Title</th>
					<th>Author</th>
					<th>Year</th>
					<th>Publishing</th>
					<th>Subjects</th>
					<th>Price</th>
					<th>Photo</th>
				</tr>
			</thead>
			<tbody>
				<?php
					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
				?>
							<tr>
								<td><?php echo $row['id']; ?></td>
								<td><?php echo $row['title']; ?></td>
								<td><?php echo $row['author']; ?></td>
								<td><?php echo $row['year']; ?></td>
								<td><?php echo $row['publishing']; ?></td>
								<td><?php echo $row['subjects']; ?></td>
								<td><?php echo $row['price']; ?>$</td>
								<td><img src="./covers/<?php echo $row['photo']; ?>" alt="" width=200></td>
							</tr>
				<?php   }

					}

				?>

			</tbody>

		</table>
		<a class="link button" href="./add.php"><img class="add_new" src="add.png" alt=""></a>
		<div class="prices">
			<p class="title">Average prices:</p>
			<?php
				$sql = "SELECT publishing, CAST(AVG(price) AS UNSIGNED) AS 'average' FROM elib GROUP BY publishing;";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
			?>
				<p class="line"><?php echo $row['publishing'] ?>: <?php echo $row['average'] ?>$</p>
			<?php	}
				}
			?>
		</div>
</body>
</html>