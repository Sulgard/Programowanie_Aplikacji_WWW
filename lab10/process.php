<<<<<<< HEAD
<!DOCTYPE html>
<html>
<?php include ('./view/head.php'); ?>
<body>
    <?php include('./view/header.php'); ?>
    <div class="container">
        <div class="content">
        <h1>Dane przesłane za pomocą metody POST</h1>

        <?php
        $name = $_POST['name'];
        $age = $_POST['age'];

        echo "Imię: " . $name . "<br>";
        echo "Wiek: " . $age . "<br>";
         ?>
</body>
=======
<!DOCTYPE html>
<html>
<?php include ('./view/head.php'); ?>
<body>
    <?php include('./view/header.php'); ?>
    <div class="container">
        <div class="content">
        <h1>Dane przesłane za pomocą metody POST</h1>

        <?php
        $name = $_POST['name'];
        $age = $_POST['age'];

        echo "Imię: " . $name . "<br>";
        echo "Wiek: " . $age . "<br>";
         ?>
</body>
>>>>>>> e659c7fadc5ef46889fde2d303403c5d6ec24030
</html>