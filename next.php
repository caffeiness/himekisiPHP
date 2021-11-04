<?php 
  $first = $_POST["winner"];
  $Pool_tip = $_POST["Pool_tip"];
  $CPU_tip = $_POST["CPU_tip"];
  $Player_tip = $_POST["Player_tip"];
  $CPU_hand = $_POST["CPU"];
  $Player_hand = $_POST["Player"];
  $deck = $_POST["deck"];
  $Player_hand[] = array_shift($deck);
  //$conversion = implode(",", $Player_hand);

  if(isset($_POST["draw"])){  //勝った回数
   $Pool_tip += 1;
   $Player_tip -= 1;
   } else {
   $Pool_tip = 0;
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
        <input type='hidden' name='Pool_tip' value=<?php echo $Pool_tip; ?>>
        <input type='hidden' name='CPU_tip' value=<?php echo $CPU_tip; ?>>
        <input type='hidden' name='Player_tip' value=<?php echo $Player_tip; ?>>
        <input type='hidden' name='winner' value=<?php echo $first; ?>>
    </form>
  </body>
</html>