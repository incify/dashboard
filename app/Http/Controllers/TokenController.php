<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Coinbase\Wallet\Client;
use Coinbase\Wallet\Configuration;
use Coinbase\Wallet\Resource\Address;
use App\Models\User;
use Auth;

class TokenController extends Controller
{
    public function buy() {
      $token_name = env('TOKEN_NAME');
      $apiKey = env('COINBASE_API_KEY');
      $apiSecret = env('COINBASE_API_SECRET');

      $account_btc = env('BTC_WALLET_ID');
      $account_eth = env('ETH_WALLET_ID');
      $account_ltc = env('LTC_WALLET_ID');
      $account_bch = env('BCH_WALLET_ID');

      $currentUser = Auth::user();
      $user = User::find($currentUser->id);
      if($currentUser->btc_wallet == NULL) {
        $user->btc_wallet = $this->create_address($apiKey, $apiSecret, $account_btc);
        $user->save();
      }
      if($currentUser->eth_wallet == NULL) {
        $user->eth_wallet = $this->create_address($apiKey, $apiSecret, $account_eth);
        $user->save();
      }
      if($currentUser->ltc_wallet == NULL) {
        $user->ltc_wallet = $this->create_address($apiKey, $apiSecret, $account_ltc);
        $user->save();
      }
      if($currentUser->bch_wallet == NULL) {
        $user->bch_wallet = $this->create_address($apiKey, $apiSecret, $account_bch);
        $user->save();
      }
      $data = [
          'token_name'         => $token_name,
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
    public function create_address($apiKey, $apiSecret, $id) {
      $configuration = Configuration::apiKey($apiKey, $apiSecret);
      $client = Client::create($configuration);
      $account = $client->getAccount($id);
      $currentUser = Auth::user();
      $username = $currentUser->name;
      $address = new Address(['name' => $username]);
      $wallet = $client->createAccountAddress($account, $address)->getAddress();
      return $wallet;
    }
}
