<?php

namespace App\Contracts;

interface QuizContract extends BaseContract
{
  public function queryUser(int $id);
  public function queryQuestions(int $id);
}
