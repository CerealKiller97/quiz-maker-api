<?php

namespace App\Contracts;

interface BaseContract
{
  public function read(): object;
  public function readById(int $id);
  public function create(array $dto);
  public function update(int $id, array $dto);
  public function delete(int $id);
}
