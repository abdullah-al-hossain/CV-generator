<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bidder extends Model
{
    public function user() {
      return $this->belongsTo(User::class);
    }

    public function auction() {
      return $this->belongsTo(Auction::class);
    }
}
