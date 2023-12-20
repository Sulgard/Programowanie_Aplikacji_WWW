<!DOCTYPE html>
<html>
<?php require('./view/head.php'); ?>
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