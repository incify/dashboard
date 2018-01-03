<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Coinbase\Wallet\Client;
use Coinbase\Wallet\Configuration;
use Coinbase\Wallet\Resource\Address;
use Coinbase\Wallet\Resource\EthereumNetwork;
use App\Models\User;
use App\Models\Order;
use App\Coinbase\Api;
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
      $order->user_id = $currentUser->id;
      $order->currency = $request->Currency;
      $order->token = $request->token_quality;
      $order->sent = $request->curency_quality;
      $order->status = 'pending';
      $order->save();
      //$api->createAddress($request->Currency,$order->id);
      return redirect('/token/vieworder/'.$order->id);
    }
    public function ViewOrder($oder_id) {
      $data = [
          'token_name'         => env('TOKEN_NAME'),
          'token_bonus'        => env('TOKEN_BONUS')
      ];
      return view('token/view-order')->with($data);
    }
    public function transaction2() {
      $apiKey = env('COINBASE_API_KEY');
      $apiSecret = env('COINBASE_API_SECRET');
      $account_eth = env('ETH_WALLET_ID');

      $configuration = Configuration::apiKey($apiKey, $apiSecret);
      $client = Client::create($configuration);
      $account = $client->getAccount($account_eth);
      $address = $client->getAccountAddress($account, 'd9bb75bb-c741-5da0-9533-4b6166dd0512');
      $transactions = $client->getAddressTransactions($address);
      dd($transactions[0]->getStatus());
    }
}
