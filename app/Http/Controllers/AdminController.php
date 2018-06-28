<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class AdminController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
  }

  public function index() {
    return view('admin.index');
  }
  public function listOrder() {
    $orders = Order::all();
    return view('admin.order.index')->with(['orders' => $orders]);
  }
}
