<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Bill extends Model
{
    use HasFactory;
    protected $fillable = [
        'amount',
        'contract_id',
        'services',
        'seller_id',
        'customer_id'
    ];
    protected $guarded = [
        'id',
    ];
    public function seller(): HasOne
    {
        return $this->hasOne(Requisite::class);
    }
    public function customer(): HasOne
    {
        return $this->hasOne(Requisite::class);
    }
    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function contract(): BelongsTo
    {
        return $this->belongsTo(Contract::class);
    }
}
