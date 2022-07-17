<?php

namespace App\Observers\Form;

use App\Models\Form\Memorandum;

class MemorandumObserver
{
    public $afterCommit = true;
    
    public function created(Memorandum $memorandum)
    {
        activity()
        ->performedOn($memorandum)
        ->event('created')
        ->withProperties(['Document Series Number' => $memorandum->document_series_no])
        ->log('created memorandum.');
    }

    public function retrieved(Memorandum $memorandum)
    {
        activity()
        ->performedOn($memorandum)
        ->event('view')
        ->withProperties(['Document Series Number' => $memorandum->document_series_no])
        ->log('view memorandum.');
    }

    /**
     * Handle the Memorandum "updated" event.
     *
     * @param  \App\Models\Form\Memorandum  $memorandum
     * @return void
     */
    public function updated(Memorandum $memorandum)
    {
        //
    }

    /**
     * Handle the Memorandum "deleted" event.
     *
     * @param  \App\Models\Form\Memorandum  $memorandum
     * @return void
     */
    public function deleted(Memorandum $memorandum)
    {
        //
    }

    /**
     * Handle the Memorandum "restored" event.
     *
     * @param  \App\Models\Form\Memorandum  $memorandum
     * @return void
     */
    public function restored(Memorandum $memorandum)
    {
        //
    }

    /**
     * Handle the Memorandum "force deleted" event.
     *
     * @param  \App\Models\Form\Memorandum  $memorandum
     * @return void
     */
    public function forceDeleted(Memorandum $memorandum)
    {
        //
    }
}
