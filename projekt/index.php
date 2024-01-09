<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

if ($_GET['idp'] == '') {
    $strona = 'index.php';
} elseif ($_GET['idp'] == 'kontakt') {
    $strona = 'kontakt.php';
} elseif ($_GET['idp'] == 'filmy') {
    $strona = 'filmy.php';
} else {
    $strona = 'html/404.html';
}
?>     
<?php include('./view/header.php'); ?>        
        <h2>Wprowadzenie</h2>
        <table class="standard">
            <tr>
                <td>
                    <img class="tlo" src="images/tomb.png" alt="tommb">
                </td>
                <td>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </td>
            </tr>
        </table>
        <table class="standard">
            <tr>
                <td>
                    <img class="tlo" src="images/andariel.png" alt="tommb">
                </td>
                <td>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </td>
            </tr>
        </table>
<?php include ('./view/footer.php'); ?>