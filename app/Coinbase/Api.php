<?php
namespace App\Coinbase;
use Coinbase\Wallet\Client;
use Coinbase\Wallet\Configuration;
use Coinbase\Wallet\Resource\Address;
use Coinbase\Wallet\Resource\EthereumNetwork;
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
  public function createAddress($account_id,$label) {
    $account = $this->client->getAccount($account_id);
    $address = new Address(['name' => $label]);
    $wallet = $this->client->createAccountAddress($account, $address);
    return $wallet;
  }
}
