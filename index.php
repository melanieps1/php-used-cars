<?php
	error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP Used Car Website</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</head>
<body class="container">

	<?php
		
		function getDb() {
			// `pg` in `pg_connect` stands for Postgres
			// the below line is BAD (but easy for class)!  On the job, do not write password out here, use an env_variable in the future.
			// $db = pg_connect("host=localhost port=5432 dbname=cars_dev user=carsuser password=carscarscars");
			// return $db;

			// Heroku Deploy Stuff

			// $raw_url = 'postgres://rlhyjdtnnxsmka:3efac858a4af26947c4258e29ec35ec5e1385c9e943486dbe5c309c6a3229a88@ec2-23-21-92-251.compute-1.amazonaws.com:5432/d8emegapfvhmsh';

			// $url = parse_url($raw_url);

			if (file_exists('.env')) {
				require __DIR__ . '/vendor/autoload.php';
				$dotenv = new Dotenv\Dotenv(__DIR__);
				$dotenv->load();
			}

			$url = parse_url(getenv("DATABASE_URL"));

			// var_dump($url);

			$db_port = $url['port'];
			$db_host = $url['host'];
			$db_user = $url['user'];
			$db_pass = $url['pass'];
			$db_name = substr($url['path'], 1);

			$db = pg_connect(
			"host=" . $db_host . 
			" port=" . $db_port . 
			" dbname=" . $db_name . 
			" user=" . $db_user . 
			" password=" . $db_pass);
			return $db;

		}

		function getInventory() {
			// Creating a request for fetching the data
			$request = pg_query(getDb(), "
				SELECT i.id, i.year, i.mileage, ma.name as make, mo.name as model, mo.doors
				FROM inventory i
				JOIN models mo ON i.model_id = mo.id
				JOIN makes ma ON mo.make_id = ma.id;
			");

			// Now getting all of the records in one chunk - this is a PATTERN that we will repeat a lot!!!
			return pg_fetch_all($request);
		}

	?>

	<h1>PHP Used Car Website</h1>
	<h2>Quality pre-owned vehicles, powered by PHP!</h2>
	<br>

	<table class="table">
		<tr>
			<th>ID</th>
			<th>Year</th>
			<th>Make</th>
			<th>Model</th>
			<th>Doors</th>
			<th>Mileage</th>
		</tr>

	<?php

	// var_dump(getinventory());

	// This foreach loop is cycling through the whole chunk of data we are getting back from the query and going through it line by line
		// foreach (getInventory() as $car) {
		// 	// var_dump($car);
		// 	// $car is an associative array

		// 	echo "<tr>";

		// // This foreach loop is going through the data field by field
		// 	foreach ($car as $field => $value) {
		// 		// echo "$field is $value\n";
		// 		echo "<td>$value</td>";
		// 	}
		// 	echo "</tr>\n";
		// }

		foreach (getInventory() as $car) {
			echo "<tr>";
				echo "<td>" . $car['id'] . "</td>";
				echo "<td>" . $car['year'] . "</td>";
				echo "<td>" . $car['make'] . "</td>";
				echo "<td>" . $car['model'] . "</td>";
				echo "<td>" . $car['doors'] . "</td>";
				echo "<td>" . $car['mileage'] . "</td>";
			echo "<tr>\n";
		}		

	?>

	</table>

</body>
</html>