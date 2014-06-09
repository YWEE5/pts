<?php
	$host = 'rdbms.strato.de';
	$username = 'U1695068';
	$password = 'DBWE05org';
	$database = 'DB1695068';

	$conn = new PDO(sprintf('mysql:host=%s;dbname=%s', $host, $database), $username, $password);     
    if (!$conn) {
    	echo "Verbindung konnte nicht hergestellt werden!";
    } else {
        echo "Verbindung hergestellt!";
    }
?>