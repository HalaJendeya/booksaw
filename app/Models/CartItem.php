<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItem extends Model
{
    protected $fillable = [
        'book_id',
        'quantity',
        'session_id',
    ];

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
