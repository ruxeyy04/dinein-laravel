<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodReserve extends Model
{
    use HasFactory;

    protected $primaryKey = 'resfoodid';
    protected $table = 'foodreserve';
    public $timestamps = true;
    protected $fillable = [
        'food_id',
        'userid',
        'quantity',
        'status',
        'resno',
    ];

    public function food()
    {
        return $this->belongsTo(Food::class, 'food_id');
    }
}
