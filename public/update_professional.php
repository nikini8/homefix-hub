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

		$specific_professional = Professional::find_by_id($id); //find the professional to update

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {

			// collect new values from the form into $args array
			$args = [];
			$args['fullName']                  = $_POST['fullName'];
			$args['emailAddress']              = $_POST['emailAddress'];
			$args['serviceCoverageArea']       = $_POST['serviceCoverageArea'];
			$args['certificationsandLicenses'] = $_POST['certificationsandLicenses'];
			$args['yearsOfExperience']         = $_POST['yearsOfExperience'];
			$args['areaofSpecialization']      = $_POST['areaofSpecialization'];

			$specific_professional->merge_attributes($args); //update object properties with new values

			$results = $specific_professional->update(); //call update() to save to database

			if ($results) {
				echo "<p class='success'>Professional updated successfully.</p>";
			}

			echo "<p>Details of the updated professional</p>";

			echo "<table class='detail'>";
				echo "<tr> <td><b> Professional ID          </b></td> <td>" . $specific_professional->id                        . "</td> </tr>";
				echo "<tr> <td><b> Full Name                </b></td> <td>" . $specific_professional->fullName                  . "</td> </tr>";
				echo "<tr> <td><b> Email Address            </b></td> <td>" . $specific_professional->emailAddress              . "</td> </tr>";
				echo "<tr> <td><b> Service Coverage Area    </b></td> <td>" . $specific_professional->serviceCoverageArea       . "</td> </tr>";
				echo "<tr> <td><b> Certifications/Licences  </b></td> <td>" . $specific_professional->certificationsandLicenses . "</td> </tr>";
				echo "<tr> <td><b> Years of Experience      </b></td> <td>" . $specific_professional->yearsOfExperience         . "</td> </tr>";
				echo "<tr> <td><b> Area of Specialisation   </b></td> <td>" . $specific_professional->areaofSpecialization      . "</td> </tr>";
			echo "</table>";

		} else {

			// no POST yet - show the form pre-filled with current values
			echo "<h2>Update Professional</h2>";
			echo "<p>Use the following form to update the selected professional.</p>";

			echo "<form action=update_professional.php?id=" . $id . " method='post'>";
				echo "<table>";
					echo "<tr> <td> Full Name </td>                <td> <input type='text'   name='fullName'                  value='$specific_professional->fullName'>                  </td> </tr>";
					echo "<tr> <td> Email Address </td>            <td> <input type='email'  name='emailAddress'              value='$specific_professional->emailAddress'>              </td> </tr>";
					echo "<tr> <td> Service Coverage Area </td>    <td> <input type='text'   name='serviceCoverageArea'       value='$specific_professional->serviceCoverageArea'>       </td> </tr>";
					echo "<tr> <td> Certifications/Licences </td>  <td> <input type='text'   name='certificationsandLicenses' value='$specific_professional->certificationsandLicenses'> </td> </tr>";
					echo "<tr> <td> Years of Experience *** </td>  <td> <input type='number' name='yearsOfExperience'         value='$specific_professional->yearsOfExperience'>         </td> </tr>";
					echo "<tr> <td> Area of Specialisation </td>   <td> <input type='text'   name='areaofSpecialization'      value='$specific_professional->areaofSpecialization'>      </td> </tr>";
				echo "</table>";
				echo "<input type='submit' value='Update Professional'>";
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