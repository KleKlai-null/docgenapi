<?php

namespace App\Models\Form\WithdrawalSlip;

use App\Models\Form\Item\MiItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Wsmi extends Model
{
    use HasFactory;

    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    public function items()
    {
        return $this->hasMany(MiItem::class);
    }

    /**
     * Query Scope
     */
    public function scopeDocumentSeries($query, $series_no)
    {
        return $query->where('document_series_no', $series_no);
    }
}
