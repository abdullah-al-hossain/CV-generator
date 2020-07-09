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
    // Checks if uesr logged in or not
    public function __construct() {
      $this->middleware('auth');
    }

    // Bidding listing function
    public function index() {
      $auctions = Auction::latest()->get();

      if($auctions == null || $auctions->count() == 0) {
        abort(404);
      }
      return view('bid.index', compact('auctions'));
    }

    // Bidding show
    // Ajax call made
    public function show($uid) {
      $auction = Auction::where('id', $uid)->first();

      if($auction == null) {
        abort(404);
      }

      $bidded = Bidder::where('auction_id', $auction->id)->first();
      return view('bid.show', compact('auction', 'bidded'));
    }

    // Shows new bidder // Done through Ajax call
    public function shownew(Request $request) {
      $auction = Auction::where('id', $request->aid)->first();
      $bidder = Bidder::where('auction_id', $auction->id)->latest()->first();
      if($bidder == null) {
        return 'Nobody bidded for this product';
      }

      return view('partials.bid', compact('bidder'));
    }

    // This function stores the new bidded price // Done through Ajax call
    public function store(Request $request) {

      $end_time = Carbon::parse(Auction::where('id', $request->aid)->first()->bid_end);
      $start_time = Carbon::parse(Auction::where('id', $request->aid)->first()->bid_start);

      if(date('Y-m-d H:i:s') > $end_time)
      {
        date_default_timezone_set('Asia/Dhaka');
        $msg = ["error" => "<span class='h4'>Nice try &#129315; !</span>".date('Y-m-d H:i:s')];
        return json_encode($msg);
      }

      if(date('Y-m-d H:i:s') < $start_time)
      {
        $msg = ["error" => "<span class='h3'>Nice try &#129315; !</span>"];
        return json_encode($msg);
      }
      
      $auction = Auction::findOrFail($request->aid);
      $message = [
        'required' => "You must provide a bidding price!",
      ];

      $request->validate([
        'bidPrice' => 'required'
      ], $message);

      $max = Bidder::where('auction_id', $request->aid)->max('bidding_price');
      if($max == null) {
        $max = -120000;
      }
      if($max >= $request->bidPrice || $auction->product_init_price >= $request->bidPrice) {
        $msg = ["error" => 'Your bidding price is too low'];
        return json_encode($msg);
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
