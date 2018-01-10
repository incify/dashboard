<?php
namespace App\Coinbase;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\User;
use Coinbase\Wallet\Client;
use Coinbase\Wallet\Configuration;
use Coinbase\Wallet\Resource\Address;
use Coinbase\Wallet\Resource\BitcoinNetwork;
use Coinbase\Wallet\Resource\BitcoinCashNetwork;
use Coinbase\Wallet\Resource\EthereumNetwork;
use Coinbase\Wallet\Resource\LitecoinNetwork;
class Api {
  public function __construct() {
    $apiKey = env('COINBASE_API_KEY');
    $apiSecret = env('COINBASE_API_SECRET');
    $this->configuration = Configuration::apiKey($apiKey, $apiSecret);
    $this->client = Client::create($this->configuration);
  }
  public function getAccounts() {
    $accounts = $this->client->getAccounts();
    return $accounts;
  }
  public function getAddresses($account_id) {
    $account = $this->client->getAccount($account_id);
    $ad = $this->client->getAccountAddresses($account)[0]->getId();
  }
  public function createAddress($account_type,$order_id) {
    if($account_type == 'BTC') {
      $account_id = env('BTC_WALLET_ID');
    }elseif($account_type == 'ETH') {
      $account_id = env('ETH_WALLET_ID');
    }elseif($account_type == 'BCH') {
      $account_id = env('BCH_WALLET_ID');
    }elseif($account_type == 'LTC') {
      $account_id = env('LTC_WALLET_ID');
    }
    $account = $this->client->getAccount($account_id);
    $address = new Address(['name' => '']);
    $wallet = $this->client->createAccountAddress($account, $address);
    DB::table('wallet_address')->insert(
    ['order_id' => $order_id, 'address_id' => $wallet->getId(), 'address' => $wallet->getAddress()]
    );
  }
}
