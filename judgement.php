<?php

Class Judgement 
{
    private $_messages = [];
    public function winorlose($user_value,$cpu_value, $name) {
        if ($user_value == $cpu_value) {
            $this->_messages[] = '引き分けです！！';
        } elseif ($user_value > $cpu_value) {
            $this->_messages[] = 'あなたの勝ちです！！';
        } else {
            $this->_messages[] = 'CPUの勝ちです！！';
        }

        #if ($user_value == MAXVALUE) {
            #$this->_messages[] = $name . 'の勝ちです！！';
        #} elseif ($points > MAXVALUE) {
            #$this->_messages[] = $name . 'の負けです！！';
            #return $this->_messages;
        #}
    }

    public function checkTheWinner($user_point, $cpu_point) {
        if ($user_point == $cpu_point) {
            $this->_messages[] = '引き分けです！！';
        } elseif ($user_point > $cpu_point) {
            $this->_messages[] = 'あなたの勝ちです！！';
        } else {
            $this->_messages[] = 'CPUの勝ちです！！';
        }
        return $this->_messages;

    }
}