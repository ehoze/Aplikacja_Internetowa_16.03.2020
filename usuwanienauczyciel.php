<link rel="stylesheet" type="text/css" href="style.css">
<html>
 <head>
  <meta charset="utf-8">
  <title>Panel Nauczyciela</title>
 </head>
 <body>
  <h1>Panel Nauczyciela | Upublicznianie zadań</h1>
  <form method="get" action="usun.php">
   <table border="0">
      <tr><td>Numer id zadania</td><td><input name="id_zadania"></td></tr>
      <tr><td colspan="2"><input type="submit" value="Usuń" onclick="javascript:return confirm('Czy na pewno usunąć?');"></td></tr>
   </table>
  </form>
 </body>
</html>
