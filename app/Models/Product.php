<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItems;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [

        'cate_id',
        'name',
        'description',
        'original_price',
        'selling_price',
        'image',
        'qty',
        'status',
        'trending',

    ];

    public function category()
{
    return $this->belongsTo(category::class,'cate_id','id');
}

}

