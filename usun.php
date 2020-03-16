<link rel="stylesheet" type="text/css" href="style.css">
<?php
include "polacz.php";
$id_zadania = wczytaj("id_zadania"); //wczytanie z tablicy _GET ze sprawdzeniem czy niepusty
if ($sql = $baza->prepare( "DELETE FROM koronaferie WHERE id_zadania = ?;" ))
{
 $sql->bind_param( "i", $id_zadania);
 $sql->execute();
 $sql->close();
}
$baza->close();
header ("Location: http://localhost/allfiles/pracakoronaferie/panelglowny.php" );
?>