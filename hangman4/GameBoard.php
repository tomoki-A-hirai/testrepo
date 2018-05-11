<?php


/**
 *
 */
class GameBoard
{
  //answerState は配列
  private $answerState;
  //gallow state は整数
  private $gallowState;
  function __construct(int $inputLength)
  {
    $this->answerState = str_split(str_pad("",$inputLength,"_"));
    $this->gallowState = 0;
  }
  public function changeState(array $question,string $letter,string $result){
    switch ($result) {
      case 'success':
        $stage = $this->success($question,$letter);
        return $stage;
        break;
      case 'failed':
        $stage = $this->failed($question,$letter);
        return $stage;
        break;
      default:
        // code..
        break;
    }
  }

  public function getAnswerState(){
    return $this->answerState;
  }
  public function getGallowsState(){
    return $this->gallowState;
  }


  private function success($question,$letter){
    for ($i=0; $i < count($question); $i++) {
      if($question[$i] === $letter ){
        $this->answerState[$i] = $letter;
      }
    }
    if($this->checkClear(implode($question),implode($this->answerState))){
      return "Game Clear";
    }
    return "Continue";
  }

  private function failed(){
    $this->gallowState++;
    if($this->checkOver()){
      return "Game Over";
    }
    return "Continue";
  }


  private function checkClear($question,$answer){
    if($question === $answer){
      return true;
    }
    return false;
  }

  private function checkOver(){
    if($this->gallowState === 6){
      return true;
    }
    return false;
  }
}
