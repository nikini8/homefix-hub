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
				header("Location: professionals.php");
				exit;
			}

			$specific_professional = Professional::find_by_id($id); //find the professional

			echo "<p><a class='back-link' href=professionals.php>&larr; Back to Professionals</a></p>";
			echo "<h2>Professional Profile</h2>";

			echo "<table class='detail'>";
				echo "<tr> <td><b> Professional ID          </b></td> <td>" . $specific_professional->id                        . "</td> </tr>";
				echo "<tr> <td><b> Full Name                </b></td> <td>" . $specific_professional->fullName                  . "</td> </tr>";
				echo "<tr> <td><b> Email Address            </b></td> <td>" . $specific_professional->emailAddress              . "</td> </tr>";
				echo "<tr> <td><b> Service Coverage Area    </b></td> <td>" . $specific_professional->serviceCoverageArea       . "</td> </tr>";
				echo "<tr> <td><b> Certifications/Licences  </b></td> <td>" . $specific_professional->certificationsandLicenses . "</td> </tr>";
				echo "<tr> <td><b> Years of Experience      </b></td> <td>" . $specific_professional->yearsOfExperience         . "</td> </tr>";
				echo "<tr> <td><b> Area of Specialisation   </b></td> <td>" . $specific_professional->areaofSpecialization      . "</td> </tr>";
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