<!DOCTYPE html>
<html>
<?php include ('head.php');
<body>
    <?php include('./view/header.php'); ?>
    <div class="container">
        <div class="content">
        <h1>Dane przesłane za pomocą metody POST</h1>

        <?php
        // Odczytujemy dane z formularza za pomocą $_POST
        $name = $_POST['name'];
        $age = $_POST['age'];

        // Wyświetlamy odczytane dane
        echo "Imię: " . $name . "<br>";
        echo "Wiek: " . $age . "<br>";
         ?>
</body>
</html>