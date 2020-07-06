<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{


  public function product() {
    return $this->belongsTo(Product::class);
  }

  public function user() {
    return $this->belongsTo(User::class);
  }

  public function bidders() {
    return $this->hasMany(Bidder::class);
  }
}
