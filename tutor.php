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
		foreach($result as $row) {
			echo $row['Vorname'] . ' ' . $row['Nachname'] . '<br />';
		}
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