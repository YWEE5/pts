<?php

     $conn = new PDO("mysql:host=rdbms.strato.de;dbname=DB1695068", "U1695068" , "DBWE05org");
    
   
          
      if (!$conn)
          echo "Verbindung konnte nicht hergestellt werden";  
    
      else
          echo "Verbindung hergestellt";
    
?>