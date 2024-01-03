<?php

// templates/category_management.php
require_once '../classes/CategoryManager.php';

$categoryManager = new CategoryManager($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_category'])) {
        // Obsługa dodawania kategorii
        $categoryName = $_POST['category_name'];
        $parentID = $_POST['parent_id'];
        $categoryManager->DodajKategorie($categoryName, $parentID);
    } elseif (isset($_POST['delete_category'])) {
        // Obsługa usuwania kategorii
        $categoryID = $_POST['category_id'];
        $categoryManager->UsunKategorie($categoryID);
    } elseif (isset($_POST['edit_category'])) {
        // Obsługa edycji kategorii
        $categoryID = $_POST['category_id'];
        $newName = $_POST['new_name'];
        $categoryManager->EdytujKategorie($categoryID, $newName);
    }
}

?>
<!-- HTML formularza zarządzania kategoriami -->
<form method="post" action="">
    <label for="category_name">Nazwa kategorii:</label>
    <input type="text" name="category_name" required>
    <label for="parent_id">Kategoria nadrzędna:</label>
    <select name="parent_id">
        <option value="0">Brak</option>
        <!-- Wybór dostępnych kategorii jako kategorii nadrzędnych -->
        <?php
        $categories = $categoryManager->GetCategories();
        foreach ($categories as $category) {
            echo "<option value='{$category['id']}'>{$category['name']}</option>";
        }
        ?>
    </select>
    <button type="submit" name="add_category">Dodaj kategorię</button>
</form>

<!-- Formularz usuwania kategorii -->
<form method="post" action="">
    <label for="category_id">ID kategorii do usunięcia:</label>
    <input type="text" name="category_id" required>
    <button type="submit" name="delete_category">Usuń kategorię</button>
</form>

<!-- Formularz edycji kategorii -->
<form method="post" action="">
    <label for="category_id">ID kategorii do edycji:</label>
    <input type="text" name="category_id" required>
    <label for="new_name">Nowa nazwa:</label>
    <input type="text" name="new_name" required>
    <button type="submit" name="edit_category">Edytuj kategorię</button>
</form>

<!-- Wyświetlenie drzewa kategorii -->
<?php $categoryManager->PokazKategorie(); ?>