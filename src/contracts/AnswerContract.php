<?php

namespace App\Contracts;

interface AnswerContract extends BaseContract
{
  public function queryQuestion(int $id);
}
