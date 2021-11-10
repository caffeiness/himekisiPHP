<?php
    require_once 'judgement.php';
    //手札を表示させる
    function outputHandCard($card) {
        $img = "images/" . $card;
        $img1 = $img . ".png";
        echo "<img src=" . $img1 . " width=100 height=150>";
    };
    
    //CPUの手札から同じスートを二枚選んで返す
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

    //CPUの手札を三通りから最大となるような組み合わせを返す
    function CPU_result_num($number) {
        $CPU_result_1 = result_num($number);
        $CPU_result_2 = result_num(array_slice($number, 1));
        $number_result = $number;
        array_splice($number,1,1);
        $CPU_result_3 = result_num($number);
        
        if($CPU_result_1 <= $CPU_result_2 && $CPU_result_3 <= $CPU_result_2){
            $number_result = array_slice($number_result, 1); 
        }elseif($CPU_result_1 <= $CPU_result_3 && $CPU_result_2 <= $CPU_result_3){
            $number_result = $number;
        }
        return $number_result;
    };
?>
