<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">

<head>
    <title>Kurs erstellen</title>

    <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="keywords" content="" />
 



</head>

<body>

<h2>Kurs erstellen</h2>
<hr width="25%" align="left" />

<form action="" method="POST">

<p>Kursname:<br/> <input type="text" name="kurs_name" /> </p>

<p>
<?php

try
{

$conn =  new PDO("mysql:host=rdbms.strato.de;dbname=DB1695068", "U1695068" , "DBWE05org");

$conn->beginTransaction();


$sql2 = "SELECT * FROM kategorie";


$stmt2 = $conn->query($sql2);



if ($row2 = $stmt2->fetch())
{
 echo "Kategorie:<br/>  <select size=\"1\" name=\"Kategorien\" >";

	do
	{
		echo "<option value=\"$row2[Bezeichnung]\"";
		if (isset($_POST['Kategorien']) and $_POST['Kategorien'] == $row2['Bezeichnung'])
		echo "selected";
		echo "> $row2[Bezeichnung] </option>";
	}while ($row2 = $stmt2->fetch());
	echo "</select>";

}



?>
</p>

<p>Stundensatz:<br/><input type="number" name="stdsatz" /> Euro </p>
<p>Sofort sichtbar? <input type="checkbox" name="sichtbar" /></p>

<input type="submit" value="Kurs erstellen" name="create" />

</form>

<?php

$bezeichnung =mysql_real_escape_string(($_POST['kurs_name']));
$kategorie = $_POST['Kategorien'];
$stdsatz = $_POST['stdsatz'];
$sichtbar = $_POST['sichtbar'];



        if ($sichtbar == "on")
        {
            $sichtbarkeit = 1;

        }
        else
        {
            $sichtbarkeit = 0;

        }

/*
    if (isset($_POST['create']))
    {
       $sql = "INSERT INTO kurs (K_ID,Bezeichnung,Stundensatz,Sichtbar) VALUES (2,'"$bezeichnung"',\"$stdsatz\",\"$sichtbarkeit\")";



            if (!$conn->query($sql))
                echo "Fehler beim Einf&uuml;gen";

            else
                echo "Kurs erstellt";
    }

*/
$conn->commit();

$conn = false;


}   //ende try

 catch (PDOException $e)
{
    echo "<p>PDO-Fehler in Zeile ", $e->getLine(), "mit Code ", $e->getCode(),
         "</p><p>Fehlertext: ", $e->getMessage(), "</p>";
}

catch (Exception $e)
{
    echo "<p>Fehler in Zeile", $e->getLine(), "mit Code ", $e->getCode(),
         "</p><p>Fehlertext:", $e->getMessage(), "</p>";
}

 ?>


</body>
</html>
