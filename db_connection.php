<?php
	require_once('login-data.php');

	$conn = new PDO(sprintf('mysql:host=%s;dbname=%s', $host, $database), $username, $password);
          
    if (!$conn)
    	echo "Verbindung konnte nicht hergestellt werden!";  
    
    else
        echo "Verbindung hergestellt!";
?>