<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use App\Product;
use App\ImageProduct;
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
      $productDesc = Html2Text::convert($products[$i]->content);
      $l = strlen($productDesc);
      for($j = 101; $j < strlen($productDesc); $j++) {
          if ($productDesc[$j] == ' ') {
              $l = $j;
              break;
          }
      }
      $products[$i]->description = substr($productDesc, 0, $l)."...";
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

    $count = 0;
    $product = new Product;
    $files = $request->file('gallery');
    if($request->hasFile('gallery')) {
        foreach ($files as $file) {
          $fileName = uniqid().'.'.$file->getClientOriginalExtension();
          $file->move('uploads', $fileName);
          if (!$count) {
            $product->thumbnailUrl = '/uploads/'. $fileName;
          }
          $count++;
        }
    }
    $product->content = $detail;
    $product->title = $request->input('product-name');
    $product->save();
    $count = 0;
    if($request->hasFile('gallery')) {
        foreach ($files as $file) {
           if (!$count) {
            $fileName = uniqid().'.'.$file->getClientOriginalExtension();
            $product->thumbnailUrl = '/uploads/'. $fileName;
          } else {
            $imageProduct = new ImageProduct;
            $imageProduct->product_id = $product->id;
            $fileName = uniqid().'.'.$file->getClientOriginalExtension();
            $imageProduct->link = '/uploads/'. $fileName;
            $imageProduct->save();
          }
          $count++;
        }
    }
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
      $fileName = uniqid().'.'.$file->getClientOriginalExtension();
      $file->move('uploads', $fileName);
      $product->thumbnailUrl = '/uploads/'. $fileName;
    }
    $product->title = $request->input('product-name');
    $product->content = $detail;
    $product->save();
    return redirect('/admin-product')->with('success', 'Product updated successfully');
  }
  public function delete($id) {
    $product = Product::find($id);
    File::delete(public_path().$product->thumbnailUrl);
    $matchThese = [
      'product_id' => $product->id
     ];
    $imageProduct = ImageProduct::where($matchThese)->get();
    for($i = 0; $i < count($imageProduct); $i++) {
      File::delete(public_path().$imageProduct[$i]->link);
      $imageProduct[$i]->delete();
    }
    $product->delete();
    return redirect('/admin-product')->with('success', 'Product deleted successfully');
  }
}
