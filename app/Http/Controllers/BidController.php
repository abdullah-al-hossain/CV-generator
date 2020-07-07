<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auction;
use App\Bidder;
use App\Winner;
use Carbon\Carbon;
use App\User;

class BidController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
    }

    // Bidding listing page
    public function index() {
      $auctions = Auction::all();
      return view('bid.index', compact('auctions'));
    }

    // This shows a single bidding
    // Called from ajax
    public function show($uid) {
      $auction = Auction::where('id', $uid)->first();
      $bidded = Bidder::where('auction_id', $auction->id)->first();
      return view('bid.show', compact('auction', 'bidded'));
    }

    public function shownew(Request $request) {
      $auction = Auction::where('id', $request->aid)->first();
      $bidder = Bidder::where('auction_id', $auction->id)->latest()->first();
      if($bidder == null) {
        return 'Nobody bidded for this product';
      }
      $user = $bidder->user->name;


      return view('partials.bid', compact('bidder', 'user'));
    }

    public function store(Request $request) {
      $end_time = Carbon::parse(Auction::where('id', $request->aid)->first()->bid_end);

      if(date('Y-m-d H:i:s') > $end_time)
      {
        return 'Time\'s up!';
      }
      $bid = new Bidder();
      $bid->auction_id = $request->aid;
      $bid->user_id = $request->uid;
      $bid->bidding_price = $request->bidPrice;

      $bid->save();

      return $bid->bidding_price;
    }

    public function winner(Request $request) {
      $max = Bidder::where('auction_id', $request->aid)->max('bidding_price');
      if($max == null) {
        return "No one bidded";
      }
      $bid = Bidder::where('auction_id', $request->aid)->where('bidding_price', $max)->first();
      $auction = Winner::where('auction_id', $bid->auction_id)->first();
      if ($auction != null) {
        return 'time over. can\'t bid now.';
      }
      $winner = new Winner();
      $winner->bidder_id = $bid->id;
      $winner->auction_id = $bid->auction_id;
      $winner->save();

      return 'success';
    }

    public function show_winner(Request $request) {
      $winner = Winner::where('auction_id', $request->aid)->first();
      if ($winner == null) {
        return 'Nobody Bidded!';
      }
      $winnerName = $winner->bidder->user->name;
      $winnerPrice = $winner->bidder->bidding_price;

      return view('partials.winner', compact('winnerName', 'winnerPrice'));
    }
}
