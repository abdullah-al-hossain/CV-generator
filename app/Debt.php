<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{
    protected $fillable = [
      'query_id',
      'dept_name'
    ];

    public function queri() {
      return $this->belongsTo('Query');
    }
}
