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
<form action="judgement.php" method="POST">
<input type="submit" value="カードを補充する">
<input type="hidden" value=<?php echo $win; ?>  name="win">
<input type="hidden" value=<?php echo $lose; ?> name="lose">
<input type="hidden" value=<?php echo $aiko; ?> name="aiko">
</form>
<from action="top.php" method="GET">
<input type="submit" value="はじめから？">
<input type="hidden" value=0 name="win">
<input type="hidden" value=0 name="lose">
<input type="hidden" value=0 name="aiko">
</form>
</body>
</html>