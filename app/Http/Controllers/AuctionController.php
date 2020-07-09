<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Auction;

class AuctionController extends Controller
{
    // Check if the user is admin or not
    public function __construct() {
      $this->middleware('admin');
    }

    // Display listing
    public function index()
    {
      $auctions = Auction::latest()->paginate(12);
      return view('admin.auctions.index', compact('auctions'));
    }

    // generates 'create new auction form page '
    public function create()
    {
        $products = Product::latest()->get();
        // Checks if there are any products to be in the auction
        if($products == null || $products->count() == 0) {
            return redirect()->route('product.create')->with('prodEmpty', 'Your product table is empty! Add a product to continue . . .');
        }
        return view('admin.auctions.create', compact('products'));
    }

    // Stores the newly created auction
    public function store(Request $request)
    {
      // validates the request send through the form
      $request->validate([
        'price' => 'numeric|required',
        'startdate' => 'string|required',
        'starttime' => 'string|required',
        'enddate' => 'string|required',
        'endtime' => 'string|required',

      ]);

      $auction = new Auction();

      $auction->product_id = $request->prod_id;
      $auction->product_init_price = $request->price;

      // Converted the start time format to standard format
      $start = $request->startdate.' '.$request->starttime;
      $start1 = strtotime($start);
      $start = date('Y-m-d H:i:s', $start1);

      // Converted the end time format to standard format
      $end = $request->enddate.' '.$request->endtime;
      $end1 = strtotime($end);
      $end = date('Y-m-d H:i:s', $end1);

      $auction->bid_start = $start;
      $auction->bid_end = $end;

      $auction->save();

      return redirect()->route('auction.index');
    }

    // Shows a single auction in details with the bidders of that auction in a table
    public function show($id)
    {
        $auction = Auction::findOrFail($id);
        $bidders = $auction->bidders;

        return view('admin.auctions.show', compact('auction', 'bidders'));
    }

    // generates 'Edit auction form page'
    public function edit($id)
    {
        $auction = Auction::findOrFail($id);
        $products = Product::latest()->get();
        // Checks if there are any products to be in the auction
        if($products == null || $products->count() == 0) {
            return redirect()->route('product.create')->with('prodEmpty', 'Your product table is empty! Add a product to continue . . .');
        }

        return view('admin.auctions.edit', compact('auction', 'products'));
    }

    // Update the sent request for a particular auction
    public function update(Request $request, $id)
    {
      // validates the request send through the form
      $request->validate([
        'price' => 'numeric|required',
        'startdate' => 'string|required',
        'starttime' => 'string|required',
        'enddate' => 'string|required',
        'endtime' => 'string|required',

      ]);

      $auction = Auction::findOrFail($id);

      $auction->product_id = $request->prod_id;
      $auction->product_init_price = $request->price;

      // Converted the start time format to standard format
      $start = $request->startdate.' '.$request->starttime;
      $start1 = strtotime($start);
      $start = date('Y-m-d H:i:s', $start1);

      // Converted the end time format to standard format
      $end = $request->enddate.' '.$request->endtime;
      $end1 = strtotime($end);
      $end = date('Y-m-d H:i:s', $end1);

      $auction->bid_start = $start;
      $auction->bid_end = $end;

      $auction->update();

      return redirect()->route('auction.show',['auction' => $id]);
    }

    // Deletes an auction along with the bidders
    public function destroy($id)
    {
        $auction = Auction::findOrFail($id);
        $bidders = $auction->bidders()->delete();
        $auction = Auction::destroy($id);

        return redirect()->route('auction.index');
    }
}
