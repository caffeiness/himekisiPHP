<?php
    function outputHandCard($card) {
        $img = "images/" . $card;
        $img1 = $img . ".png";
        echo "<img src=" . $img1 . " width=100 height=150>";
    };
?>
