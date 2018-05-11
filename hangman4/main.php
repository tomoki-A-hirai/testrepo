<?php
//require
require_once("AnswerChecker.php");
require_once("GameBoard.php");
require_once("Renderer.php");
//問題文を受け付ける
echo "問題文を入力してください" . PHP_EOL;
$input = trim(fgets(STDIN));
$answerChecker = new AnswerChecker($input);
$gameBoard = new GameBoard(strlen($input));
$renderer = new Renderer();
while (true) {
  //問題文字列を表示
  echo "問題分 = ". implode($gameBoard->getAnswerState()) . PHP_EOL;
  //回答文字を受け付ける
  echo "どんな文字が含まれているでしょうか？" . PHP_EOL;
  $answer = trim(fgets(STDIN));
  //回答を照合し、結果を描画する
  $result = $answerChecker->check($answer,$gameBoard,$renderer);
  $renderer->renderSimple($gameBoard,$result);
  if($result === "Game Clear" || $result === "Game Over"){
    break;
  }
}
