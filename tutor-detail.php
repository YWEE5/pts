<?php
require_once('connect.php');

try{
	$conn = new PDO(sprintf('mysql:host=%s;dbname=%s', $host, $dbname), $user, $pass);
	if(!$conn)
		echo 'Keine Verbindung hergestellt!';
	$tutorId =$_GET["tutorId"];
	$sql = 'SELECT * FROM benutzer WHERE U_ID ='.intval( $tutorId );
	$result = $conn->query($sql);
	$sql2 = 'SELECT * FROM bewertung WHERE U1_ID ='.intval( $tutorId );
	$result2 = $conn->query($sql2);

	
	if(!$result) {
		echo 'Keine Datensätze gefunden !';
	} else {
			
			?>
			<ul class="trip-search-results">
			<?php
			foreach($result as $row) {
			?>
			<li class="trip">
				<article class="row">
					<div class="user span2">
						<img  src="img/not-image.png" class="photo">
						<div class="user-info">
							<h2 class="username"><?php echo  $row['Vorname'] . ' ' . $row['Nachname']; ?></h2>28 Jahre<br>
						</div>
						<div class="user-trust">
								 <div class="rating-container">
								 <?php
								 $star=0;
								 	if(!$result2) {
											 $star=0;
										} else {
											foreach($result2 as $row2) {
												 $star = $row2['Bewertung'] .'<br />';
											}
										}
								 ?>
										<span class="star-rating star_<?php echo $star;  ?>"></span>
										<?php echo $star;  ?> Bewertung
								</div>              
						</div>
					</div>

					<div class="description span5">
						<h3><?php echo  $row['Vorname'] . ' ' . $row['Nachname']; ?></h3>   
						<p>text text text text text text text text text text text text
						text text text text text text text text text text text text
						text text text text text text text text text text text text
						text text text text text text text text text text text text
						text text text text text text text text text text text text
						text text text text text text text text text text text text
						text text text text text text text text text text text text<br>
						
						<?php echo  $row['Strasse'] . ' ' . $row['PLZ'] . '<br />'; 
								echo  $row['Email'] .'<br />';
						?>
						 </p>
					 </div>
				</article>
			</li>
			
			<?php
		}
		?>
		</ul>
		
		<?php
		
		
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