<?php

namespace App\Services;

use \App\Models\Answer;
use \Illuminate\Database\Query\Builder;
use \App\Contracts\AnswerContract;

class AnswerService implements AnswerContract
{
  protected $table;
  protected $answer;

  public function __construct(Builder $table)
  {
    $this->table = $table;
    $this->answer = new Answer();
  }

  public function read(): object
  {
    return Answer::all();
  }

  public function readById(int $id)
  {
    return Answer::findOrFail($id);
  }

  public function create(array $dto)
  {
    $this->answer->answer = $dto['answer'];
    $this->answer->correct = $dto['correct'];
    $this->answer->question_id = $dto['questionId'];
    $this->answer->save();

    return $this->answer->id;
  }

  public function update(int $id, array $dto)
  {
    $answer = Answer::findOrFail($id);
    $answer->answer = $dto['answer'];
    $answer->correct = $dto['correct'];
    $answer->save();
  }

  public function delete(int $id)
  {
    $answer = Answer::findOrFail($id);
    $answer->delete();
  }

  public function queryQuestion(int $id)
  {
    $answer = Answer::findOrFail($id);
    return $answer->question;
  }
}
