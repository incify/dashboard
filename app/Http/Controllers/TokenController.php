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
      return view('token/buy-token');
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
