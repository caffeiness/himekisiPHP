<?php

    $deck = [];
    $faces = [];
    $suits = array("h","c");

    for($i = 1;$i <= 13;$i++){
        $faces[] = $i;
    };

    foreach($suits as $suit){
        foreach($faces as $face){
            $deck[]  = $suit . $face;
        };
    };

    shuffle($deck);

    $Player_hand = [];
    $CPU_hand = [];

    for($i=0;$i<2;$i++){
        $player_hand = array_shift($deck);
        $CPU_hand = array_shift($deck);
    };

    function outputHandCard($card) {
        $img = "images/" . $card;
        $img1 = $img . ".png";
        echo "<img src=" . $img1 . " width=210 height=140><br>";
    };
?>

<!--
<html>
<head lang="ja">
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
<meta name = "viewport" content = "width=device-width, intial-scale = 1.0">
<title>姫騎士の魂</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
    <div class="text-center">
    <h1>姫騎士の魂</h1>
    <hr>
    相手のカード:
    <img src = "images/z01.png" height = 150 width = 100>
    <img src = "images/z01.png" height = 150 width = 100>
    <form action="judgement.php" method="POST">
    </form>


<from action="top.php" method="GET">
<input type="submit" value="勝負">
<input type="hidden" value=0 name="win">
<input type="hidden" value=0 name="lose">
<input type="hidden" value=0 name="aiko">
</form>
</body>
</html>
-->