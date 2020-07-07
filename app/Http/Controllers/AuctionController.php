<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Auction;

class AuctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $auctions = Auction::latest()->get();

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
        //
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
        //
    }
}
