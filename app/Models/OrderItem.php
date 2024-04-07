<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Define the relationship with orders
     */
    public function order()
    {
        return $this->belongsTo(Order::class, "order_id", "id");
    }

    /**
     * Define the relationship with books
     */
    public function book()
    {
        return $this->belongsTo(Book::class, "book_id", "id");
    }
}
