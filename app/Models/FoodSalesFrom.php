<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodSalesFrom extends Model
{
    use HasFactory;

    public function details()
    {
        return $this->hasOne(FoodSalesFromDetails::class, 'food_sales_id');
    }
}
