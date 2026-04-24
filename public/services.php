<?php
	require_once '../private/initialize.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>HomeFix Hub</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel=stylesheet type=text/css href=style.css>
</head>

<body>
<div class="header">
	HomeFix <span>Hub</span> <br>
	Plumbing - Electrical - Carpentry - Painting
</div>

<div class="row">
	<div class="column side">
		<?php include 'navigation.html'; ?>
	</div>
	<div class="column middle">

		<?php
			echo "<h2>Services Offered</h2>";

			$service_array = Service::find_all(); //get all services

			echo "<table border=1 width=100%>";
				echo "<tr>";
					echo "<th> # </th>";
					echo "<th> Service Name </th>";
				echo "</tr>";

			$count = 1;
			foreach ($service_array as $service) {
				echo "<tr>";
					echo "<td>" . $count . "</td>";
					echo "<td> <a class='name-link' href=service_detail.php?id=" . $service->id . "> " . $service->name . " </a> </td>"; //link to service detail page
				echo "</tr>";
				$count++;
			}

			echo "</table>";
		?>

	</div>
</div>

<div class="footer">
	HomeFix Hub &mdash; Admin Console<br>
	Nikini Medawatta
</div>

</body>
</html>