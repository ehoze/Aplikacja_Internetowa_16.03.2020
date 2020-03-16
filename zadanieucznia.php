<link rel="stylesheet" type="text/css" href="style.css">
<?php  $czas = date('d-m-Y H:i'); ?>
<html>
 <head>
     <script src='https://www.google.com/recaptcha/api.js'></script>
  <meta charset="utf-8">
  <title>Panel ucznia</title>
 </head>
 <body>
  <h1>Panel ucznia | Wysyłanie zadania</h1>
  <form method="get" action="insert.php">
   <table border="0">
        <tr><td>Klasa</td><td><select name="klasa">
            <option value="1TP1">1TP1</option>      
            <option value="1TP2">1TP2</option>      
            <option value="2TP1">2TP1</option>      
            <option value="2TP2">2TP2</option>      
            <option value="2PI">2PI</option>      
            <option value="3TI">3TI</option>      
            <option value="4TI">4TI</option>     
            </select>
        </td></tr>
      <tr><td>Imie Nazwisko</td><td><input name="imie_nazwisko"></td></tr>
      <tr><td>Temat pracy</td><td><input name="temat"></td></tr>
      <tr><td>Data i czas oddania zadania</td><td><input name="data_godzina_od_u" value="<?php echo $czas?>" disabled></td></tr> 
      <tr><td>Link do zadania</td><td><input name="link"></td></tr>
      <tr><td><b>Przed wysłaniem proszę o zamiane kodu na tekst:</b></td></tr>
      <tr><td>http://www.kurshtml.edu.pl/generatory/kod.html</td></tr>
       <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
       <tr><td><input type="checkbox" id="box"  onclick="zabezpiecz_kod()">Zapoznałem się</td></tr>
      <tr><td>Rozwiązanie zadania</td><td><p id="text" style="display:none"><input type="text" name="kod_zadania"></p></td></tr>
       <div class="g-recaptcha" data-sitekey="klucz_publiczny_od_Google"></div>
          <tr><td colspan="2"><input type="submit" value="wstaw"></td></tr>
   </table>
  </form>
 </body>
    <script>
    function zabezpiecz_kod() {
      var checkBox = document.getElementById("box");
      var text = document.getElementById("text");
      if (checkBox.checked == true){
        text.style.display = "block";
      } else {
         text.style.display = "none";
      }
    }
       </script> 
        <script>
        if (!isset($_POST["g-recaptcha-response"]) || $_POST["g-recaptcha-response"]=="")
         die ("Nie kliknięto pola reCAPTCHA na dole formularza!");
         $url = 'https://www.google.com/recaptcha/api/siteverify'; //Google skrypt sprawdzający captcha
         $data = array(
                        'secret' => '6LdDs-EUAAAAAIh8j2Ghq4b4mIXey_vdyY6XSrJP',
                        'response' => $_POST["g-recaptcha-response"],
                        'remoteip' => $_SERVER["REMOTE_ADDR"]
                );

        // trzeba wpisać 'http' nawet, jeśli wysyłamy https://...
       $options = array(
                'http' => array(
                     'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                     'method'  => 'POST',
                     'content' => http_build_query($data)
                   )
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context); //odp na POST z serwera Google
        if ($result === FALSE)
         { //błąd połączenia
           //debug: var_dump($result);
            die ("Błąd nr 1! Zły kod captcha");
         }
        $odp= json_decode($result, true); //zmienna postaci { "success": true, "challenge_ts": "2017-07-22T20:07:58Z", "hostname": "fx-team.fulara.com" }
        if (!$odp["success"]) //zmienna bool == true
        {
          //var_dump($result);
          die ("Błąd nr 2! Zły kod captcha, kod błędu: ".$odp["error-codes"][0]);
        }
        </script>
        
    
</html>