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
			$db = pg_connect("host=localhost port=5432 dbname=cars_dev user=carsuser password=carscarscars");
			return $db;
		}

		function getInventory() {
			// Creating a request for fetching the data
			$request = pg_query(getDb(), "
				SELECT i.id, i.year, i.mileage, ma.name as make, mo.name as model, mo.doors, c.name as color
				FROM inventory i
				JOIN models mo ON i.model_id = mo.id
				JOIN makes ma ON mo.make_id = ma.id
				JOIN colors c ON i.color_id = c.id;
			");
			// Now getting all of the records in one chunk - this is a pattern that we will repeat a lot!!!
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
			<th>Mileage</th>
			<th>Make</th>
			<th>Model</th>
			<th>Doors</th>
			<th>Color</th>
		</tr>

	<?php

	// var_dump(getinventory());

	// This foreach loop is cycling through the whole chunk of data we are getting back from the query and going through it line by line
		foreach (getInventory() as $car) {
			// var_dump($car);
			// $car is an associative array

			echo "<tr>";

		// This foreach loop is going through the data field by field
			foreach ($car as $field => $value) {
				// echo "$field is $value\n";
				echo "<td>$value</td>";
			}

			echo "</tr>\n";

		}

		?>

	</table>

</body>
</html>