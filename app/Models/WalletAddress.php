<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WalletAddress extends Model
{
  protected $connection = 'mysql';
  protected $primaryKey = 'id';
  protected $table = 'wallet_address';

  protected $fillable = array(
    'order_id',
    'address_id',
    'address'
  );
}
