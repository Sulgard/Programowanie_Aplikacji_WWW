<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="./css/styles.css">
        <link href="https://fonts.cdnfonts.com/css/diablo" rel="stylesheet">
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
        <meta http-equiv="Content-Language" content="pl" />
        <meta name="Author" content="Artur Sutuła" />
        <title>Poradnik do gry</title>
    </head>
    <body>
        <?php include('./view/header.php'); ?>
        <div class="formularz">
            <form action="action_page.php">
          
              <label for="fname">Imie</label>
              <input type="text" id="fname" name="imie" placeholder="Imię..">
          
              <label for="lname">Nazwisko</label>
              <input type="text" id="lname" name="nazwisko" placeholder="Nazwisko..">

              <label for="lname">Temat</label>
              <input type="text" id="lname" name="temat" placeholder="Temat maila">
          
              <label for="subject">Tresc</label>
              <textarea id="subject" name="tekst" placeholder="Tekst.." style="height:200px"></textarea>
          
              <input type="submit" value="Wyślij">
          
            </form>
          </div>
    </body>
</html>