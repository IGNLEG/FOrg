<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'amount_paid',
        'bill_id',
        'type'
    ];
    protected $guarded = [
        'id',
    ];

    public function bill(): HasOne
    {
       return $this->hasOne(Payment::class);
    }
}
