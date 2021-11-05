<?php
    require_once 'judgement.php';
    function outputHandCard($card) {
        $img = "images/" . $card;
        $img1 = $img . ".png";
        echo "<img src=" . $img1 . " width=100 height=150>";
    };

    function  addCPUCard($CPU_hand,$deck,$CPU_tip){
      $CPU_result = result_num($CPU_hand);
      if($CPU_result < 10){
        $CPU_hand = array_shift($deck);
        $CPU_tip -= 1;
      }
      return array($CPU_hand,$CPU_tip);
    }
?>
