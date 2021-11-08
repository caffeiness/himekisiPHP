<?php 
  require_once 'function.php';
  $first = $_POST["winner"];
  $level = filter_input(INPUT_POST, 'level');
  $Pool_tip = $_POST["Pool_tip"];
  $CPU_tip = $_POST["CPU_tip"];
  $CPU_tip_color = $_POST["CPU_tip_color"];
  $Player_tip = $_POST["Player_tip"];
  $Player_tip_color = $_POST["Player_tip_color"];
  $CPU_hand = $_POST["CPU"];
  $Player_hand = $_POST["Player"];
  $deck = $_POST["deck"];
  $Player_hand[] = array_shift($deck);

  if(isset($_POST["draw"])){  //勝った回数
   $Pool_tip += 1;
   $Player_tip -= 1;
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
    <img src="images/<?php echo $CPU_tip_color ?>.png" width="100" height="100">
    <span class="kakomu"><font color="black"><?php echo $CPU_tip ?></font></span>
    <font color="white">相手のカード:</font>
        <?php
        if(count($CPU_hand) == 3){
          echo '<img src="images/z01.png" width="100" height="150">';
        }
        else{
          $CPU_result = result_num($CPU_hand);
          if($CPU_tip > 1 && $CPU_result < 10){
            $CPU_hand[] = array_shift($deck);
            var_dump($CPU_hand);
            $Pool_tip += 1;
            $CPU_tip -= 1;
          }
          if(count($CPU_hand) == 3){
            echo '<img src="images/z01.png" width="100" height="150">';
          }
        }
        ?>
        <img src="images/z01.png" width="100" height="150">
        <img src="images/z01.png" width="100" height="150">
        <br><img src="images/<?php echo $Player_tip_color ?>.png" width="100" height="100">
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
        <input type='hidden' name='CPU_tip_color' value=<?php echo $CPU_tip_color; ?>>
        <input type='hidden' name='Player_tip' value=<?php echo $Player_tip; ?>>
        <input type='hidden' name='Player_tip_color' value=<?php echo $Player_tip_color; ?>>
        <input type='hidden' name='winner' value=<?php echo $first; ?>>
        <?php 
        //この画面からいくとdeckがないためエラー出る
        for($i=0; $i < count($deck); $i++) {
            echo "<input type='hidden' name='deck[]' value=".$deck[$i].">";
        }
        ?>
        <input type='hidden' name='winner' value=<?php echo $level; ?>>
    </form>
  </body>
</html>