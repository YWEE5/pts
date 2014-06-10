<?php
$inhalt = '0';
$dateinamen = "besucherzaehler.txt";
$handle = fopen ($dateinamen, "r");
$inhalt = fread ($handle, filesize ($dateinamen));
fclose ($handle);
 
$inhalt = $inhalt + 1;
echo "<p>bisher <b>$inhalt</b> Besucher hier</p>";
 
// Schreiben des neuen Wertes
$handle = fopen ("besucherzaehler.txt", "w");
fwrite ($handle, $inhalt);
fclose ($handle);
 
?> 

<aside id="sidebar-left">
	<ul>
		<li>Gebuchte Kurse</li>
		<li>Bewertungen</li>
		<li>Gästebuch</li>
		<li>Privater Ordner</li>
	</ul>
</aside>