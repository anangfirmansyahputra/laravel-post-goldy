<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        "fragrance_id",
        "type",
        "stock",
        "branch_id",
        "product_id",
    ];

    public function fragrance(): BelongsTo
    {
        return $this->belongsTo(Fragrance::class, );
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class, );
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, );
    }
}
