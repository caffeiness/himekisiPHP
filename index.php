<html>
<head lang="ja">
  <meta http-equiv="Content-Type" content="text/html; charset=utf8">
  <meta name = "viewport" content = "width=device-width, intial-scale = 1.0">
  <title>姫騎士の魂</title>

</head>
  <body>
    <link rel="stylesheet" href="css/first.css">
    <h1>姫騎士の魂</h1>
    <hr>
    ルール
    <p>
    チップを１０枚ずつ配り、それぞれ黒陣営（クローバー）と白陣営（ハート）に分かれて戦う。 
    <br>トランプのクローバーとハートのみを使い、その内２枚のカードの合計で勝負する。 
    <br>同色は足し算で、異色だと引き算になる。 
    <br>また、一度だけ手札を補充できるがチップを１枚賭ける必要がある。
    <p>
    <br>勝負時にはチップを１枚賭ける。 
    <br>勝利時に、自分の陣営と同じ色で勝てばチップを得られるがそうでなければ捨てられる
    <br>（賭けチップに使用できない）。 
    <br>ラウンド終了時、勝利者を先攻として次ラウンドへ移る。
    <br>引き分けの場合賭けたチップは持ち越す。
    <p>
    どちらかのチップが０になったら終了。
    <br>
    <div class="image">
      <p style="text-align:center;">
        <img src="images/screenshot.png" width="700" height="500">
      </p>
    </div>
    <p>
    <form action="firstpage.php" method="POST">
      <input type="submit" value="nomal">
      <input type='hidden' name='level' value="nomal">
    </form>
    <form action="firstpage.php" method="POST">
      <input type="submit" value="hard">
      <input type='hidden' name='level' value="hard">
    </form>
  </body>
</html>