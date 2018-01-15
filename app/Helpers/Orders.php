<?php
namespace App\Helpers;
use Auth;
use App\Models\Order;
class Orders
{
  public function UpdateOrderStatus() {
    $order_query = new Order;
    $currentUser = Auth::user();
    $orders = $order_query->whereuser_id($currentUser->id)
              ->wherestatus('waitting')
              ->get();
    foreach ($orders as $order) {
      dd($order->status);
    }
  }
}
