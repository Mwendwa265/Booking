<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
   protected $fillables = [
    'user_id',
    'brand',
    'type',
    'model',
    'price_per_day',
    'number_plate',
    'availability_status',
   ];

   

   
}
