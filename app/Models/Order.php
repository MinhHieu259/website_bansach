<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $primaryKey = "id";

    protected $fillable = [
      'user_id',
      'amount',
      'total',
      'dateTimeOrder',
      'shipName',
      'shipAddress',
      'shipCity',
      'shipping_cost',
      'phone_number',
      'email_address',
      'note',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id');
    }

}
