<link rel="stylesheet" type="text/css" href="style.css">
<html>

<head>
    <meta charset="utf-8">
    <title>Panel Rozwiązań</title>
</head>

<body>
    <h1>Panel Rozwiązań</h1>
    <table border="1">
        <tr>
            <th>Id rozwiązania</th>
            <th>Klasa</th>
            <th>Imie i Nazwisko ucznia</th>
            <th>Temat pracy</th>
            <th>Data odesłania</th>
            <th>Link do zadania</th>
            <th>Kod z rozwiazaniem</th>
        </tr>
        <?php
include "polacz.php";
if ($sql =  $baza->prepare("SELECT id_rozwiazania,klasa,temat,data_godzina_od_u,imie_nazwisko,link_rozwiazania, rozwiazanie_zadania FROM koronaferie2"))
{
        $sql->execute();
        $sql->bind_result($id_rozwiazania, $klasa, $temat, $data_godzina_od_u, $imie_nazwisko, $link_rozwiazania, $rozwiazanie_zadania);
        while ($sql->fetch())
        {
                echo "<tr>
                        <td>$id_rozwiazania</td>
                        <td>$klasa</td>
                        <td>$imie_nazwisko</td>
                        <td>$temat</td>
                        <td>$data_godzina_od_u</td>
                        <td>$link_rozwiazania</td>
                        <td>$rozwiazanie_zadania</td>
                   </tr>";
        }
        $sql->close();
 }
else die( "Błąd w zapytaniu SQL! Sprawdź kod SQL w PhpMyAdmin: ". $baza->error );

 $baza->close();
?>
    </table>
</body>

</html>
