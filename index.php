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

if(isset($_POST["Player_tip"])){  //勝った回数
   $Player_tip = $_POST["Player_tip"];
   } else {
   $Player_tip = 5;
};

if(isset($_POST["CPU_tip"])){  //勝った回数
   $CPU_tip = $_POST["CPU_tip"];
   } else {
   $CPU_tip = 5;
};


//$Player_tip = 5;
//$CPU_tip = 5; 

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
        <img src="images/z01.png" width="100" height="150">
        <img src="images/z01.png" width="100" height="150">
        <br><img src="images/tipkuro.png" width="100" height="100">
        <span class="kakomu"><font color="black"><?php echo $Player_tip ?></font></span>
        <?php
          require_once 'function.php';
          echo '<font color="white">あなたのカード:</font>';
          for($i=0;$i<count($Player_hand);$i++){
            outputHandCard($Player_hand[$i]);
          };
        ?>  
    <br><br>
    <form action="result.php" method="POST">
        <?php 
        for($i=0; $i < count($Player_hand); $i++) {
            echo "<input type='checkbox' name='choice[]' value=".$Player_hand[$i].">";
            echo '<font color="white">'.$Player_hand[$i].'</font>';
        }
        ?>
        <input type="submit" value="勝負">
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