<?php

namespace App\Models\Form\Item;

use App\Models\Form\WithdrawalSlip\Wsfa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaItem extends Model
{
    use HasFactory;

    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    public function wsfa()
    {
        return $this->belongsTo(Wsfa::class);
    }
}
