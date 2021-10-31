<?php 
  //かけてあるチップの移動ができていない
  $Pool_tip = $_POST["Pool_tip"];
  $CPU_tip = $_POST["CPU_tip"];
  $Player_tip = $_POST["Player_tip"];
  $CPU_result = $_POST["CPU"];
  $Player_result = $_POST["choice"]; //チェックしてなかった時の処理をどうするか 
  require_once 'function.php';
  require_once 'judgement.php';
  //echo '<br>CPUのカード:';
  $CPU_num = result_num($CPU_result);
  $Player_num = result_num($Player_result);
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
          $tip = WinorLose($CPU_num,$Player_num,$Pool_tip,$CPU_tip,$Player_tip);
          $CPU_tip = $tip[0];
          $Player_tip = $tip[1];
          $Pool_tip = $tip[2];
          echo '<br><img src="images/tipkuro.png" width="100" height="100">';
          echo '<span class="kakomu"><font color="black">'.$CPU_tip.'</font></span>';
          echo '<font color="white">相手のカード:</font>';
          for($i=0;$i<2;$i++){
            outputHandCard($CPU_result[$i]);
          };
          
          echo '<br><img src="images/tipkuro.png" width="100" height="100">';
          echo '<span class="kakomu"><font color="black">'.$Player_tip.'</font></span>';
          echo '<font color="white">あなたのカード:</font>';
          for($i=0;$i<2;$i++){
            outputHandCard($Player_result[$i]);
          };
          echo '<br>';
          if($CPU_tip <= 0){
            echo '<br><font color="white">あなたの勝ちです！</font>';
          }elseif($Player_tip <= 0){
            echo '<br><font color="white">チップがなくなりました、あなたの負けです。</font>';
            //続行可能できちゃう
          };

        ?><br>
        <br>
    <form action="index.php" method="POST">
      <?php
        if($CPU_tip > 0 && $Player_tip > 0){
          echo '<input type="submit" value="もう一度やる？">';
        }
      ?>
      <input type="hidden" value=<?php echo $CPU_tip; ?>  name="CPU_tip">
      <input type="hidden" value=<?php echo $Player_tip; ?> name="Player_tip">
      <input type="hidden" value=<?php echo $Pool_tip; ?> name="Pool_tip">
    </form>  

    <form action="index.php" method="POST">
      <input type="submit" value="はじめから？">
      <input type="hidden" value= name="Pool_tip">
      <input type="hidden" value= name="CPU_tip">
      <input type="hidden" value= name="Player_tip">
  </body>
</html>
