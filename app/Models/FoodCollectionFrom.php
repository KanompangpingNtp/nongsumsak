<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodCollectionFrom extends Model
{
    use HasFactory;

    public function details()
    {
        return $this->hasOne(FoodCollectionFromDetails::class, 'food_collection_id');
    }
}
