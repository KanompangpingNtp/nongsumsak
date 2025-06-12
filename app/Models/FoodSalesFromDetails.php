<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodSalesFromDetails extends Model
{
    use HasFactory;

    public function foodsales()
    {
        return $this->belongsTo(FoodSalesFrom::class, 'food_sales_id');
    }
}
