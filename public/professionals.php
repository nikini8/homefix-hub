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
			echo "<h2>Certified Professionals</h2>";

			// show success message if action was performed
			if (isset($_GET['msg'])) {
				if ($_GET['msg'] === 'deleted') {
					echo "<p class='success'>Professional successfully deleted.</p>";
				}
				if ($_GET['msg'] === 'added') {
					echo "<p class='success'>New professional successfully added.</p>";
				}
				if ($_GET['msg'] === 'updated') {
					echo "<p class='success'>Professional successfully updated.</p>";
				}
			}

			$professional_array = Professional::find_all(); //get all professionals

			echo "<table border=1 width=100%>";
				echo "<tr>";
					echo "<th> # </th>";
					echo "<th> Full Name </th>";
					echo "<th> Specialisation </th>";
					echo "<th> &nbsp; </th>";
					echo "<th> &nbsp; </th>";
				echo "</tr>";

			$count = 1;
			foreach ($professional_array as $professional) {
				echo "<tr>";
					echo "<td>" . $count . "</td>";
					echo "<td> <a class='name-link' href=professional_detail.php?id=" . $professional->id . "> " . $professional->fullName . " </a> </td>";
					echo "<td>" . $professional->areaofSpecialization . "</td>";
					echo "<td> <a class='btn-update' href=update_professional.php?id=" . $professional->id . "> Update </a> </td>";
					echo "<td> <a class='btn-delete' href=delete_professional.php?id=" . $professional->id . "> Delete </a> </td>";
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