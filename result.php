<html>
<head lang="ja">
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
<title>シンプルなじゃんけんゲーム</title>
</head>
<body bgcolor="#FFDDDD">

結果
 
<?php
  $CPU_result = $_GET["CPU"];
  print_r($CPU_result);
  //$max = count($CPU_result);
  //for($i=0; $i<$max; $i++) {
    //echo "{$CPU_result[$i]}<br/>\n";
  //};


  echo $_GET["Player1"];
  echo $_GET["Player2"];

  require_once 'function.php';
  echo '<br>あなたのカード:<br>';
  for($i=0;$i<2;$i++){
    outputHandCard($CPU_result[$i]);
  };
?>

<input type="hidden" value=<?php echo $_GET['CPU']; ?>  name="CPU">
</form>
</body>
</html>