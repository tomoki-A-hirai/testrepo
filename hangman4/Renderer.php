<?php


/**
 *
 */
class Renderer
{

  function __construct()
  {

  }

  public function renderSimple(GameBoard $gameBoard,string $stage){
    echo "answerState = " . implode($gameBoard->getAnswerState()) . PHP_EOL . "gallowsState = " .$gameBoard->getGallowsState() . PHP_EOL;
    echo $stage . PHP_EOL;
    echo "_____________________________" . PHP_EOL;
  }
}
