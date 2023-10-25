<?php
    $nr_indeksu = '123456';
    $nr_grupy = '4';

    echo 'Artur Sutuła '.$nr_indeksu. ' grupa '.$nr_grupy.'<br/><br/>';

    echo 'Zastosowanie metody include()<br/>';

    include 'color.php';

    echo 'Test: '.$color1.'<br/>';

    echo 'Zastosowanie metody require()<br/>';

    require 'color2.php';

    echo 'Test: '.$color4.'<br/>';

    echo 'Zastosowanie warunków if, else, elseif, switch <br/>';


    $x = 3;
    $y = 4;

    if($x < $y)
    {
        echo 'Zmienna y jest wieksza od zmiennej x <br/>';
    }elseif($x > $y){
        echo 'Zmienna x jest wieksza od zmiennej y <br/>';
    }else{
        echo 'Obie zmienne sa sobie rowne<br/>';
    }
    
    $kolor = "green";

    switch($kolor){
        case "red":
            echo "Wybrano kolor czerwony <br/>";
            break;
          case "green":
            echo "Wybrano kolor zielony <br/>";
            break;
          case "blue":
            echo "Wybrano kolor niebieski <br/>";
            break;
        
    }

    echo 'Zastosowanie petli while i for <br/>';

    $i = 1;

    while($i < 10)
    {
        echo $i++.'<br/>';
    }


    for ($j = 0; $j <= 10; $j++) {
        echo "Numer: $j <br/>";
      }
?>

