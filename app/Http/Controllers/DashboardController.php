<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Helpers\Orders;
use App\Coinbase\Api;
use App\Helpers\Helpers;

class DashboardController extends Controller
{
    public function index(){
      $order_query = new Order;
      $helpers = new Helpers;
      $orders = $order_query->orderBy('id', 'desc')
                ->get();
      foreach ($orders as $order) {
        if($order->status == 'waiting'){
            $helpers->checkTokenbanace($order->id,$order->currency);
        }
      }
      $token_balance = $helpers->getUserToken();
      $data = [
          'token_balance' => $token_balance,
          'orders'         => $orders
      ];
      return view('dashboard')->with($data);
    }
}
