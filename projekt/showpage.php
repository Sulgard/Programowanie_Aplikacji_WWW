<?php
function ShowPage($id)
{
    global $conn; // Używamy zmiennej globalnej $conn

    //czyscimy $id, aby przez GET ktos nie probowal wykonac ataku SQL INJECTION
    $id_clear = htmlspecialchars($id);

    // Przygotowanie zapytania SQL
    $stmt = $conn->prepare("SELECT * FROM page_list WHERE id=? LIMIT 1"); // Używamy znaku zastępczego ?
    $stmt->bind_param("s", $id_clear); // Przypisujemy wartość do znaku zastępczego

    // Wykonanie zapytania
    $stmt->execute();

    // Pobranie wyników
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    //wywolywanie strony z bazy
    if(empty($row['id']))
    {
        $web = '[nie_znaleziono_strony]';
    }
    else
    {
        $web = $row['page_content'];
    }

    // Zamknięcie zapytania
    $stmt->close();

    return $web;
}
?>