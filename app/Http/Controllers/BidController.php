<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auction;
use App\Bidder;

class BidController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
    }

    public function index() {
      return view('bid.index');
    }

    public function show($uid) {
      $auction = Auction::where('id', $uid)->first();
      $bidded = Bidder::where('auction_id', $auction->id)->first();
      return view('bid.show', compact('auction', 'bidded'));

    }

    public function shownew(Request $request) {
      $auction = Auction::where('id', $request->aid)->first();
      $bidder = Bidder::where('auction_id', $auction->id)->latest()->first();
      $user = \App\User::findOrFail($bidder->user_id);


      return view('partials.bid', compact('bidder', 'user'));
    }

    public function store(Request $request) {
      $bid = new Bidder();
      $bid->auction_id = $request->aid;
      $bid->user_id = $request->uid;
      $bid->bidding_price = $request->bidPrice;

      $bid->save();

      return $bid->bidding_price;
    }
}
