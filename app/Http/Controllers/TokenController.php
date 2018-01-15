<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Coinbase\Wallet\Client;
use Coinbase\Wallet\Configuration;
use Coinbase\Wallet\Resource\Address;
use Coinbase\Wallet\Resource\BitcoinNetwork;
use Coinbase\Wallet\Resource\BitcoinCashNetwork;
use Coinbase\Wallet\Resource\EthereumNetwork;
use Coinbase\Wallet\Resource\LitecoinNetwork;
use App\Models\User;
use App\Models\Order;
use App\Models\WalletAddress;
use App\Coinbase\Api;
use Carbon\Carbon;
use App\Helpers\Helpers;
use Auth;

class TokenController extends Controller
{
    public function buy() {
      $data = [
          'token_name'         => env('TOKEN_NAME'),
          'token_bonus'        => env('TOKEN_BONUS')
      ];
      return view('token/buy-token')->with($data);
    }
    public function calc(Request $request) {
        $curency_value = "";
        $token_value = "";
        if( $request->Currency == 'BTC') {
          if($request->token_quality == ''){
            $token_value = $request->curency_quality * env('TOKEN_BTC');
          }else {
            $token_value =  $request->token_quality;
          }
          if($request->curency_quality == '') {
            $curency_value = $request->token_quality / env('TOKEN_BTC');
          }else {
            $curency_value = $request->curency_quality;
          }
        }elseif($request->Currency == 'ETH') {
            if($request->token_quality == ''){
              $token_value = $request->curency_quality * env('TOKEN_ETH');
            }else {
              $token_value = $request->token_quality;
            }
            if($request->curency_quality == '') {
              $curency_value = $request->token_quality / env('TOKEN_ETH');
            }else{
              $curency_value = $request->curency_quality;
            }
        }elseif($request->Currency == 'LTC') {
            if($request->token_quality == ''){
              $token_value = $request->curency_quality * env('TOKEN_LTC');
            }else {
              $token_value = $request->token_quality;
            }
            if($request->curency_quality == '') {
              $curency_value = $request->token_quality / env('TOKEN_LTC');
            }else{
              $curency_value = $request->curency_quality;
            }
        }elseif($request->Currency == 'BCH') {
            if($request->token_quality == ''){
              $token_value = $request->curency_quality * env('TOKEN_BCH');
            }else{
              $token_value = $request->token_quality;
            }
            if($request->curency_quality == '') {
              $curency_value = $request->token_quality / env('TOKEN_BCH');
            }else {
              $curency_value = $request->curency_quality;
            }
        }
        $token_bonus = $token_value*(env('TOKEN_BONUS')/100);
        $total_token = $token_value + $token_bonus;
        $arrayName = array(
          'curency_quality' => $curency_value,
          'token_quality' => $token_value,
          'token_bonus'   => $token_bonus,
          'total_token'   => $total_token
       );
        return Response($arrayName);
    }
    public function StoreOrder(Request $request) {
      $order = new Order;
      $api = new Api;
      $currentUser = Auth::user();
      $now = Carbon::now();
      $token_bonus = $request->token_quality*(env('TOKEN_BONUS')/100);

      $order->user_id = $currentUser->id;
      $order->currency = $request->Currency;
      $order->token = $request->token_quality + $token_bonus;
      $order->sent = $request->curency_quality;
      $order->status = 'waiting';
      $order->expires_on = $now->addHour();
      $order->save();
      $api->createAddress($request->Currency,$order->id);
      return redirect('/token/vieworder/'.$order->id);
    }
    public function ViewOrder($oder_id) {
      $currentUser = Auth::user();
      try {
          $order = $this->getOrderById($oder_id);
          $address = $this->getWalletAddressByOrderId($oder_id);
      } catch (ModelNotFoundException $exception) {
          abort(404);
      }
      $data = [
          'token_name'         => env('TOKEN_NAME'),
          'order_id'        => $order->id,
          'order_status'        => $order->status,
          'currency'        => $order->currency,
          'sent'        =>  number_format($order->sent, 6),
          'address'        => $address->address,
          'sent_token'        => $address->sent_token
      ];
      if($order->user_id == $currentUser->id) {
          return view('token/view-order')->with($data);
      }else {
        abort(404);
      }
    }
    public function ViewPaidInvoice($order_id) {
      $order = $this->getOrderById($order_id);
      $currentUser = Auth::user();
      if($order->user_id == $currentUser->id && $order->status =='completed') {
        $data = [
            'token_name'         => env('TOKEN_NAME'),
            'order'         => $order
        ];
        return view('token/view-paid-invoice')->with($data);
      }else{
        abort(404);
      }
    }
    public function ViewPaidInvoiceDetail($order_id) {
      $order = $this->getOrderById($order_id);
      $currentUser = Auth::user();
      if($order->user_id == $currentUser->id && $order->status =='completed') {
        $data = [
            'token_name'         => env('TOKEN_NAME'),
            'order'         => $order
        ];
        return view('token/view-paid-invoice-detail')->with($data);
      }else{
        abort(404);
      }
    }
    public function getOrderById($id)
    {
        $order = new Order;
        return $order->whereid($id)->firstOrFail();
    }
    public function getWalletAddressByOrderId($id)
    {
        $address = new WalletAddress;
        return $address->whereorder_id($id)->first();
    }
    public function UpdateOrder(Request $request) {
      $api = new Api;
      $helpers = new Helpers;
      $transaction = $helpers->checkTokenbanace($request->order_id,$request->account_type);
      if($transaction) {
        $status = $transaction->getStatus();
      }else {
        $status = 'waiting';
      }
      $arrayName = array('status' => $status);
      return Response($arrayName);
    }
}
