<?php

$negara = array(
    "India" => array(
        "Ibu Kota" => "New Delhi",
        "Kode Telpon" => "91",
        "Mata Uang" => "INR"
    ),
    "Indonesia" => array(
        "Ibu Kota" => "Jakarta",
        "Kode Telpon" => "62",
        "Mata Uang" => "IDR"
    ),
    "Japan" => array(
        "Ibu Kota" => "Tokyo",
        "Kode Telpon" => "81",
        "Mata Uang" => "JPY"
    )
);

foreach ($negara as $n => $nama){
    echo "<b><i>".$nama["Ibu Kota"]."</i></b> is a capital city of <b>".$n."</b>. <u>".$n."'s calling code is ".$nama["Kode Telpon"]." and has <q>".$nama["Mata Uang"]."</q> as a currency code.</u></br>";
}

?>