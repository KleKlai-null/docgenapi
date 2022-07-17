<?php

namespace App\Models\Form\Item;

use App\Models\Form\WithdrawalSlip\Wsfg;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FgItem extends Model
{
    use HasFactory;

    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    public function wsfg()
    {
        return $this->belongsTo(Wsfg::class);
    }
}
