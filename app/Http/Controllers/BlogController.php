<?php

namespace App\Http\Controllers;

use File;
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
      $blogDesc = Html2Text::convert($blogs[$i]->content);
      $l = strlen($blogDesc);
      for($j = 100; $j < strlen($blogDesc); $j++) {
          if ($blogDesc[$j] == ' ') {
              $l = $j;
              break;
          }
      }
      $blogs[$i]->description = substr($blogDesc, 0, $l)."...";
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
  public function getDetail($id, $language = '#') {
    $blog = Blog::find($id);
    return view('/admin.blog.edit')->with(['blog' => $blog]);
  }
  public function edit(Request $request) {
    // Update blog
    $detail=$request->input('blog-content');
    $dom = new \domdocument();
    $dom->loadHtml(mb_convert_encoding($detail, 'HTML-ENTITIES', 'UTF-8'));
    $detail = $dom->savehtml();

    $blog = Blog::find($request->input('blog-id'));
    if (Input::hasFile('image')) {
      $file = Input::file('image');
      $file->move('uploads', $file->getClientOriginalName());
      $blog->thumbnailUrl = '/uploads/'. $file->getClientOriginalName();
    }
    $blog->title = $request->input('blog-name');
    $blog->content = $detail;
    $blog->save();
    return redirect('/admin-blog')->with('success', 'Blog updated successfully');
  }
  public function delete($id) {
    $blog = Blog::find($id);
    File::delete(public_path().$blog->thumbnailUrl);
    $blog->delete();
    return redirect('/admin-blog')->with('success', 'Blog deleted successfully');
  }
}
