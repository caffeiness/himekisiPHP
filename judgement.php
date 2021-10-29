<?php
function result_num($number) {
  if($number[0][0] == $number[1][0]){
    //$result = preg_replace('/[^0-9]/', '', $number[0][1]));
    $card = intval(preg_replace('/[^0-9]/', '', $number[0])) + intval(preg_replace('/[^0-9]/', '', $number[1]));
  }else{
    $card = intval(preg_replace('/[^0-9]/', '', $number[0])) - intval(preg_replace('/[^0-9]/', '', $number[1]));
    if($card < 0){
      $card *= -1; 
    }
  };
  return $card;
};

function WinorLose($CPU_num,$Player_num,$CPU_tip,$Player_tip){
  if($CPU_num < $Player_num){
    echo '<font color="white">あなたの勝ちです。</font>';
    $CPU_tip -= 1;
    $Player_tip += 1;
  }else{
    echo '<font color="white">あなたの負けです。</font>';
    $CPU_tip += 1;
    $Player_tip -= 1;
  };

  return array($CPU_tip,$Player_tip);
};
?>