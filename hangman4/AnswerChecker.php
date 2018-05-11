<?php

/**
 *
 */
class AnswerChecker
{
  //question は配列
  private $question;

  function __construct(string $input)
  {
    $this->question = str_split($input);
  }

  public function check(string $letter,GameBoard $gameBoard,Renderer $renderer){
    $stage = "";
    if(!$this->checkDuplicate($letter,$gameBoard)){
      if(strpos(implode($this->question),$letter) !== false){
        return $stage = $gameBoard->changeState($this->question,$letter,"success");
      }
      return $stage = $gameBoard->changeState($this->question,$letter,"failed");
    }
  }
  private function checkDuplicate(string $letter,GameBoard $gameBoard){
    $answer = $gameBoard->getAnswerState();
    if(strpos(implode($answer),$letter) !== false){
      return true;
    }
    return false;
  }

}
