<?php
$czas = date('d-m-Y H:i');
include "polacz.php";
$klasa = wczytaj("klasa");
$imie_nazwisko = wczytaj("imie_nazwisko");
$temat = wczytaj("temat");
$data_godzina_od_u = $czas;
$link_rozwiazania = wczytaj("link");
$rozwiazanie_zadania = wczytaj("kod_zadania");

$sql = $baza->prepare("INSERT INTO koronaferie2(id_rozwiazania,klasa,imie_nazwisko,temat,data_godzina_od_u, link_rozwiazania,rozwiazanie_zadania) VALUES (?, ?, ?, ?, ?, ?, ?);");
if ($sql)
{
        $sql->bind_param("issssss", $id_rozwiazania, $klasa, $imie_nazwisko, $temat, $data_godzina_od_u, $link_rozwiazania, $rozwiazanie_zadania);
        $sql->execute();
        $sql->close();
}
else
    die( 'Błąd: '. $baza->error);
$baza->close();
header ("Location: http://localhost/allfiles/pracakoronaferie/panelrozwiazan.php");
?>