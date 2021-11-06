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
    
    function choiceCPUCard($CPU_hand){
      if (is_array($CPU_hand)) {
          for($i=0; $i < count($CPU_hand); $i++) {
              $suit[] = $CPU_hand[$i][0];
              if($suit[$i] == "c"){
                  $CPU_hand_c[] = $CPU_hand[$i];
              }else{
                  $CPU_hand_h[] = $CPU_hand[$i];   
              }
          }

      };
      
      if (is_array($CPU_hand_h)) {
          if(count($CPU_hand_h) == 2){
              return $CPU_hand_h;
          }else{
              return $CPU_hand_c;
          }
      }   
  };
?>
