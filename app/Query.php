<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Query extends Model
{

    protected $fillable = [
      'name',
      'email',
      'phone',
      'address',
      'card',
      'zip',
      'gender',
      'price'
    ];


    public function debts() {
      return $this->hasMany(Debt::class);
    }

    public function user() {
      return $this->belongsTo(User::class);
    }
}
