<?php

namespace App\Models\Form\Item;

use App\Models\Form\WithdrawalSlip\Wsmro;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MroItem extends Model
{
    use HasFactory;

    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    public function wsmro()
    {
        return $this->belongsTo(Wsmro::class);
    }
}
