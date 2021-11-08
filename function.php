<?php
    require_once 'judgement.php';
    function outputHandCard($card) {
        $img = "images/" . $card;
        $img1 = $img . ".png";
        echo "<img src=" . $img1 . " width=100 height=150>";
    };
    
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
      
      if (isset($CPU_hand_h)) {
          if(count($CPU_hand_h) >= 2){
              return $CPU_hand_h;
          }
      }
      if (isset($CPU_hand_c)) {
          if(count($CPU_hand_c) >= 2){
              return $CPU_hand_c;
          }
      }   
  };
?>
