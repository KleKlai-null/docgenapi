<?php

namespace App\Models\Form\Item;

use App\Models\Form\WithdrawalSlip\Wsmi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MiItem extends Model
{
    use HasFactory;

    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    public function wsmi()
    {
        return $this->belongsTo(Wsmi::class);
    }
}
