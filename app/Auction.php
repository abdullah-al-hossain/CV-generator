<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Auction extends Model
{
  use SoftDeletes;

  public function product() {
    return $this->belongsTo(Product::class);
  }

  public function user() {
    return $this->belongsTo(User::class);
  }

  public function bidders() {
    return $this->hasMany(Bidder::class);
  }

  public function winner() {
    return $this->hasOne(Winner::class);
  }

  public function auctionStartDate()
  {
    return Carbon::parse($this->bid_start)->diffForHumans(); // Parse korte vule gesilam onk jhamela hysilo. Always Parse dates before using methods
  }

  public function auctionEndDate()
  {
    return Carbon::parse($this->bid_end)->diffForHumans(); // Parse korte vule gesilam onk jhamela hysilo. Always Parse dates before using methods
  }
}
