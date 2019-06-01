<?php

namespace App\Services;

use \App\Contracts\UserContract;
use \App\Models\User;
use \Illuminate\Database\Query\Builder;

class UserService implements UserContract
{
  protected $table;
  protected $user;

  public function __construct(Builder $table)
  {
    $this->table = $table;
    $this->user = new User();
  }

  public function read(): object
  {
    return User::all();
  }

  public function readById(int $id)
  {
    return User::findOrFail($id);
  }

  public function create(array $dto)
  {
    $this->user->first_name = $dto['firstName'];
    $this->user->last_name = $dto['lastName'];
    $this->user->email = $dto['email'];
    $this->user->password = $dto['password'];
    $this->user->save();

    return $this->user->id;
  }

  public function update(int $id, array $dto)
  {
    $user = User::findOrFail($id);
    $user->first_name = $dto['firstName'];
    $user->last_name = $dto['lastName'];
    $user->email = $dto['email'];
    $user->save();
  }

  public function delete(int $id)
  {
    $user = User::findOrFail($id);
    $user->delete();
  }

  public function queryQuizes(int $id)
  {
    $user = User::findOrFail($id);
    return $user->quizes;
  }
}
