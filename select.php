<?php

$suits = array("h","c");

$faces = [];
for($i = 1;$i <= 13;$i++){
    $faces[] = $i;
};

$deck = [];

foreach($suits as $suit){
    foreach($faces as $key => $face){
        $deck[]  = array("key" => $key,"face" => $face,"suit" => $suit)
    }
}

shuffle(deck);
$Player_hand = [];
$CPU_hand = [];
for($i=0;$i<2;$i++){
    $player_hand = array_shift($deck);
    $CPU_hand = array_shift($deck);
}

?>


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
    <form action="judgement.php" method="POST">
        <?php
            var_dump($_SESSION['Player_hand']);
        ?>
    </form>


<from action="top.php" method="GET">
<input type="submit" value="勝負">
<input type="hidden" value=0 name="win">
<input type="hidden" value=0 name="lose">
<input type="hidden" value=0 name="aiko">
</form>
</body>
</html>