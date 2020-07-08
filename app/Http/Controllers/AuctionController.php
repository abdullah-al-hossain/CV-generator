<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Auction;

class AuctionController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $auctions = Auction::latest()->paginate(15);
      // dd($auctions[0]->product->name);
      return view('admin.auctions.index', compact('auctions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::latest()->get();
        // dd(empty($products));
        if($products == null || $products->count() == 0) {
            return redirect()->route('product.create')->with('prodEmpty', 'Your product table is empty! Add a product to continue . . .');
        }
        return view('admin.auctions.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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

      // Converted the start time format
      $start = $request->startdate.' '.$request->starttime;
      $start1 = strtotime($start);
      $start = date('Y-m-d H:i:s', $start1);

      // Converted the end time format
      $end = $request->enddate.' '.$request->endtime;
      $end1 = strtotime($end);
      $end = date('Y-m-d H:i:s', $end1);

      $auction->bid_start = $start;
      $auction->bid_end = $end;

      $auction->save();

      return redirect()->route('auction.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $auction = Auction::findOrFail($id);
        $bidders = $auction->bidders;

        return view('admin.auctions.show', compact('auction', 'bidders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $auction = Auction::findOrFail($id);
        $bidders = $auction->bidders()->delete();
        $auction = Auction::destroy($id);

        return redirect()->route('auction.index');
    }
}
