<?php
	require_once('db_connection.php');

	$stmt = $conn->prepare('SELECT * FROM classes');

	if(!$stmt) {
		echo 'Keine Tutoren gefunden!';
	} else {
		echo '<h1>Kurse</h1>';
		while($row = mysqli_fetch_array($stmt)) {
			echo '<div class="entry">';
			// echo all the data you want to display
			echo $row['name'];
			echo $row['emptyspots'];

			echo '</div>';
		}
	}
?>