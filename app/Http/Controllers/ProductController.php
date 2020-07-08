<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Auction;

class ProductController extends Controller
{
    public function __construct() {
      $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->get();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
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
          'name' => 'string|required',
          'category' => 'string|required',
          'description' => 'string|required',
          'image' => 'image|required'
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->category = $request->category;
        $product->description = $request->description;

        if (isset($request->image)) {
          $image_name = time().'.'.$request->image->extension();
          $request->image->move(public_path('images/products'), $image_name);
        } else {
          return redirect()->route('admin.product.create')->with('status', 'Image field is empty. You have to provide an image.');
        }

        $product->image = $image_name;

        $product->save();

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.products.edit', compact('product'));
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

        $request->validate([
          'name' => ['required', 'string'],
          'category' => ['required', 'string'],
          'description' => ['required', 'string'],
          'image' => 'image'
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->category = $request->category;
        $product->description = $request->description;

        if (isset($request->image)) {
          $prodImage = public_path("images/products/".$request->existingImage); // get previous image from folder
          if (File::exists($prodImage)) { // unlink or remove previous image from folder
              unlink($prodImage);
          }
          $image_name = time().'.'.$request->image->extension();
          $request->image->move(public_path('images'), $image_name);
        } else {
          $image_name = $request->existingImage;
        }

        $product->image = $image_name;

        $product->update();

        return redirect()->route('product.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prod = Product::findOrFail($id);
        $auctions = $prod->auctions;

        if ($auctions != null || $auctions->count() > 0) {
          foreach ($auctions as $auction) {
            Auction::destroy($auction->id);
          }
        }

        $prod = Product::destroy($id);
        if ($prod) {
          return redirect()->route('product.index');
        }

        return 'failed';
    }
}
