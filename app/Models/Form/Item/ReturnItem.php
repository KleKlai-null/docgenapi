<?php

namespace App\Models\Form\Item;

use App\Models\Form\ReturnSlip\ReturnSlip;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnItem extends Model
{
    use HasFactory;

    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    public function returnslip()
    {
        return $this->belongsTo(ReturnSlip::class);
    }
}
