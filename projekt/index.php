<?php 
    include('cfg.php');
    include('contact.php'); 
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="./css/styles.css">
        <link rel="icon" href="./images/ikonka.ico" type="image/x-icon">
        <link href="https://fonts.cdnfonts.com/css/diablo" rel="stylesheet">
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
        <meta http-equiv="Content-Language" content="pl" />
        <meta name="Author" content="Artur Sutuła" />
        <title>Portal o D2</title>
    </head>
           <body>
                <header>
                    <ul>
                        <li><a href="index.php?idp=main">Menu</a></li>
                        <li>
                            <a href="#">Klasy</a>
                            <ul class="dropdown">
                                <li><a href="index.php?idp=amazonka">Amazonka</a></li>
                                <li><a href="index.php?idp=zabojczyni">Zabójczyni</a></li>
                                <li><a href="index.php?idp=barbarzynca">Barbarzyńca</a></li>
                                <li><a href="index.php?idp=druid">Druid</a></li>
                                <li><a href="index.php?idp=paladyn">Paladyn</a></li>
                                <li><a href="index.php?idp=czarodziejka">Czarodziejka</a></li>
                                <li><a href="index.php?idp=nekromanta">Nekromanta</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Fabuła</a>
                            <ul class="dropdown">
                                <li><a href="index.php?idp=akt1">Akt I</a></li>
                                <li><a href="index.php?idp=akt2">Akt II</a></li>
                                <li><a href="index.php?idp=akt3">Akt III</a></li>
                                <li><a href="index.php?idp=akt4">Akt IV</a></li>
                                <li><a href="index.php?idp=akt5">Akt V</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Laby</a>
                            <ul class="dropdown">
                                <li><a href="html/jstest.html">Lab3js1</a></li>
                                <li><a href="html/jstest2.html">Lab3js2</a></li>
                                <li><a href="labor_4_162598_nr_4ISI.php">Lab4</a></li>
                            </ul>
                        </li>
                        <li><a href="index.php?idp=kontakt">Kontakt</a></li>
                        <li><a href="index.php?idp=filmy">Filmy</a></li>
                        <li><a href="index.php?idp=login">Zaloguj</a></li>
                        <li><a href="index.php?idp=koszyk">Koszyk</a></li>
                        </ul>
                </header>
                <div class="container">
                    <div class="content">
                    <?php 
                        include('./showpage.php');
                        error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

                        if ($_GET['idp'] == '') {
                            echo ShowPage(1);
                        } else if ($_GET['idp'] == 'main') {
                            echo ShowPage(1);
                        } else if ($_GET['idp'] == 'akt1'){
                            echo ShowPage(2);
                        } else if ($_GET['idp'] == 'akt2'){
                            echo ShowPage(3);
                        } else if ($_GET['idp'] == 'akt3'){
                            echo ShowPage(4);
                        } else if ($_GET['idp'] == 'akt4'){
                            echo ShowPage(5);
                        } else if ($_GET['idp'] == 'akt5'){
                            echo ShowPage(6);
                        } else if ($_GET['idp'] == 'amazonka') {
                            echo ShowPage(7);
                        } else if ($_GET['idp'] == 'barbarzynca'){
                            echo ShowPage(8);
                        } else if ($_GET['idp'] == 'czarodziejka'){
                            echo ShowPage(9);
                        } else if ($_GET['idp'] == 'druid'){
                            echo ShowPage(10);
                        } else if ($_GET['idp'] == 'nekromanta'){
                            echo ShowPage(11);
                        } else if ($_GET['idp'] == 'paladyn'){
                            echo ShowPage(12);
                        } else if ($_GET['idp'] == 'zabojczyni'){
                            echo ShowPage(13);
                        } else if ($_GET['idp'] == 'filmy'){
                            echo ShowPage(14);
                        } else if ($_GET['idp'] == 'kontakt'){
                            echo PokazKontakt();
                        } else if ($_GET['idp'] == 'login'){
                            header('Location: admin/admin.php');
                            exit;
                        } else if ($_GET['idp'] == 'koszyk'){
                            header('Location: admin/koszyk.php');
                            exit;
                        } else {
                            echo "Nie ma takiej strony.";
                        }
                        ?>
                        <footer>
                            <p>© 2024 Programowanie aplikacji WWW  Artur Sutuła</p>
                        </footer>
                    </div>
                </div>
        </body>
</html>
