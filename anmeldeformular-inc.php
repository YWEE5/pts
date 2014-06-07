  <?php
    error_reporting(E_ALL);
    $MYSQL_HOST = 'rdbms.strato.de';
    $MYSQL_USER = 'U1695068';
    $MYSQL_PASS = 'DBWE05org';
    $MYSQL_DATA = 'DB1695068';

    $connid = @mysql_connect($MYSQL_HOST, $MYSQL_USER, $MYSQL_PASS) OR die("Error: ".mysql_error());
    mysql_select_db($MYSQL_DATA) OR die("Error: ".mysql_error());

    session_start();

    if(isset($_POST['submit']) AND $_POST['submit']=='Registrieren'){
        // Fehlerarray anlegen
        $errors = array();
        // Prüfen, ob alle Formularfelder vorhanden sind
        if(!isset($_POST['Nickname'],
                  $_POST['Passwort'],
                  $_POST['Passwortwiederholung'],
                  $_POST['Email']))
            // Ein Element im Fehlerarray hinzufügen
            $errors = "Bitte benutzen Sie das Formular aus dem Registrierungsbereich";
        else{
            // Prüfung der einzelnen obligatorischen Felder
            // Alle Nicknames und Emailadressen zum Vergleich aus der Datenbank holen
            $nicknames = array();
            $emails = array();
            $sql = "SELECT
                             Nickname,
                             Email
                     FROM
                             User
                    ";
            $result = mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
            while($row = mysql_fetch_assoc($result)){
                     $nicknames[] = $row['Nickname'];
                     $emails[] = $row['Email'];
            }
            // Prüft, ob ein Nickname eingegeben wurde
            if(trim($_POST['Nickname'])=='')
                $errors[]= "Bitte geben Sie einen Nickname ein.";
            // Prüft, ob der Nickname mindestens 3 Zeichen enthält
            elseif(strlen(trim($_POST['Nickname'])) < 3)
                $errors[]= "Ihr Name muss mindestens 3 Zeichen lang sein.";
            // Prüft, ob der Nickname nur gültige Zeichen enthält
            elseif(!preg_match('/^\w+$/', trim($_POST['Nickname'])))
                $errors[]= "Benutzen Sie bitte nur alphanumerische Zeichen (Zahlen, Buchstaben und den Unterstrich).";
            // Prüft, ob der Nickname bereits vergeben ist
            elseif(in_array(trim($_POST['Nickname']), $nicknames))
                $errors[]= "Dieser Nickname ist bereits vergeben.";
            // Prüft, ob eine Email-Adresse eingegeben wurde
            if(trim($_POST['Email'])=='')
                $errors[]= "Bitte geben Sie Ihre Email-Adresse ein.";
            // Prüft, ob die Email-Adresse gültig ist
			elseif (!preg_match( '/^([a-z0-9]+([-_\.]?[a-z0-9])+)@[a-z0-9äöü]+([-_\.]?[a-z0-9äöü])+\.[a-z]{2,4}$/i', trim($_POST['Email'])))
                $errors[]= "Ihre Email Adresse hat eine falsche Syntax.";
            // Prüft, ob die Email-Adresse bereits vergeben ist
            elseif(in_array(trim($_POST['Email']), $emails))
                $errors[]= "Diese Email-Adresse ist bereits vergeben.";
            // Prüft, ob ein Passwort eingegeben wurde
            if(trim($_POST['Passwort'])=='')
                $errors[]= "Bitte geben Sie Ihr Passwort ein.";
            // Prüft, ob das Passwort mindestens 6 Zeichen enthält
            elseif (strlen(trim($_POST['Passwort'])) < 6)
                $errors[]= "Ihr Passwort muss mindestens 6 Zeichen lang sein.";
            // Prüft, ob eine Passwortwiederholung eingegeben wurde
            if(trim($_POST['Passwortwiederholung'])=='')
                $errors[]= "Bitte wiederholen Sie Ihr Passwort.";
            // Prüft, ob das Passwort und die Passwortwiederholung übereinstimmen
            elseif (trim($_POST['Passwort']) != trim($_POST['Passwortwiederholung']))
                $errors[]= "Ihre Passwortwiederholung war nicht korrekt.";
        }
        // Prüft, ob Fehler aufgetreten sind
        if(count($errors)){
             echo "Ihr Account konnte nicht erstellt werden.<br>\n".
                  "<br>\n";
             foreach($errors as $error)
                 echo $error."<br>\n";
             echo "<br>\n".
                  "Zurück zum <a href=\"".$_SERVER['PHP_SELF']."\">Registrierungsformular</a>\n";
        }
        else{
            // Daten in die Datenbanktabelle einfügen
            $sql = "INSERT INTO
                           User
                            (Nickname,
                             Email,
                             Passwort,
                             Registrierungsdatum
                            )
                    VALUES
                            ('".mysql_real_escape_string(trim($_POST['Nickname']))."',
                             '".mysql_real_escape_string(trim($_POST['Email']))."',
                             '".md5(trim($_POST['Passwort']))."',
							 CURDATE()
                            )
                   ";
            mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
            echo "Vielen Dank!\n<br>".
                 "Ihr Accout wurde erfolgreich erstellt.\n<br>".
                 "Sie können sich nun mit Ihren Daten einloggen.\n<br>".
                 "<a href=\"index.php\">Zum Login</a>\n";
        }
    }
    else {
        echo "<form ".
             " name=\"Registrierung\" ".
             " action=\"".$_SERVER['PHP_SELF']."\" ".
             " method=\"post\" ".
             " accept-charset=\"ISO-8859-1\">\n";
        echo "<h5>Obligatorische Angaben</h5>\n";
        echo "<span style=\"font-weight:bold;\" ".
             " title=\"min.3\nmax.32\nNur Zahlen, Buchstaben und Unterstrich\">\n".
             "Nickname :\n".
             "</span>\n";
        echo "<input type=\"text\" name=\"Nickname\" maxlength=\"32\">\n";
        echo "<br>\n";
        echo "<span style=\"font-weight:bold;\" ".
             " title=\"min.6\">\n".
             "Passwort :\n".
             "</span>\n";
        echo "<input type=\"password\" name=\"Passwort\">\n";
        echo "<br>\n";
        echo "<span style=\"font-weight:bold;\" ".
             " title=\"min.6\">\n".
             "Passwort wiederholen:\n".
             "</span>\n";
        echo "<input type=\"password\" name=\"Passwortwiederholung\">\n";
        echo "<br>\n";
        echo "<span style=\"font-weight:bold;\" ".
             " title=\"Ihre.Adresse@Ihr-Anbieter.de\">\n".
             "Email-Adresse:\n".
             "</span>\n";
        echo "<input type=\"text\" name=\"Email\" maxlength=\"70\">\n";
        
        
             
        echo "<br>\n";
        echo "<input type=\"submit\" name=\"submit\" value=\"Registrieren\">\n";
        echo "<input type=\"reset\" value=\"Zurücksetzen\">\n";
        echo "</form>\n";
    }
?> 