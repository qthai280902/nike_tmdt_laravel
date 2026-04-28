<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class MarketplaceListing extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'user_id',
        'product_variant_id',
        'asking_price',
        'condition',
        'seller_description',
        'status',
    ];

    /**
     * Scope a query to only include active listings.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Get the user that owns the listing.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the specific product variant being sold.
     */
    public function variant(): BelongsTo
    {
        return $this->belongsTo(ProductVariant::class, 'product_variant_id');
    }

    /**
     * Accessor for condition label.
     */
    public function getConditionLabelAttribute(): string
    {
        return match ($this->condition) {
            'new_with_box' => 'Mới (Nguyên hộp)',
            'like_new' => 'Như mới',
            'good' => 'Tốt',
            'fair' => 'Cũ',
            default => 'Không xác định',
        };
    }
}
