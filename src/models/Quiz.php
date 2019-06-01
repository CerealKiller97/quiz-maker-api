<?php
namespace App\Models;

use \Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
  public $timestamps = false;
  protected $table = 'quizes';

  public function setTitleAttribute($title)
  {
    $this->attributes['title'] = htmlspecialchars(strip_tags($title));
  }

  public function user()
  {
    return $this->belongsTo('\App\Models\User');
  }

  public function questions()
  {
    return $this->hasMany('\App\Models\Question');
  }
}
