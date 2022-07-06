<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DebitTransaction extends Model
{
    use HasFactory;
    protected $guarded=[];
    /**
     * Get the account that owns the DebitTransaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function account()
    {
        return $this->belongsTo(DebitAccount::class, 'account_id');
    }
}
