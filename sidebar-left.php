<?php
$inhalt = '0';
$dateinamen = "besucherzaehler.txt";
$handle = fopen ($dateinamen, "r");
$inhalt = fread ($handle, filesize ($dateinamen));
fclose ($handle); 
?> 

<aside id="sidebar-left">
	<?php
	$inhalt = $inhalt + 1;
	echo "<p>Bisher <b>$inhalt</b> Besucher hier</p><br />";
 
	// Schreiben des neuen Wertes
	$handle = fopen ($dateinamen, "w");
	fwrite ($handle, $inhalt);
	fclose ($handle);
	?>
	<ul>
		<li>Gebuchte Kurse</li>
		<li>Bewertungen</li>
		<li>Gästebuch</li>
		<li>Privater Ordner</li>
	</ul>
</aside>