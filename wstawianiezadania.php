<?php
$czas = date('d-m-Y H:i');    

include "polacz.php";
$klasa = wczytaj("klasa");
$temat = wczytaj("temat");
$tresc_zadania = wczytaj("tresc");
$data_godzina = $czas;
$data_godzina_od = wczytaj("data_godzina_od");

$sql = $baza->prepare("INSERT INTO koronaferie(id_rozwiazania,klasa,temat,tresc_zadania,data_godzina,data_godzina_od) VALUES (?, ?, ?, ?, ?, ?);");
if ($sql)
{
        $sql->bind_param("isssss", $id_rozwiazania, $klasa, $temat, $tresc_zadania, $data_godzina, $data_godzina_od );
        $sql->execute();
        $sql->close();
}
else
    die( 'Błąd: '. $baza->error);
$baza->close();
header ("Location: http://localhost/allfiles/pracakoronaferie/panelglowny.php");
?>