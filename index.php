<?php

for($i = 1;$i <= 13;$i++){
        $faces[] = $i;
    };
    

$suits = array("h","c");
    
foreach($suits as $suit){
    foreach($faces as $face){
        $deck[]  = $suit . $face;
    };
};

shuffle($deck);

$Player_hand = [];
$CPU_hand = [];
for($i=0;$i<2;$i++){
    $Player_hand[] = array_shift($deck);
    $CPU_hand[] = array_shift($deck);
    $conversion = implode(",", $Player_hand);
    $conversion = implode(",", $CPU_hand);
};

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
    相手のカード: 
        <img src="z01.png" width="100" height="150">
        <img src="z01.png" width="100" height="150">
        <?php
          require_once 'function.php';
          echo '<br>あなたのカード:';
          for($i=0;$i<2;$i++){
            outputHandCard($Player_hand[$i]);
          };
        ?>  
    <br>
<!--
<input type="hidden" name="leftCardFace" value = "{$CPU_hand['face']}">
<input type="hidden" name="leftCardsuit" value = "{$CPU_hand['suit']}">
<input type="hidden" name="leftCardkey" value = "{$CPU_hand['key']}">
<input type="hidden" name="righttCardFace" value = "{$Player_hand['face']}">
<input type="hidden" name="rightCardsuit" value = "{$Player_hand['suit']}">
<input type="hidden" name="rightCardkey" value = "{$Player_hand['key']}">
-->


<form action="result.php" method="GET">
    <input type="submit" value="勝負">
    <input type="radio" name="janken" value=<?php echo $CPU_hand[0]; ?>><?php echo $CPU_hand[0]; ?>
    <input type="radio" name="janken" value="{$Player_hand}">
    <input type="hidden" value=<?php echo $CPU_hand[0]; ?> name="CPU">
    <input type="hidden" value="{$Player_hand}" name="Player">
</form>
</body>
</html>