<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class OrderItems extends Model
{
    use HasFactory;

    protected $table = 'order_items';
    protected $fillable = [

        'order_id',
        'prod_id',
        'price',
        'qty',

    ];

    /**
     * Get the user that owns the OrderItems
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'prod_id', 'id');
    }
}
