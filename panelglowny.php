<link rel="stylesheet" type="text/css" href="style.css">
<html>

<head>
    <meta charset="utf-8">
    <title>Panel Zadań</title>
</head>

<body>
    <h1>Panel Główny</h1>
    <table border="1">
        <tr>
            <th>Numer zadania</th>
            <th>Klasa</th>
            <th>Temat</th>
            <th>Treść</th>
            <th>Data wstawienia</th>
            <th>Data oddania</th>
        </tr>
        <?php
include "polacz.php";
if ($sql =  $baza->prepare("SELECT id_zadania,klasa,temat,tresc_zadania,data_godzina,data_godzina_od FROM koronaferie"))
{
        $sql->execute();
        $sql->bind_result($id_zadania, $klasa, $temat, $tresc_zadania, $data_godzina, $data_godzina_od);
        while ($sql->fetch())
        {
                echo "<tr>
                        <td>$id_zadania</td>
                        <td>$klasa</td>
                        <td>$temat</td>
                        <td>$tresc_zadania</td>
                        <td>$data_godzina</td>
                        <td>$data_godzina_od</td>
                   </tr>";
        }
        $sql->close();
 }
else die( "Błąd w zapytaniu SQL! Sprawdź kod SQL w PhpMyAdmin: ". $baza->error );

 $baza->close();
?>
    </table>
    <a href="zadanieucznia.php">Wyślij rozwiązanie</a>
</body>

</html>
