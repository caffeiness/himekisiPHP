<?php
require_once 'function.php';
//先行後行
if(isset($_POST["winner"])){ 
   $first = $_POST["winner"];
   } else {
   $first = rand() % 2;
};

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
};

if(isset($_POST["Pool_tip"])){ 
   $Pool_tip = $_POST["Pool_tip"];
   } else {
   $Pool_tip = 0;
};

if(isset($_POST["Player_tip"])){ 
   $Player_tip = $_POST["Player_tip"];
   } else {
   $Player_tip = 10;
};

if(isset($_POST["CPU_tip"])){
   $CPU_tip = $_POST["CPU_tip"];
   } else {
   $CPU_tip = 10;
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
    
    <?php
      if($first == 0){
        echo '<font color="white">あなたは後行です。</font>';
        //$CPU_hand[] = addCPUCard($CPU_hand,$deck);
        if(isset($_POST["CPU_tip"])){
          $CPU_tip_color = $_POST["CPU_tip_color"];
          $Player_tip_color = $_POST["Player_tip_color"]; 
        } else {
          $CPU_tip_color = "tipsiro";
          $Player_tip_color = "tipkuro";
        }
        $CPU_result = result_num($CPU_hand);
        if($CPU_result < 10){
          $CPU_hand[] = array_shift($deck);
          $Pool_tip += 1;
          $CPU_tip -= 1;
        }
        echo $CPU_hand[0];
        echo $CPU_hand[1];
        //echo $CPU_hand[2];
      }else{  
        echo '<font color="white">あなたは先行です。</font>';
        if(isset($_POST["CPU_tip"])){
          $CPU_tip_color = $_POST["CPU_tip_color"];
          $Player_tip_color = $_POST["Player_tip_color"]; 
        } else {
          $CPU_tip_color = "tipkuro";
          $Player_tip_color = "tipsiro";
        }
      };
    ?>
    <br>

    <img src="images/<?php echo $CPU_tip_color ?>.png" width="100" height="100">
    <span class="kakomu"><font color="black"><?php echo $CPU_tip ?></font></span>
    <font color="white">相手のカード:</font>
        <?php
        if (is_array($CPU_hand)) {
          if(count($CPU_hand) == 3){
            echo '<img src="images/z01.png" width="100" height="150">';
          }
        };
        ?>
        <img src="images/z01.png" width="100" height="150">
        <img src="images/z01.png" width="100" height="150">
        <br><img src="images/<?php echo $Player_tip_color ?>.png" width="100" height="100">
        <span class="kakomu"><font color="black"><?php echo $Player_tip ?></font></span>
        <?php
          echo '<font color="white">あなたのカード:</font>';
          for($i=0;$i<count($Player_hand);$i++){
            outputHandCard($Player_hand[$i]);
          };
        ?>  
    <br><br>
    <form action="next.php" method="POST">
        <?php
          if($CPU_tip > 1 && $Player_tip > 1){
            echo '<input type="submit" name="draw" value="カードを引く">';
          }
        ?>
        <?php 
        if (is_array($CPU_hand)) {
          for($i=0; $i < count($CPU_hand); $i++) {
            echo "<input type='hidden' name='CPU[]' value=" . $CPU_hand[$i] . ">";
          }
        };
        ?>
        <?php 
        for($i=0; $i < count($Player_hand); $i++) {
            echo "<input type='hidden' name='Player[]' value=" . $Player_hand[$i] . ">";
        }
        ?>
        <input type='hidden' name='Pool_tip' value=<?php echo $Pool_tip; ?>>
        <input type='hidden' name='CPU_tip' value=<?php echo $CPU_tip; ?>>
        <input type='hidden' name='CPU_tip_color' value=<?php echo $CPU_tip_color; ?>>
        <input type='hidden' name='Player_tip' value=<?php echo $Player_tip; ?>>
        <input type='hidden' name='Player_tip_color' value=<?php echo $Player_tip_color; ?>>
        <input type='hidden' name='winner' value=<?php echo $first; ?>>
        <?php 
        for($i=0; $i < count($deck); $i++) {
            echo "<input type='hidden' name='deck[]' value=".$deck[$i].">";
        }
        ?>
    </form>
    <form action="result.php" method="POST">
        <?php 
        for($i=0; $i < count($Player_hand); $i++) {
            echo "<input type='checkbox' name='choice[]' value=".$Player_hand[$i].">";
            echo '<font color="white">'.$Player_hand[$i].'</font>';
        }
        ?>
        <input type="submit" value="勝負">
        <?php 
        if (is_array($CPU_hand)) {
          for($i=0; $i < count($CPU_hand); $i++) {
            echo "<input type='hidden' name='CPU[]' value=" . $CPU_hand[$i] . ">";
          }
        };
        ?>
        <?php 
        for($i=0; $i < count($Player_hand); $i++) {
            echo "<input type='hidden' name='Player[]' value=" . $Player_hand[$i] . ">";
        }
        ?>
        <input type='hidden' name='Pool_tip' value=<?php echo $Pool_tip; ?>>
        <input type='hidden' name='CPU_tip' value=<?php echo $CPU_tip; ?>>
        <input type='hidden' name='CPU_tip_color' value=<?php echo $CPU_tip_color; ?>>
        <input type='hidden' name='Player_tip' value=<?php echo $Player_tip; ?>>
        <input type='hidden' name='Player_tip_color' value=<?php echo $Player_tip_color; ?>>
        <input type='hidden' name='winner' value=<?php echo $first; ?>>
    </form>
  </body>
</html>