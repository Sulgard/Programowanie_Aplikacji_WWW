<?php

function PokazPodstrone($id)
{
    //czyscimy $id, aby przez GET ktoś nie próbował wykonać ataku SQL INJECTION
    $id_clear = htmlspecialchars($id);

    // Zabezpieczenie przed atakami SQL Injection
    $id_clear = mysqli_real_escape_string($conn, $id_clear);

    $query = "SELECT * FROM page_list WHERE id='$id_clear' LIMIT 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    //wywołanie strony z bazy
    if (empty($row['id'])) {
        $web = '[nie_znaleziono_strony]';
    } else {
        $web = $row['page_content'];
    }

    return $web;
}
?>