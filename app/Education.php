<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'educations';

    protected $fillable = [
        'user_id', 'institution', 'degree', 'grade', 'duration'
    ];

    public function user() {
      $this->belongsTo('User');
    }
}
