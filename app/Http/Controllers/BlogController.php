<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Helpers\Html2Text;
use Illuminate\Support\Facades\Input as Input;

class BlogController extends Controller
{
  public function __construct() {
      $this->middleware('auth');
  }
  public function index() {
    $blogs = Blog::all();
    for($i = 0; $i < count($blogs); $i++) {
      $blogs[$i]->description = substr(Html2Text::convert($blogs[$i]->content), 0, min(strlen(Html2Text::convert($blogs[$i]->content)), 100));
    }
    return view('admin.blog.index')->with(['blogs' => $blogs]);
  }
  public function viewUpload() {
    return view('admin.blog.upload');
  }
  public function upload(Request $request) {
    $detail=$request->input('blog-content');
    $dom = new \domdocument();
    $dom->loadHtml(mb_convert_encoding($detail, 'HTML-ENTITIES', 'UTF-8'));
    $detail = $dom->savehtml();

    $blog = new Blog;
    if (Input::hasFile('image')) {
      $file = Input::file('image');
      $file->move('uploads', $file->getClientOriginalName());
      $blog->thumbnailUrl = '/uploads/'. $file->getClientOriginalName();
    }
    $blog->content = $detail;
    $blog->title = $request->input('blog-name');
    $blog->save();
    return redirect('/admin-blog')->with('success', 'Post uploaded successfully');
  }
}
