<?php

namespace App\Models\Form\ReturnSlip;

use App\Models\Form\Item\ReturnItem;
use App\Services\DocumentService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnSlip extends Model
{
    use HasFactory;

    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    protected static function boot()
    {
        parent::boot();

        ReturnSlip::creating(function($model) {
            $model->document_series_no = DocumentService::GenerateSeriesNo('GFI', 'RS');
        });
    }

    public function items()
    {
        return $this->hasMany(ReturnItem::class);
    }

    /**
     * Query Scope
     */
    public function scopeDocumentSeries($query, $series_no)
    {
        return $query->where('document_series_no', $series_no);
    }
}
