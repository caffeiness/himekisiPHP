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

$Player_tip = 5;
$CPU_tip = 5; 

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
    <img src="images/tipkuro.png" width="100" height="100">
    <span class="kakomu"><font color="black"><?php echo $CPU_tip ?></font></span>
    <font color="white">相手のカード:</font>
        <img src="z01.png" width="100" height="150">
        <img src="z01.png" width="100" height="150">
        <br><img src="images/tipkuro.png" width="100" height="100">
        <span class="kakomu"><font color="black"><?php echo $Player_tip ?></font></span>
        <?php
          require_once 'function.php';
          echo '<font color="white">あなたのカード:</font>';
          for($i=0;$i<2;$i++){
            outputHandCard($Player_hand[$i]);
          };
        ?>  
    <br>
    <form action="result.php" method="POST">
        <input type="submit" value="勝負">
        <input type="radio" name="choice" value=<?php echo $Player_hand[0]; ?>><?php echo $CPU_hand[0]; ?>
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
        <input type='hidden' name='CPU_tip' value=<?php echo $CPU_tip; ?>>
        <input type='hidden' name='Player_tip' value=<?php echo $Player_tip; ?>>
    </form>
  </body>
</html>