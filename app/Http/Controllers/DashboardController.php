<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Helpers\Orders;

class DashboardController extends Controller
{
    public function index(){
      $order_query = new Order;
      $orders = $order_query->orderBy('id', 'desc')
                ->limit(10)
                ->get();
      $data = [
          'orders'         => $orders
      ];
      return view('dashboard')->with($data);
    }
}
