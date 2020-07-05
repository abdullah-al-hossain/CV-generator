<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Cv extends Model
{
    protected $fillable = [
        'user_id', 'name', 'address', 'email', 'mobile', 'image', 'carObj'
    ];

    // Mutators & Accessors
    public function isCreator() {
      if ($this->user_id != null) {
        return $this->user_id ==  Auth::user()->id;
      }

      abort(404);

    }

    public function getNameAttribute($value){
      return ucwords($value);
    }

    public function getCapName(){
      return ucwords($this->name);
    }

    public function getCreationDate(){
      return date_format($this->created_at, env('DATE_FORMAT'));
    }

    public function getFormattedCreatedAtAttribute(){
      return date_format($this->created_at, env('DATE_FORMAT'));
    }

    public function getUpdationDate(){
      $date = $this->updated_at;
      return timeFormat($date);
    }


    // Relationships

    public function user() {
      return $this->belongsTo(User::class);
    }
}
