
<?php
    define ('MYSQL_HOST', 'ch3rr1.me');
    define ('MYSQL_USER', 'd01ac4d3');
    define ('MYSQL_PASS', '9NRCCUa6Sezw5NhT');
    define ('MYSQL_DATA', 'd01ac4d3');
    $connid = @mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASS) OR die("Error: ".mysql_error());
    
    mysql_select_db(MYSQL_DATA) OR die("Error: ".mysql_error());

    $host = 'ch3rr1.me';
    $user = 'd01ac4d3';
    $dbname = 'd01ac4d3';
    $pass = '9NRCCUa6Sezw5NhT';
?>
	