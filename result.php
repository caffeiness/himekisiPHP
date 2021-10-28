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
        <?php
          $CPU_result = $_POST["CPU"];
          $Player_result = $_POST["Player"];
          require_once 'function.php';
          //echo '<br>CPUのカード:';
          for($i=0;$i<2;$i++){
            outputHandCard($CPU_result[$i]);
          };
          echo '<br>あなたのカード:';
          for($i=0;$i<2;$i++){
            outputHandCard($Player_result[$i]);
          };
        ?><br>
    <!--
    <form action="result.php" method="POST">
    <input type="submit" value="勝負">
    <input type="radio" name="janken" value=<?php echo $CPU_hand[0]; ?>><?php echo $CPU_hand[0]; ?>
    -->
    <!-- <input type="hidden" value=<?php echo $CPU_hand[1]; ?> name="CPU2"> -->
</body>
</html>