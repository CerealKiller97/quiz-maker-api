<?php

namespace App\Models;

use \Illuminate\Database\Eloquent\Model;

class Question extends Model
{
  protected $hidden = ['created_at', 'updated_at'];

  public function setQuestionAttribute(string $question)
  {
    $this->attributes['question'] = htmlspecialchars(strip_tags($question));
  }

  public function quiz()
  {
    return $this->belongsTo('\App\Models\Quiz');
  }

  public function answers()
  {
    return $this->hasMany('\App\Models\Answer');
  }
}
