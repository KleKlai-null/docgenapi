<?php

namespace App\Models\Form\Item;

use App\Models\Form\WithdrawalSlip\Wsma;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaItem extends Model
{
    use HasFactory;

    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    public function wsma()
    {
        return $this->belongsTo(Wsma::class);
    }
}
