<?php
include('../cfg.php');
session_start();

//              ******************************************
//                Funkcja odpowiadająca za wylogowywanie
//              ******************************************


function Wyloguj()
{
    session_start();
    session_destroy();
    header("Location: ../index.php");
    exit();
}

//             ************************
//              Przycisk wylogowywania
//             ************************

function WylogujButton()
{
    echo '<form method="get">
            <input name= "wylogowywanie" type="submit" value="Wyloguj"></button>
          </form>';
}

if(isset($_GET['wylogowywanie']) && $_GET['wylogowywanie']=='Wyloguj')
{
    Wyloguj();
}

//              ************************************************************************************
//                Funkcja odpowiadająca za pozyskanie produktów z bazy danych w celu dodania ich
//              ************************************************************************************

function getProductFromDatabase($conn, $productId) {
    $query = "SELECT * FROM produkty WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'i', $productId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
}

//              ************************************************************
//                Funkcja odpowiadająca za dodawanie produktów do koszyka
//              ************************************************************

function addToCart($conn, $productId, $quantity) {
    $product = getProductFromDatabase($conn, $productId);
    if($product) {
        // Sprawdź dostępność produktu
        if($product['ilosc_sztuk'] < $quantity) {
            echo 'Niestety, dostępna ilość produktu ' . $product['tytul'] . ' to tylko ' . $product['ilosc_sztuk'] . '.<br>';
            return;
        }

        if(!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        // Sprawdzenie czy produkt znajduje sie juz w koszyku
        if(array_key_exists($productId, $_SESSION['cart'])) {
            // Sprzwdzenie dostepnosci produktu po dodaniu go do koszyka
            if($product['ilosc_sztuk'] < $_SESSION['cart'][$productId]['quantity'] + $quantity) {
                echo 'Niestety, dostępna ilość produktu ' . $product['tytul'] . ' to tylko ' . $product['ilosc_sztuk'] . ', a próbujesz dodać ' . ($_SESSION['cart'][$productId]['quantity'] + $quantity) . '.<br>';
                return;
            }
            $_SESSION['cart'][$productId]['quantity'] += $quantity;
        } else {
            $_SESSION['cart'][$productId] = array(
                'quantity' => $quantity,
                'priceNet' => $product['cena_netto'],
                'priceGross' => calculateGrossPrice($product['cena_netto'], $product['podatek_vat'])
            );
        }
    }
}

//              ************************************************************
//                Funkcja odpowiadająca za usuwanie produktów z koszyka
//              ************************************************************
function removeFromCart($productId) {
    unset($_SESSION['cart'][$productId]);
}

//              ************************************************************
//                Funkcja odpowiadająca za zmiane ilosci produktów w koszyka
//              ************************************************************

function editQuantityInCart($productId, $newQuantity) {
    if(array_key_exists($productId, $_SESSION['cart']) && $newQuantity > 0) {
        $_SESSION['cart'][$productId]['quantity'] = $newQuantity;
    }
}

//              **************************************
//                Funkcja oobliczajaca cene brutto
//              **************************************

function calculateGrossPrice($netPrice, $vat) {
    return $netPrice * (1 + $vat/100);
}

//              ***********************************
//                Funkcja wyswietlajaca koszyk
//              ***********************************

function showCart() {
    if(!isset($_SESSION['cart'])) {
        echo 'Twój koszyk jest pusty.';
        return;
    }

    $totalPriceGross = 0;
    echo '<h2>Zawartość koszyka:</h2>';
    foreach ($_SESSION['cart'] as $productId => $productDetails) {
        $totalPriceGross += $productDetails['priceGross'] * $productDetails['quantity'];
        echo 'Produkt ID: ' . $productId . '<br>';
        echo 'Ilość: ' . $productDetails['quantity'] . '<br>';
        echo 'Cena netto: ' . $productDetails['priceNet'] . '<br>';
        echo 'Cena brutto: ' . $productDetails['priceGross'] . '<br>';
        echo '------------------<br>';
    }
    echo "Suma cen (brutto): " . $totalPriceGross;
}


//              **********************************************************************
//                Funkcja wyswietlajaca formularz w celu dodania produktu do koszyka
//              **********************************************************************

function DodajDoKoszykaForm($conn) {
    echo '
    <h1>Dodaj produkt do koszyka</h1>
    <form method="post" action="' . $_SERVER['REQUEST_URI'] . '">
    <p>Wybierz Produkt</p> 
    <select name="productId">';

    $query = "SELECT * FROM produkty";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="' . $row['id'] . '">' . $row['id'] . ' - ' . $row['tytul'] . '</option>';
    }

    echo '</select>
    <p>Ilość</p> <input type="number" name="quantity"/>
    <br>
    <input type="submit" name="add_button" value="Dodaj"/>
    </form>
    ';

    if(isset($_POST['add_button'])) {
        $productId = $_POST['productId'];
        $quantity = $_POST['quantity'];
        addToCart($conn, $productId, $quantity);
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit();
    }
}

//              **********************************************************************
//                Funkcja wyswietlajaca formularz w celu usuniecia produktu z koszyka
//              **********************************************************************

function UsunZKoszykaForm() {
    echo '
    <h1>Usuń produkt z koszyka</h1>
    <form method="post" action="' . $_SERVER['REQUEST_URI'] . '">
    <p>ID Produktu</p> <input type="number" name="productId"/>
    <br>
    <input type="submit" name="del_button" value="Usuń"/>
    </form>
    ';

    if(isset($_POST['del_button'])) {
        $productId = $_POST['productId'];
        removeFromCart($productId);
    }
}

//              *************************************************************************
//                Funkcja wyswietlajaca formularz w celu edytowania produktow w koszyku
//              *************************************************************************

function EdytujIloscWKoszykuForm() {
    echo '
    <h1>Edytuj ilość produktu w koszyku</h1>
    <form method="post" action="' . $_SERVER['REQUEST_URI'] . '">
    <p>ID Produktu</p> <input type="number" name="productId"/>
    <p>Nowa ilość</p> <input type="number" name="newQuantity"/>
    <br>
    <input type="submit" name="edit_button" value="Edytuj"/>
    </form>
    ';

    if(isset($_POST['edit_button'])) {
        $productId = $_POST['productId'];
        $newQuantity = $_POST['newQuantity'];
        editQuantityInCart($productId, $newQuantity);
    }
}

//              ***************************************************
//                Funkcja wyswietlajaca formularz z koszykiem 
//              ***************************************************

function PokazKoszykForm() {
    echo '
    <h1>Zawartość koszyka</h1>
    <form method="post" action="' . $_SERVER['REQUEST_URI'] . '">
    <input type="submit" name="show_button" value="Pokaż"/>
    </form>
    ';

    if(isset($_POST['show_button'])) {
        showCart();
    }
}

//             *****************************************************************************************
//              Poniżej znajduje się podstawowy szkielet strony wraz z wywołaniami poszczególnych funkcji
//             *****************************************************************************************

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/control_styles.css">
    <title> Koszyk</title>
</head>

<body>
    <div class="container">
        <?php
            WylogujButton();
            DodajDoKoszykaForm($conn);
            EdytujIloscWKoszykuForm();
            UsunZKoszykaForm();
            PokazKoszykForm();
        ?>
    </div>

</body>

</html>
