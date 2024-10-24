<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transactions extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'currency',
        'wallet_id',
        'amount',
        'transaction_hash',
        'created_at',
        'updated_at',
        'deleted_at',
        'type',
        'status',
        'transaction_id',
    ];

    public function wallet() {
        return $this->belongsTo(UserWallet::class, 'wallet_id');
    }
}
