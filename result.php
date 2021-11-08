<?php 
  require_once 'function.php';
  require_once 'judgement.php';
  $first = $_POST["winner"];
  $deck = $_POST["deck"];
  $Pool_tip = $_POST["Pool_tip"];
  $CPU_tip = $_POST["CPU_tip"];
  $CPU_tip_color = $_POST["CPU_tip_color"];
  $Player_tip = $_POST["Player_tip"];
  $Player_tip_color = $_POST["Player_tip_color"];
  $CPU_result = $_POST["CPU"];
  //var_dump($deck);
  if($first != 0){
    $CPU_num = result_num($CPU_result);
    if($CPU_tip > 1 && $CPU_num < 10){
      $CPU_result[] = array_shift($deck);
      $Pool_tip += 1;
      $CPU_tip -= 1;
      }
  };
  //var_dump($CPU_result);
  if(count($CPU_result) > 2){
      $CPU_result = choiceCPUCard($CPU_result);
  };

  if(isset($_POST["choice"])){ 
    $Player_result = $_POST["choice"];
    $Player_tip_result = result_tip($Player_result,$Player_tip_color);
    $Player_num = result_num($Player_result);
  } else {
    $Player_result = array("z01","z01");
    $Player_tip_result = result_tip($Player_result,$Player_tip_color);
    $Player_num = 0;
  };
  $CPU_tip_result = result_tip($CPU_result,$CPU_tip_color);
  $CPU_num = result_num($CPU_result);
  //先行で勝負した時、CPU引くかどうか
  
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
          echo $Pool_tip;
          $tip = WinorLose($CPU_num,$Player_num,$Pool_tip,$CPU_tip,$Player_tip,$CPU_tip_result,$Player_tip_result);
          $CPU_tip = $tip[0];
          $Player_tip = $tip[1];
          $Pool_tip = $tip[2];

          echo '<br><img src="images/'.$CPU_tip_color.'.png" width="100" height="100">';
          echo '<span class="kakomu"><font color="black">'.$CPU_tip.'</font></span>';
          echo '<font color="white">相手のカード:</font>';
          for($i=0;$i<2;$i++){
            outputHandCard($CPU_result[$i]);
          };
          
          echo '<br><img src="images/'.$Player_tip_color.'.png" width="100" height="100">';
          echo '<span class="kakomu"><font color="black">'.$Player_tip.'</font></span>';
          echo '<font color="white">あなたのカード:</font>';
          for($i=0;$i<2;$i++){
            outputHandCard($Player_result[$i]);
          };
          echo '<br>';
          if($CPU_tip == 0 && $Player_tip == 0){
            echo '<br><font color="white">引き分けです</font>';
          }elseif($CPU_tip <= 0){
            echo '<br><font color="white">あなたの勝ちです！</font>';
          }elseif($Player_tip <= 0){
            echo '<br><font color="white">チップがなくなりました、あなたの負けです。</font>';
          };

          //勝った場合先行になるのでその処理
          if($CPU_num == $Player_num){
            $first = rand() % 2;
          }elseif($CPU_num > $Player_num){
            $first = 0;
          }else{
            $first = 1;
          }

        ?><br>
        <br>
    <form action="index.php" method="POST">
      <?php
        if($CPU_tip > 0 && $Player_tip > 0){
          echo '<input type="submit" value="もう一度やる？">';
        }
      ?>
      <input type="hidden" value=<?php echo $CPU_tip; ?>  name="CPU_tip">
      <input type="hidden" value=<?php echo $CPU_tip_color; ?>  name="CPU_tip_color">
      <input type="hidden" value=<?php echo $Player_tip; ?> name="Player_tip">
      <input type="hidden" value=<?php echo $Player_tip_color; ?>  name="Player_tip_color">
      <input type="hidden" value=<?php echo $Pool_tip; ?> name="Pool_tip">
      <input type='hidden' value=<?php echo $first; ?> name='winner' >
    </form>  

    <form action="index.php" method="POST">
      <input type="submit" value="はじめから？">
      <input type="hidden" value= name="Pool_tip">
      <input type="hidden" value= name="CPU_tip">
      <input type="hidden" value= name="CPU_tip_color">
      <input type="hidden" value= name="Player_tip">
      <input type="hidden" value= name="Player_tip_color">
      <input type='hidden' value= name='winner' >
    </form>
  </body>
</html>