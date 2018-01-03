<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $connection = 'mysql';
  protected $primaryKey = 'id';
  protected $table = 'orders';

  protected $fillable = array(
    'user_id',
    'token',
    'currency',
    'sent',
    'received',
    'status'
  );
}
