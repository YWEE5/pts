<?php
$inhalt = '0';
$dateinamen = "besucherzaehler.txt";
$handle = fopen ($dateinamen, "r");
$inhalt = fread ($handle, filesize ($dateinamen));
fclose ($handle); 
?> 

<aside id="sidebar-left">
	<?php
	echo "<strong>$inhalt</strong> Besucher<br />";
	?>
	
	<div class="span-8 last side-bar">
        <h5>Service</h5>
        <ul class="navigation-sidebar">
			<li><a href="">Gebuchte Kurse</a></li>
			<li><a href="">Bewertungen</a></li>
			<li><a href="">Gästebuch</a></li>
			<li><a href="">Privater Ordner</a></li>
        </ul>
     </div>
</aside>