<?php

namespace App\Models\Form\ReturnSlip;

use App\Models\Form\Item\ReturnItem;
use App\Models\User;
use App\Services\DocumentService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
            $model->user_id = auth()->user()->id;
        });
    }

    /**
     * Relationship
     */

    public function items()
    {
        return $this->hasMany(ReturnItem::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Query Scope
     */
    public function scopeDocumentSeries($query, $series_no)
    {
        return $query->where('document_series_no', $series_no);
    }

    public function scopeGetData($query, $type)
    {
        return $query->with('items')->where('user_id', auth()->user()->id)->where('withdrawal_form', $type)->orderBy('id', 'desc');
    }
}
