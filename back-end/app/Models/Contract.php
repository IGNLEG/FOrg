<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contract extends Model
{
    use HasFactory;
    protected $fillable = [
        'sign_date',
        'sign_place',
        'customer',
        'signee',
        'price',
        'tax',
        'advance_payment_sum'
    ];
    protected $guarded = [
        'id'
    ];

    public function bills(): HasMany
    {
        return  $this->hasMany(Bill::class);
    }
}
