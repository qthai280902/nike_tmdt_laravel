<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MarketplaceListing extends Model
{
    use HasUuids;

    protected $fillable = [
        'user_id',
        'product_id',
        'name',
        'description',
        'price',
        'condition_rating',
        'status',
    ];

    /**
     * Get the user that owns the listing.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the original product catalog reference if exists.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
