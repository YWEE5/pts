<?php
	//echo $_SESSION['UserID'];		//4
	//echo $_SESSION['Vorname'];	//andi
	include("connect.php");
	error_reporting(E_ALL);
	
	try{
	$sql = "Select Bezeichnung from kategorie";  //Test
	$result = mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
	if (!($row = mysql_fetch_row($result))){
         
		 echo "Keine Kurse gefunden.";
		 
	} 
	else {
		
		do {
		$Kurs = $row[0];

		?>
		
		<b>Kurse:</b> <?php echo $Kurs ?> </td>
		
	<?php
         } while ($row = mysql_fetch_row($result));
		 
		 ?>
		 <form action="suche.php" method = "POST">
			<b>Suche:</b><br><br>
			<b>Bezeichnung:</b><br>
			<textarea name = "Bezeichnung" cols="45" rows="1"></textarea><br>
			<b>Ort:</b><br>
			<textarea name = "Ort" cols="45" rows="1"></textarea><br>
			<input type="submit" name="button" value="Suche Starten"/>
		</form>
		
		<?php
       } 
     }  // endif try
		catch (PDOException $e){
		
       echo "<p>Datenbankfehler in Zeile ", $e->getLine(), " mit Fehlercode ", $e->getCode(), "</p>",
            "<p>Fehlertext: ", $e->getMessage(), "</p>";  
     }   
		catch (Exception $e){
       echo "<p>Fehler in Zeile ", $e->getLine(), " mit Fehlercode ", $e->getCode(), "</p>",
            "<p>Fehlertext: ", $e->getMessage(), "</p>";  
		}		
	 //}
	?>