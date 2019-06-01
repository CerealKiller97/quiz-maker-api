<?php

namespace App\Contracts;

interface UserContract extends BaseContract
{
  public function queryQuizes(int $id);
}
