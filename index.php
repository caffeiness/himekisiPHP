<?php
require_once('deck.php');
require_once('game.php');
require_once('judgement.php');
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $button =$_POST['button'];
    $game = new Game;
    $judge = new Judgement;
    switch ($button) {
        case 'newgame':
            $ceatedeck = new CreateDeck;
            $_SESSION['deck'] = $ceatedeck->shuffleDeck();
            $_SESSION['messages'] = $game->startGame();
            $_SESSION['user_hand'] = $game->firstDraw(); 
            array_splice($_SESSION['deck'], 0, 2); 
            $_SESSION['cpu_hand'] = $game->firstDraw();
            $_SESSION['secret_card'] = $_SESSION['deck'][1];
            array_splice($_SESSION['deck'], 0, 2);
            $user_points = $game->totalPoints($_SESSION['user_hand']);
            $judgement = $judge->bustOrBlackjack($user_points, 'あなた');
            $_SESSION['messages'][] = 'あなたの得点は:' . $user_points;
            break;
        case 'addcard':
            $_SESSION['messages'][] = $game->showCard('あなた');
            $_SESSION['user_hand'][] = $game->nextDraw();
            array_splice($_SESSION['deck'], 0, 1);
            $user_points = $game->totalPoints($_SESSION['user_hand']);
            $judgement = $judge->bustOrBlackjack($user_points, 'あなた');
            $_SESSION['messages'][] = 'あなたの得点は:' . $user_points;
            break;
        case 'game':
            $user_points = $game->totalPoints($_SESSION['user_hand']);
            $cpu_points = $game->totalPoints($_SESSION['cpu_hand']);
            $_SESSION['messages'][] = 'CPUの2枚目のカードは' . $_SESSION['secret_card'] . 'でした';
            $judgement = $judge->bustOrBlackjack($cpu_points, 'CPU');
            if (empty($judgement) && $cpu_points < 17) {
                for ($i=0; $cpu_points < 17; $i++) {
                    $_SESSION['messages'][] = $game->showCard('CPU');
                    $_SESSION['cpu_hand'][] = $game->nextDraw();
                    array_splice($_SESSION['deck'], 0, 1);
                    $cpu_points = $game->totalPoints($_SESSION['cpu_hand']);
                }
                $_SESSION['messages'][] = 'CPUの得点は:' . $cpu_points;
                $judgement = $judge->bustOrBlackjack($cpu_points, 'CPU');
                if (empty($judgement)) {
                    $judgement = $judge->checkTheWinner($user_points, $cpu_points);
                }
            } else {
                $_SESSION['messages'][] = 'CPUの得点は:' . $cpu_points;
                $judgement = $judge->checkTheWinner($user_points, $cpu_points);
            }
            break;
        default :
            echo 'error';
            exit;
    }
} else {
    echo "<form action='' method='post'>";
    echo "<input type='submit' name='button' value='newgame'>";
    echo "</form>";
    exit;
}
?>


<html>
<head lang="ja">
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
<meta name = "viewport" content = "width=device-width, intial-scale = 1.0">
<title>姫騎士の魂</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
    <div class="text-center">
    <h1>姫騎士の魂</h1>
    <hr>
    相手のカード:
    <img src = "images/z01.png" height = 150 width = 100>
    <img src = "images/z01.png" height = 150 width = 100>
    <form action="judgement.php" method="POST">
        <?php
            echo aiteno;
        ?>
    </form>

    <p>カードをひきますか？(チップが一枚必要)</p>
    <form action='' method='post'>
        <input type='submit' name='button' value='newgame'>
        <input type='submit' name='button' value='addcard'>　<!-- カードを追加する -->
        <input type='submit' name='button' value='game'>  <!-- 勝負に移る -->
    </form>
</body>
</html>


<!--
<from action="top.php" method="GET">
<input type="submit" value="勝負">
<input type="hidden" value=0 name="win">
<input type="hidden" value=0 name="lose">
<input type="hidden" value=0 name="aiko">
-->