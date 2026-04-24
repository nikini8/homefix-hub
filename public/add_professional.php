<?php
	require_once '../private/initialize.php';  // initialize the website
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

		// Check if the form has been submitted (POST request)
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {

			// Collect all submitted form values into the $args array
			$args = [];
			$args['fullName']                  = $_POST['fullName'];
			$args['emailAddress']              = $_POST['emailAddress'];
			$args['serviceCoverageArea']       = $_POST['serviceCoverageArea'];
			$args['certificationsandLicenses'] = $_POST['certificationsandLicenses'];
			$args['yearsOfExperience']         = $_POST['yearsOfExperience'];
			$args['areaofSpecialization']      = $_POST['areaofSpecialization'];

			// Create a new Professional object and assign the form values to its properties
			$professional = new Professional;
			$professional->fullName                  = $args['fullName'];
			$professional->emailAddress              = $args['emailAddress'];
			$professional->serviceCoverageArea       = $args['serviceCoverageArea'];
			$professional->certificationsandLicenses = $args['certificationsandLicenses'];
			$professional->yearsOfExperience         = $args['yearsOfExperience'];
			$professional->areaofSpecialization      = $args['areaofSpecialization'];

			// Call create() - the instance method that runs the INSERT SQL query
			$results = $professional->create();

			if ($results) {
				echo "<p class='success'>New professional added successfully.</p>";
			}

		} else {

			// No POST request yet - display the empty form
			echo "<h2>Add New Professional</h2>";
			echo "<p>Use the following form to add a new certified professional.</p>";

			echo "<form action=add_professional.php method='post'>";
				echo "<table>";
					echo "<tr> <td> Full Name </td>                 <td> <input type='text'   name='fullName'>                  </td> </tr>";
					echo "<tr> <td> Email Address </td>             <td> <input type='email'  name='emailAddress'>              </td> </tr>";
					echo "<tr> <td> Service Coverage Area </td>     <td> <input type='text'   name='serviceCoverageArea'>       </td> </tr>";
					echo "<tr> <td> Certifications/Licences </td>   <td> <input type='text'   name='certificationsandLicenses'> </td> </tr>";
					echo "<tr> <td> Years of Experience *** </td>   <td> <input type='number' name='yearsOfExperience'>         </td> </tr>";
					echo "<tr> <td> Area of Specialisation </td>    <td> <input type='text'   name='areaofSpecialization'>      </td> </tr>";
				echo "</table>";
				echo "<br><input type='submit' value='Add Professional'>";
			echo "</form>";

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
