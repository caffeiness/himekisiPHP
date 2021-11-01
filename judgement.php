<?php
  //カードの合計値を計算
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

  //勝敗の処理
  function WinorLose($CPU_num,$Player_num,$Pool_tip,$CPU_tip,$Player_tip){
    if($CPU_num == $Player_num){
      echo '<font color="white">引き分けです。</font>';
      $Pool_tip += 2;
      $CPU_tip -= 1;
      $Player_tip -= 1;
    }elseif($CPU_num < $Player_num){
      echo '<font color="white">あなたの勝ちです。</font>';
      $CPU_tip -= 1;
      $Player_tip += 1;
      $Player_tip += $Pool_tip;
      $Pool_tip = 0;
    }else{
      echo '<font color="white">あなたの負けです。</font>';
      $CPU_tip += 1;
      $CPU_tip += $Pool_tip;
      $Player_tip -= 1;
      $Pool_tip = 0;
    };

    return array($CPU_tip,$Player_tip,$Pool_tip);
  };
?>