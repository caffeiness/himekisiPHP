<html>
<head lang="ja">
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
<title>シンプルなじゃんけんゲーム</title>
</head>
<body bgcolor="#FFDDDD">

結果
<?php
  echo $_GET["CPU"];
?>

<input type="hidden" value=<?php echo $_GET['CPU']; ?>  name="CPU">
<input type="hidden" value=<?php echo $_GET['Player']; ?> name="aiko">
</form>
</body>
</html>