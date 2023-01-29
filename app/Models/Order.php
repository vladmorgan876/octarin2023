<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'username',
        'email',
        'phone',
        'whatsapp',
        'viber',
        'telegram',
        'productname',
        'productprice',
        'productquantity',
        'totalsum',
        'orderdate',
        'category',
        'status',
        'ordercompleted',
        'textuser'
    ];
}
