<?php

namespace App\Services;

use \Illuminate\Database\Query\Builder;
use App\Contracts\QuizContract;
use App\Models\Quiz;

class QuizService implements QuizContract
{
  protected $table;
  protected $quiz;

  public function __construct(Builder $table)
  {
    $this->table = $table;
    $this->quiz = new Quiz();
  }

  public function read(): object
  {
    return Quiz::all();
  }

  public function readById(int $id)
  {
    return Quiz::findOrFail($id);
  }

  public function create(array $dto)
  {
    $this->quiz->title = $dto['title'];
    $this->quiz->user_id = $dto['userId'];
    $this->quiz->save();

    return $this->quiz->id;
  }

  public function update(int $id, array $dto)
  {
    $quiz = Quiz::findOrFail($id);
    $quiz->title = $dto['title'];
    $quiz->save();
  }

  public function delete(int $id)
  {
    $quiz = Quiz::findOrFail($id);
    $quiz->delete($id);
  }

  public function queryUser(int $id)
  {
    $quiz = Quiz::findOrFail($id);
    return $quiz->user;
  }

  public function queryQuestions(int $id)
  {
    $quiz = Quiz::findOrFail($id);
    return $quiz->questions;
  }
}
