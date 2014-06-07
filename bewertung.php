<?php  
  /*session_start();

if (!isset($_SESSION['Kennung']) and !isset($_SESSION['Passwort']) )
{
  echo "<p>Bitte starten Sie zuerst mit der Eingabe-Startseite. Sie werden automatisch nach 5 Sekunden weitergeleitet.</p>";
  echo '<meta http-equiv="Refresh" content="5;url=index.php">';
}
else
{ */
		try{
		//$conn = new PDO("mysql:host=rdbms.strato.de;dbname=DB1695068", "U1695068" , "DBWE05org"); Zugang zu WE-SS2014-Datenbank
		
		$conn = new PDO("mysql:host=localhost;dbname=DB1695068", "root");		//localhost
        $conn->beginTransaction();                                        // Transaktionsmodus

		//$kurs = "Select Kurs.Bezeichnung, Kurs.KU_ID, Kurs.T_ID from Kurs join Buchung on Kurs.KU_ID = Buchung.KU_ID join	Benutzer on Buchung.U_ID = Benutzer.U_ID where Email like $_SESSION['Kennung']";
		
		$kurs = "Select Kurs.Bezeichnung, Kurs.KU_ID, Kurs.T_ID, Benutzer.U_ID from Kurs join Buchung on Kurs.KU_ID = Buchung.KU_ID join Benutzer on Buchung.U_ID = Benutzer.U_ID where Email like ('andi@andi')";  //Test
		$stmt = $conn->query($kurs);                          
		
		if (!($row = $stmt->fetch())) {
         echo "Keine belegten Kurse gefunden!";
		 echo "Es ist ein Fehler aufgetreten. Bitte überprüfen Sie ihre Eingabe. <br><br> Automatische Weiterleitung in 5 Sekunden ...";
		 echo '<meta http-equiv="Refresh" content="5;url=index.php">';
       } else {
		
		//$tutor = "Select Benutzer.Vorname, Benutzer.Nachname from Benutzer join Tutor on Benutzer.U_ID = Tutor.U_ID join Kurs on Tutor.T_ID = Kurs.T_ID where Kurs.KU_ID = 1";
				
		?>
		<h1> Tutoren bewerten </h1>
		<?php

		$KennungID = $row[3];		//Test, kann komplett gelöscht werden, da Session-Variable vorhanden
				
		//$Kennung = $_SESSION['Kennung'];
		do {
		$KursID = $row[1];
		$TutorID = $row[2];	

		$tutor = "Select Benutzer.Vorname, Benutzer.Nachname from Benutzer join Tutor on Benutzer.U_ID = Tutor.U_ID join Kurs on Tutor.T_ID = Kurs.T_ID where Kurs.KU_ID = $KursID"; //Test
		$stmt_TUT = $conn->query($tutor);
        $tut = $stmt_TUT->fetch();

		?>
		
		<br>
        <table border ="0">
			<tr>   
				<td> <b>Name:</b> <?php echo $tut[0], " ", $tut[1] //Name des Tutors?> </td>		
			</tr>
			<tr>
				<td> <b>Unterrichtet</b>: <?php echo $row[0]; //Unterrichtsfach des Tutors ?> </td> 
			</tr>
		</table>
		
		<form action="bewertung_post.php?KennungID= <?php echo $KennungID ?>&TutorID= <?php echo $TutorID ?>&KursID= <?php echo $KursID ?>" method = "POST"><p>
			<b>Bewertung:</b><br>
			<input type = "radio" name="bewertung" value="1"> 1 = Sehr gut<br>
			<input type = "radio" name="bewertung" value="2"> 2 = Gut<br>
			<input type = "radio" name="bewertung" value="3"> 3 = Befriedigend<br>
			<input type = "radio" name="bewertung" value="4"> 4 = Ausreichend<br>
			<input type = "radio" name="bewertung" value="5"> 5 = Mangelhaft<br><br>
			<b>Kommentar(optional):</b><br>
			<textarea name = "bewertungstext" cols="45" rows="5"></textarea><br>
			<input type="submit" name="button" value="Bewertung abschicken"/>
		</form>
		<hr>
			
<?php
         } while ($row = $stmt->fetch());
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
	