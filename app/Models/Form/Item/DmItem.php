<?php

namespace App\Models\Form\Item;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DmItem extends Model
{
    use HasFactory;

    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    public function wsdm()
    {
        return $this->belongsTo(Wsdm::class);
    }
}
