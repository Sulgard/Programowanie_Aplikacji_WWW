<<<<<<< HEAD
<?php
// Załącz plik z funkcją PokazPodstrone
include('showpagetest.php');

// Pobierz identyfikator strony z parametru GET
$id = isset($_GET['id']) ? $_GET['id'] : 0;

// Wywołaj funkcję PokazPodstrone i wyświetl treść strony
$trescStrony = PokazPodstrone($id);

// Wyświetl treść strony
echo $trescStrony;
=======
<?php
// Załącz plik z funkcją PokazPodstrone
include('showpagetest.php');

// Pobierz identyfikator strony z parametru GET
$id = isset($_GET['id']) ? $_GET['id'] : 0;

// Wywołaj funkcję PokazPodstrone i wyświetl treść strony
$trescStrony = PokazPodstrone($id);

// Wyświetl treść strony
echo $trescStrony;
>>>>>>> e659c7fadc5ef46889fde2d303403c5d6ec24030
?>