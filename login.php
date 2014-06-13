		<?php
		error_reporting(E_ALL);
		include("connect.php");
		include("functions.php");
   

		// Session starten
		session_start();
   

		if(isset($_POST['submit']) AND $_POST['submit']=='Einloggen'){
			// Falls die Email und das Passwort übereinstimmen..
			$sql = "SELECT
							U_ID
					FROM
							benutzer
					WHERE
							Email = '".mysql_real_escape_string(trim($_POST['Email']))."' AND
							Password = '".md5(trim($_POST['Passwort']))."'
					";
			$result = mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
			// wird die ID des Users geholt und der User damit eingeloggt
			$row = mysql_fetch_assoc($result);
			// Prüft, ob wirklich genau ein Datensatz gefunden wurde
			if (mysql_num_rows($result)==1){
					doLogin($row['U_ID']);
				echo "<h4>Hallo </h4>\n";
				echo "Sie wurden erfolgreich eingeloggt.<br>\n".
					"Zur <a href=\"index.php\">Startseite</a>\n";
			}
			else{
				echo "Sie konnten nicht eingeloggt werden.<br>\n".
					"Nickname oder Passwort fehlerhaft.<br>\n".
					"Zurück zum <a href=\"".$_SERVER['PHP_SELF']."\">Login-Formular</a>\n";
			}
		}
		else{
			echo "<form ".
				" name=\"Login\" ".
				" action=\"".$_SERVER['PHP_SELF']."\" ".
				" method=\"post\" ".
				" accept-charset=\"ISO-8859-1\">\n";
			echo "Email :\n";
			echo "<input type=\"text\" name=\"Email\" maxlength=\"32\">\n";
			echo "<br>\n";
			echo "Passwort :\n";
			echo "<input type=\"password\" name=\"Passwort\">\n";
			echo "<br>\n";
			echo "<input type=\"submit\" name=\"submit\" value=\"Einloggen\">\n";
			echo "<br>\n";
			echo "<a href=\"passwort.php\">Passwort vergessen</a> oder noch nicht <a href=\"registrierung.php\">registriert</a>?\n";
			echo "</form>\n";
		}	
	?>