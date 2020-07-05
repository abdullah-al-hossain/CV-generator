<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'user_id', 'name', 'details',
    ];

    public function cv() {
      $this->belongsTo(User::class);
    }
}
