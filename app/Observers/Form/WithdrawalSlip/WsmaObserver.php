<?php

namespace App\Observers\Form\WithdrawalSlip;

use App\Models\Form\WithdrawalSlip\Wsma;

class WsmaObserver
{
    public $afterCommit = true;

    public function created(Wsma $wsma)
    {
        activity()
        ->performedOn($wsma)
        ->event('created')
        ->withProperties(['Document Series Number' => $wsma->document_series_no])
        ->log('created minor asset item withdrawal slip.');
    }

    public function retrieved(Wsma $wsma)
    {
        activity()
        ->performedOn($wsma)
        ->event('view')
        ->withProperties(['Document Series Number' => $wsma->document_series_no])
        ->log('view minor asset item withdrawal slip.');
    }

    /**
     * Handle the Wsma "updated" event.
     *
     * @param  \App\Models\Form\WithdrawalSlip\Wsma  $wsma
     * @return void
     */
    public function updated(Wsma $wsma)
    {
        //
    }

    /**
     * Handle the Wsma "deleted" event.
     *
     * @param  \App\Models\Form\WithdrawalSlip\Wsma  $wsma
     * @return void
     */
    public function deleted(Wsma $wsma)
    {
        //
    }

    /**
     * Handle the Wsma "restored" event.
     *
     * @param  \App\Models\Form\WithdrawalSlip\Wsma  $wsma
     * @return void
     */
    public function restored(Wsma $wsma)
    {
        //
    }

    /**
     * Handle the Wsma "force deleted" event.
     *
     * @param  \App\Models\Form\WithdrawalSlip\Wsma  $wsma
     * @return void
     */
    public function forceDeleted(Wsma $wsma)
    {
        //
    }
}
