<?php
    error_reporting(E_ALL);
    include("connect.php");
    include("functions.php");

    session_start();

    // $_SESSION leeren
    $_SESSION = array();
    // Session l�schen
    session_destroy();
    echo "Sie wurden erfolgreich ausgeloggt.<br>\n".
    "Zur <a href=\"index.php\">Startseite</a>\n";
?>