<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Helpers\Html2Text;
use Illuminate\Support\Facades\Input as Input;

class ProductController extends Controller
{
  public function __construct() {
      $this->middleware('auth');
  }
  public function index() {
    $products = Product::all();
    for($i = 0; $i < count($products); $i++) {
      $products[$i]->description = substr(Html2Text::convert($products[$i]->content), 0, min(strlen(Html2Text::convert($products[$i]->content)), 100));
    }
    return view('admin.product.index')->with(["products" => $products]);
  }
  public function viewUpload() {
    return view('admin.product.upload');
  }
  public function upload(Request $request) {
    $detail=$request->input('product-content');
    $dom = new \domdocument();
    $dom->loadHtml(mb_convert_encoding($detail, 'HTML-ENTITIES', 'UTF-8'));
    $detail = $dom->savehtml();

    $product = new Product;
    if (Input::hasFile('image')) {
      $file = Input::file('image');
      $file->move('uploads', $file->getClientOriginalName());
      $product->thumbnailUrl = '/uploads/'. $file->getClientOriginalName();
    }
    $product->content = $detail;
    $product->title = $request->input('product-name');
    $product->save();
    return redirect('/admin-product')->with('success', 'Post uploaded successfully');
  }
  public function getDetail($id, $language = '#') {
    $product = Product::find($id);
    return view('/admin.product.edit')->with(['product' => $product]);
  }
  public function edit(Request $request) {
    // Update product
    $detail=$request->input('product-content');
    $dom = new \domdocument();
    $dom->loadHtml(mb_convert_encoding($detail, 'HTML-ENTITIES', 'UTF-8'));
    $detail = $dom->savehtml();

    $product = Product::find($request->input('product-id'));
    if (Input::hasFile('image')) {
      $file = Input::file('image');
      $file->move('uploads', $file->getClientOriginalName());
      $product->thumbnailUrl = '/uploads/'. $file->getClientOriginalName();
    }
    $product->title = $request->input('product-name');
    $product->content = $detail;
    $product->save();
    return redirect('/admin-product')->with('success', 'Product updated successfully');
  }
}
