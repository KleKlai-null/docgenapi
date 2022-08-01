<?php

namespace App\Models\Form;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Services\DocumentService;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Memorandum extends Model
{
    use HasFactory;

    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    protected static function boot()
    {
        parent::boot();

        Memorandum::creating(function($model) {
            $model->document_series_no = DocumentService::GenerateSeriesNo('GFI', 'MR');
            $model->user_id = auth()->user()->id;
        });
    }

    /**
     * Relationship
     */

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

    public function scopeGetData($query)
    {
        return $query->with('items')->where('user_id', auth()->user()->id)->orderBy('id', 'desc');
    }
}
