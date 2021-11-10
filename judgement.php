<?php
  //二枚の手札を計算して合計値を返す
  function result_num($number) {
    if($number[0][0] == $number[1][0]){
      $card = intval(preg_replace('/[^0-9]/', '', $number[0])) + intval(preg_replace('/[^0-9]/', '', $number[1]));
    }else{
      $card = intval(preg_replace('/[^0-9]/', '', $number[0])) - intval(preg_replace('/[^0-9]/', '', $number[1]));
      if($card < 0){
        $card *= -1; 
      }
    };
    return $card;
  };

  //チップとスートが一致しているかを返す、0で一致していない扱い
  function result_tip($number,$tip_color) {
    $hand1 = intval(preg_replace('/[^0-9]/', '', $number[0]));
    $hand2 = intval(preg_replace('/[^0-9]/', '', $number[1]));
    if($hand1 > $hand2){
      $suit = $number[0][0];
      if($suit == "c" && $tip_color == "tipkuro"){
        $tip = 1;
      }elseif($suit == "h" && $tip_color == "tipsiro"){
        $tip = 1;
      }else{
        $tip = 0;
      }
    }else{
      $suit = $number[1][0];
      if($suit == "c" && $tip_color == "tipkuro"){
        $tip = 1;
      }elseif($suit == "h" && $tip_color == "tipsiro"){
        $tip = 1;
      }else{
        $tip = 0;
      }
    }
    return $tip;
  };



  //勝敗を決め、チップの計算をしその値を返す
  function WinorLose($CPU_num,$Player_num,$Pool_tip,$CPU_tip,$Player_tip,$CPU_tip_color,$Player_tip_color){
    if($CPU_num == $Player_num){
      echo '<font color="white">引き分けです。</font>';
      $Pool_tip += 2;
      $CPU_tip -= 1;
      $Player_tip -= 1;
    }elseif($CPU_num < $Player_num){
      echo '<font color="white">あなたの勝ちです。</font>';
      if($Player_tip_color != 0){
        $CPU_tip -= 1;
        $Player_tip += 1;
        $Player_tip += $Pool_tip;
        $Pool_tip = 0;
      }else{
        $CPU_tip -= 1;
        $Player_tip -= 1;
        $Pool_tip = 0;
      }
    }else{
      echo '<font color="white">あなたの負けです。</font>';
      if($CPU_tip_color != 0){
        $CPU_tip += 1;
        $CPU_tip += $Pool_tip;
        $Player_tip -= 1;
        $Pool_tip = 0;
      }else{
        $Player_tip -= 1;
        $CPU_tip -= 1;
        $Pool_tip = 0;      
      }
    };
    return array($CPU_tip,$Player_tip,$Pool_tip);
  };
?>