<html>
<head lang="ja">
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
<title></title>
</head>
<body bgcolor="#FFDDDD">
<php
    
?>

<form method="post" action="">
    <input type="submit" value="リセット" name="reset">
    <input type="submit" value="カード交換" name="card">
</form>

<div id=cpuHandNum>CPU's hands:
    <?php
      echo countCards($_SESSION['handsCPU']);
    ?>
</div>

</body>
</html>
