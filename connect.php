<?php
$host = 'ch3rr1.me';
$dbname = 'd01ac4d3';
$user = 'd01ac4d3';
$pass = '9NRCCUa6Sezw5NhT';

try{
	$conn = new PDO(sprintf('mysql:host=%s;dbname=%s', $host, $dbname), $user, $pass);
    $conn->beginTransaction();
}
catch (PDOException $e){	
	echo "<p>Datenbankfehler in Zeile ", $e->getLine(), " mit Fehlercode ", $e->getCode(), "</p>",
    "<p>Fehlertext: ", $e->getMessage(), "</p>";  
}   
catch (Exception $e){
	echo "<p>Fehler in Zeile ", $e->getLine(), " mit Fehlercode ", $e->getCode(), "</p>",
    "<p>Fehlertext: ", $e->getMessage(), "</p>";  
}		
?>
	