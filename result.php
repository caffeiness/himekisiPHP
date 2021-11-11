<?php 
  require_once 'function.php';
  require_once 'judgement.php';
  $first = $_POST["winner"];
  $level = filter_input(INPUT_POST, 'level');
  $deck = $_POST["deck"];
  $Pool_tip = $_POST["Pool_tip"];
  $CPU_tip = $_POST["CPU_tip"];
  $CPU_tip_color = $_POST["CPU_tip_color"];
  $Player_tip = $_POST["Player_tip"];
  $Player_tip_color = $_POST["Player_tip_color"];
  $CPU_result = $_POST["CPU"];

  //CPUが後攻で手札を引かなかった時の処理
  if($first != 0 && count($CPU_result) == 2){
    $CPU_num = result_num($CPU_result);
    if($CPU_tip > 1 && $CPU_num < 10){
      $CPU_result[] = array_shift($deck);
      $Pool_tip += 1;
      $CPU_tip -= 1;
      }
  };
  
  //難易度選択によって手札を選ぶ関数を変える
  if(count($CPU_result) > 2){
    if($level == "hard"){
      $CPU_result = CPU_result_num($CPU_result);
    }else{
      $CPU_result = choiceCPUCard($CPU_result);
    }
  };

  $CPU_tip_result = result_tip($CPU_result,$CPU_tip_color);
  $CPU_num = result_num($CPU_result);

  //手札選択されてない時の処理も追加
  if(isset($_POST["choice"]) && count($_POST["choice"]) == 2){
    $Player_result = $_POST["choice"];
    $Player_tip_result = result_tip($Player_result,$Player_tip_color);
    $Player_num = result_num($Player_result);
  }else {
    $Player_result = array("z01","z01");
    $Player_tip_result = result_tip($Player_result,$Player_tip_color);
    $Player_num = 0;
  };
?>

<html>
<head lang="ja">
  <meta http-equiv="Content-Type" content="text/html; charset=utf8">
  <meta name = "viewport" content = "width=device-width, intial-scale = 1.0">
  <title>姫騎士の魂</title>
  <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="text-center">
    <h1>姫騎士の魂</h1>
    <hr>
        <?php
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
          //全体的な勝敗
          if($CPU_tip == 0 && $Player_tip == 0){
            echo '<br><font color="white">引き分けです</font>';
          }elseif($CPU_tip <= 0){
            echo '<br><font color="white">あなたの勝ちです！</font>';
          }elseif($Player_tip <= 0){
            echo '<br><font color="white">チップがなくなりました、あなたの負けです。</font>';
          };

          //勝った場合先行になるのでその処理、引き分けはランダム
          if($CPU_num == $Player_num){
            $first = rand() % 2;
          }elseif($CPU_num > $Player_num){
            $first = 0;
          }else{
            $first = 1;
          };

        ?>
        <p>
    <form action="index.php" method="POST">
      <?php
        //互いにチップがあるときのみ表示
        if($CPU_tip > 0 && $Player_tip > 0){
          echo '<input type="submit" value="もう一度やる？">';
        }
      ?>
      <input type='hidden' name='Pool_tip' value=<?php echo $Pool_tip; ?>>        
      <input type='hidden' name='CPU_tip' value=<?php echo $CPU_tip; ?>>
      <input type='hidden' name='CPU_tip_color' value=<?php echo $CPU_tip_color; ?>>
      <input type='hidden' name='Player_tip' value=<?php echo $Player_tip; ?>>
      <input type='hidden' name='Player_tip_color' value=<?php echo $Player_tip_color; ?>>
      <input type='hidden' name='winner' value=<?php echo $first; ?>>
      <input type='hidden' name='level' value=<?php echo $level; ?>>
    </form>  

    <form action="firstpage.php" method="POST">
      <input type="submit" value="はじめから？">
      <input type="hidden" name="Pool_tip"　value= >
      <input type="hidden" name="CPU_tip"　value= >
      <input type="hidden" name="CPU_tip_color"　value= >
      <input type="hidden" name="Player_tip"value= >
      <input type="hidden" name="Player_tip_color"　value= >
      <input type='hidden' name='winner' value= >
    </form>
  </body>
</html>