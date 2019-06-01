<?php

namespace App\Contracts;

interface QuestionContract extends BaseContract
{
  public function queryQuiz(int $id);
  public function queryAnswers(int $id);
}
