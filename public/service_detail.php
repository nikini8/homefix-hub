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
			$id = $_GET['id']; //get the id from the url

			if (!$id) {
				echo "No service selected.";
			} else {
				$specific_service = Service::find_by_id($id); //find the service

				echo "<p><a class='back-link' href=services.php>&larr; Back to Services</a></p>";
				echo "<h2>Service Details</h2>";

				echo "<table class='detail'>";
					echo "<tr> <td><b> Service Name </b></td>  <td>" . $specific_service->name            . "</td> </tr>";
					echo "<tr> <td><b> Description  </b></td>  <td>" . $specific_service->briefDescription . "</td> </tr>";
					echo "<tr> <td><b> Benefits     </b></td>  <td>" . $specific_service->benefits         . "</td> </tr>";
					echo "<tr> <td><b> Price        </b></td>  <td>" . $specific_service->price            . "</td> </tr>";
				echo "</table>";
			}
		?>

	</div>
</div>

<div class="footer">
	HomeFix Hub &mdash; Admin Console<br>
	Nikini Medawatta
</div>

</body>
</html>