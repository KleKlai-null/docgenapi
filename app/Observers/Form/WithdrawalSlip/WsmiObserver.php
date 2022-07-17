<?php

namespace App\Observers\Form\WithdrawalSlip;

use App\Models\Form\WithdrawalSlip\Wsmi;

class WsmiObserver
{
    public $afterCommit = true;

    public function created(Wsmi $wsmi)
    {
        activity()
        ->performedOn($wsmi)
        ->event('created')
        ->withProperties(['Document Series Number' => $wsmi->document_series_no])
        ->log('created merchandise withdrawal slip.');
    }

    public function retrieved(Wsmi $wsmi)
    {
        activity()
        ->performedOn($wsmi)
        ->event('view')
        ->withProperties(['Document Series Number' => $wsmi->document_series_no])
        ->log('view merchandise withdrawal slip.');
    }

    /**
     * Handle the Wsmi "updated" event.
     *
     * @param  \App\Models\Form\Withdrawal\Wsmi  $wsmi
     * @return void
     */
    public function updated(Wsmi $wsmi)
    {
        //
    }

    /**
     * Handle the Wsmi "deleted" event.
     *
     * @param  \App\Models\Form\Withdrawal\Wsmi  $wsmi
     * @return void
     */
    public function deleted(Wsmi $wsmi)
    {
        //
    }

    /**
     * Handle the Wsmi "restored" event.
     *
     * @param  \App\Models\Form\Withdrawal\Wsmi  $wsmi
     * @return void
     */
    public function restored(Wsmi $wsmi)
    {
        //
    }

    /**
     * Handle the Wsmi "force deleted" event.
     *
     * @param  \App\Models\Form\Withdrawal\Wsmi  $wsmi
     * @return void
     */
    public function forceDeleted(Wsmi $wsmi)
    {
        //
    }

}
