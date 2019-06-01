<?php

namespace App\Services;

use \App\Contracts\QuestionContract;
use \App\Models\Question;
use \Illuminate\Database\Query\Builder;

class QuestionService implements QuestionContract
{
  protected $table;
  protected $question;

  public function __construct(Builder $table)
  {
    $this->table = $table;
    $this->question = new Question();
  }

  public function read(): object
  {
    return Question::all();
  }

  public function readById(int $id)
  {
    return Question::findOrFail($id);
  }

  public function create(array $dto)
  {
    $this->question->question = $dto['question'];
    $this->question->quiz_id = $dto['quizId'];
    $this->question->save();

    return $this->question->id;
  }

  public function update(int $id, array $dto)
  {
    $question = Question::findOrFail($id);
    $question->question = $dto['question'];
    $question->save();
  }

  public function delete(int $id)
  {
    $question = Question::findOrFail($id);
    $question->delete();
  }

  public function queryQuiz(int $id)
  {
    $question = Question::findOrFail($id);
    return $question->quiz;
  }

  public function queryAnswers(int $id)
  {
    $question = Question::findOrFail($id);
    return $question->answers;
  }
}
