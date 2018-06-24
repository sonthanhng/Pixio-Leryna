<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Blog;
use App\Helpers\Html2Text;

class HomepageUIController extends Controller
{
    public function index() {
      $products = Product::paginate(6);
      $blogs = Blog::paginate(3);
      for($i = 0; $i < count($blogs); $i++) {
        $blogs[$i]->description = substr(Html2Text::convert($blogs[$i]->content), 0, min(strlen(Html2Text::convert($blogs[$i]->content)), 100));
      }
      return view('UI.index')->with(["products" => $products, "blogs" => $blogs]);
    }
    public function getProductPage() {
      $products = Product::all();
      return view('UI.product')->with(["products" => $products]);
    }
    public function getBlogPage() {
      $blogs = Blog::all();
      for($i = 0; $i < count($blogs); $i++) {
        $blogs[$i]->description = substr(Html2Text::convert($blogs[$i]->content), 0, min(strlen(Html2Text::convert($blogs[$i]->content)), 100));
      }
      return view('UI.blog')->with(["blogs" => $blogs]);
    }
}
