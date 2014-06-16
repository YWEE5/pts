

<script type="text/javascript">
$(document).ready(
  function() {
    $('#tutoTable').dataTable();
  }
)
</script>
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
	echo "";
    

		echo '<table id="tutoTable" class="display" cellspacing="0" width="100%">';
		echo '   <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
            </tr>
        </tfoot>
 
        <tbody>';
		foreach($result as $row) {
		
			echo '<tr>';
			echo '<td><a href="?site=tutor-detail&tutorId=' .$row['U_ID'] . '">Details</a></td><td>' . $row['Vorname'] . '</td><td>' . $row['Nachname'] . '</td>';
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


