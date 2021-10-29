<?php 
  $CPU_tip = $_POST["CPU_tip"];
  $Player_tip = $_POST["Player_tip"];
  $CPU_result = $_POST["CPU"];
  $Player_result = $_POST["Player"];
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
          $tip = WinorLose($CPU_num,$Player_num,$CPU_tip,$Player_tip);
          $CPU_tip = $tip[0];
          $Player_tip = $tip[1];
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
        ?><br>
  </body>
</html>