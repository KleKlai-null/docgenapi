<?php

namespace App\Models\Form\WithdrawalSlip;

use App\Models\Form\Item\FaItem;
use App\Services\DocumentService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wsfa extends Model
{
    use HasFactory;

    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    protected static function boot()
    {
        parent::boot();

        Wsfa::creating(function($model) {
            $model->document_series_no = DocumentService::GenerateSeriesNo('GFI', 'FA');
        });
    }

    public function items()
    {
        return $this->hasMany(FaItem::class);
    }

    /**
     * Query Scope
     */
    public function scopeDocumentSeries($query, $series_no)
    {
        return $query->where('document_series_no', $series_no);
    }
}
