<?php

session_start();
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
<link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="text-center">
    <h1>姫騎士の魂</h1>
    <hr>
    相手のカード: 
        <img src="images/z01.png" width="100" height="150">
        <img src="images/z01.png" width="100" height="150">
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


<form action="result.php" method="POST">
    <input type="submit" value="勝負">
    <input type="radio" name="janken" value=<?php echo $CPU_hand[0]; ?>><?php echo $CPU_hand[0]; ?>
    <?php 
    for($i=0; $i < count($CPU_hand); $i++) {
        echo "<input type='hidden' name='CPU[]' value=" . $CPU_hand[$i] . ">";
    }
    ?>
    <?php 
    for($i=0; $i < count($Player_hand); $i++) {
        echo "<input type='hidden' name='Player[]' value=" . $Player_hand[$i] . ">";
    }
    ?>
</form>

</body>
</html>