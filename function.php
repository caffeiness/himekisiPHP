<?php

function outputHandCard($ca) {
    $img = "images/";
    switch ($card['mark']) {
      case "spade":
        $img1 = $img . "s";
        break;
      case "heart":
        $img1 = "h" . $img;
        break;
      case "diamond":
        $img1 = $img . "d";
        break;
      case "club":
        $img1 = "c" . $img;
        break;
    }
    $img1 = $img1 . sprintf("%02d", $card['num']);
    $img1 = $img1 . ".png";
    $value = $card['mark'] . "," . $card['num'];
    echo "<button type=\"submit\" name=\"hand\" value=$value class=\"gazo\"><img src=" . $img1 . " width=100% height=100%><br></button>";
  }

function cardOutput($fieldCards) {
    $img = "images/";
    echo "<div>";
    foreach ($fieldCards as $card) {
      $img1 = $img;
      switch ($card["mark"]) {
        case "spade":
          $img1 = $img . "s";
          break;
        case "heart":
          $img1 = $img . "h";
          break;
        case "diamond":
          $img1 = $img . "d";
          break;
        case "club":
          $img1 = $img . "c";
          break;
      }
      $img1 = $img1 . sprintf("%02d", $card["num"]);
      $img1 = $img1 . ".png";
      echo "<img src=" . $img1 . " width=5% height=5%>";
      if ($card["num"] == 13) {
        echo "<br />";
      }
    }
    echo "</div>";
  }

function init_playCard() {
    $cards = array();
    $trumpMarks = array('club', 'heart', 'spade',  'diamond');
    foreach ($trumpMarks as $mark) {
      for ($i = 1; $i <= 13; $i++) {
        if ($i == 7) {
          continue;
        }
        $cards[] = array(
          'mark' => $mark,
          'num' => $i,
          'isField' => false
        );
      }
    }
    shuffle($cards);
    return $cards;
  }

function countCards($hands) {
    $count = 0;
    foreach ($hands as $card) {
      if (!$card["isField"]) {
        $count += 1;
      }
    }
    return $count;
    }

?>

<?php
  function outputHandCard($card) {
    $img = "images/";
    switch ($card['suit']) {
      case "spade":
        $img1 = $img . "s";
        break;
      case "heart":
        $img1 = "h" . $img;
        break;
      case "diamond":
        $img1 = $img . "d";
        break;
      case "club":
        $img1 = "c" . $img;
        break;
    }
    $img1 = $img1 . sprintf("%02d", $card['face']);
    $img1 = $img1 . ".png";
    echo "<img src=" . $img1 . " width=150 height=100><br>";
  }
?>
