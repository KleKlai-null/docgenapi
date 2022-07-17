<?php

namespace App\Observers\Form\ReturnSlip;

use App\Models\Form\ReturnSlip\ReturnSlip;

class ReturnSlipObserver
{
    public $afterCommit = true;

    public function created(ReturnSlip $returnSlip)
    {
        activity()
        ->performedOn($returnSlip)
        ->event('created')
        ->withProperties(['Document Series Number' => $returnSlip->document_series_no])
        ->log('created return slip.');
    }

    public function retrieved(ReturnSlip $returnSlip)
    {
        activity()
        ->performedOn($returnSlip)
        ->event('view')
        ->withProperties(['Document Series Number' => $returnSlip->document_series_no])
        ->log('view return slip');
    }

    /**
     * Handle the ReturnSlip "updated" event.
     *
     * @param  \App\Models\Form\ReturnSlip\ReturnSlip  $returnSlip
     * @return void
     */
    public function updated(ReturnSlip $returnSlip)
    {
        //
    }

    /**
     * Handle the ReturnSlip "deleted" event.
     *
     * @param  \App\Models\Form\ReturnSlip\ReturnSlip  $returnSlip
     * @return void
     */
    public function deleted(ReturnSlip $returnSlip)
    {
        //
    }

    /**
     * Handle the ReturnSlip "restored" event.
     *
     * @param  \App\Models\Form\ReturnSlip\ReturnSlip  $returnSlip
     * @return void
     */
    public function restored(ReturnSlip $returnSlip)
    {
        //
    }

    /**
     * Handle the ReturnSlip "force deleted" event.
     *
     * @param  \App\Models\Form\ReturnSlip\ReturnSlip  $returnSlip
     * @return void
     */
    public function forceDeleted(ReturnSlip $returnSlip)
    {
        //
    }
}
