<?php
require_once('connect.php');

try{
	$conn = new PDO(sprintf('mysql:host=%s;dbname=%s', $host, $dbname), $user, $pass);
	if(!$conn)
		echo 'Keine Verbindung hergestellt!';
	$sql = 'SELECT * FROM benutzer';
	$result = $conn->query($sql);
	if(!$result) {
		echo 'Keine Datensätze gefunden!';
	} else {
		echo '<table>';
		foreach($result as $row) {
			echo '<tr>';
			echo '<a href="?site=tutor-detail&tutorId=' .$row['U_ID'] . '">' . $row['Vorname'] . ' ' . $row['Nachname'] . '</a><br />';
			echo '</tr>';
		}
		echo '</table>';
	}
}
catch (PDOException $e){	
	echo "<p>Datenbankfehler in Zeile ", $e->getLine(), " mit Fehlercode ", $e->getCode(), "</p>",
    "<p>Fehlertext: ", $e->getMessage(), "</p>";  
}   
catch (Exception $e){
	echo "<p>Fehler in Zeile ", $e->getLine(), " mit Fehlercode ", $e->getCode(), "</p>",
    "<p>Fehlertext: ", $e->getMessage(), "</p>";  
}