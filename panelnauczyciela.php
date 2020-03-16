<link rel="stylesheet" type="text/css" href="style.css">
<?php  $czas = date('d-m-Y H:i'); ?>
<html>
    <style>body { background-image:url('x.gif'); background-repeat:repeat; background-size: contain;}</style>
 <head>
  <meta charset="utf-8">
  <title>Panel Nauczyciela</title>
 </head>
 <body>
  <h1>Panel Nauczyciela | Upublicznianie zadań</h1>
  <form method="get" action="wstawianiezadania.php">
   <table border="0">
        <tr><td>Wybierz klase: </td><td><select name="klasa">
            <option value="1TP1">1TP1</option>      
            <option value="1TP2">1TP2</option>      
            <option value="2TP1">2TP1</option>      
            <option value="2TP2">2TP2</option>      
            <option value="2PI">2PI</option>      
            <option value="3TI">3TI</option>      
            <option value="4TI">4TI</option>     
            </select>
        </td></tr>
      <tr><td>Temat zadania</td><td><input name="temat"></td></tr>
      <tr><td>Treść zadania</td><td><input name="tresc"></td></tr>
      <tr><td>Data oddania</td><td><input type="datetime-local" name="data_godzina_od" min="<?php $czas; ?>"></td></tr> 
      <tr><td colspan="2"><input type="submit" value="wstaw"></td></tr>
       <tr><td><a href="usuwanienauczyciel.php">Usuń źle wprowadzony temat</a></td></tr>
   </table>
  </form>
 </body>
</html>
