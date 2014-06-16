<?php
    // Prüft die Länge jedes Wortes eines Strings und korrigiert diese evtl.
    function shorten($str, $max=30, $range=5)
    {
            // aufteilen in Zeilen
         $lines = explode("\n", $str);
         foreach($lines as $key_line => $line){
                 // aufteilen in Wörter
                 $words = explode(" ", $line);
                 // prüfen der Länge jeden Wortes
                 foreach($words as $key_word => $word){
                        if (strlen($word) > $max)
                                $words[$key_word] = substr($word,0,$max-3-$range)."...".substr($word,-$range);
                 }
                 // zusammenfügen der neuen Zeile
                 $lines[$key_line] = implode(" ", $words);
         }
         // zusammenfügen des neues Textes
         $str = implode("\n", $lines);
         return $str;
    }



    // liefert die Rechte eines Users ..
    function getRights()
    {
        $rights = array();
        // .. indem die Rechte eines User aus der Datenbank ausgewählt werden..
        if(isset($_SESSION['UserID'])){
            $sql = "SELECT
                            Recht
                    FROM
                            User_Rechte
                    WHERE
                            UserID = '".$_SESSION['UserID']."'
                   ";
            $result = mysql_query($sql) OR die ("<pre>\n".$sql."</pre>\n".mysql_error());
            $rights = array();
            // .. und als array zurückgegeben werden
            while($row = mysql_fetch_assoc($result))
                    $rights[] = $row['Recht'];
        }
        return $rights;
    }

    // Loggt einen User ein, ..
    function doLogin($ID)
    {

        // Daten des Users in der Session speichern
        $sql = "SELECT
                        Vorname, IsAdmin
                FROM
                        benutzer
                WHERE
                        U_ID = '".$ID."'
               ";
        $result = mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());

        $row = mysql_fetch_assoc($result);
        $_SESSION['UserID'] = $ID;
        $_SESSION['Vorname'] = $row['Vorname'];
		$_SESSION['IsAdmin'] = $row['IsAdmin'];
        // Rechte in der Session speichern
       // $_SESSION['Rechte'] = getRights();
    }
	function besucherzaehler()
    {
		$inhalt = '0';
		$dateinamen = "besucherzaehler.txt";
		$handle = fopen ($dateinamen, "r");
		$inhalt = fread ($handle, filesize ($dateinamen));
		fclose ($handle); 
		
		$handle = fopen ($dateinamen, "w");
		fwrite ($handle, $inhalt);
		fclose ($handle);
		return($inhalt);
	}
	
?>