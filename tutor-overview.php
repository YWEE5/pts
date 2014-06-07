<?php
	require_once('db_connection.php');

	$stmt = $conn->prepare('SELECT * FROM tutor');

	if(!$stmt) {
		echo 'Keine Tutoren gefunden!';
	} else {
		echo '<h1>Tutoren</h1>';
		while($row = mysqli_fetch_array($stmt)) {
			echo '<div class="entry">';
			// echo all the data you want to display
			echo $row['name'];
			echo $row['secondname'];
			echo $row['classes'];

			echo '</div>';
		}
	}
?>