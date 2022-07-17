<?php

namespace App\Observers\Form\WithdrawalSlip;

use App\Models\Form\WithdrawalSlip\Wsmro;

class WsmroObserver
{
    public $afterCommit = true;
    
    public function created(Wsmro $wsmro)
    {
        activity()
        ->performedOn($wsmro)
        ->event('created')
        ->withProperties(['Document Series Number' => $wsmro->document_series_no])
        ->log('created maintence, repairs, operations withdrawal slip.');
    }

    public function retrieved(Wsmro $wsmro)
    {
        activity()
        ->performedOn($wsmro)
        ->event('view')
        ->withProperties(['Document Series Number' => $wsmro->document_series_no])
        ->log('view maintence, repairs, operations withdrawal slip.');
    }

    /**
     * Handle the Wsmro "updated" event.
     *
     * @param  \App\Models\Form\WithdrawalSlip\Wsmro  $wsmro
     * @return void
     */
    public function updated(Wsmro $wsmro)
    {
        //
    }

    /**
     * Handle the Wsmro "deleted" event.
     *
     * @param  \App\Models\Form\WithdrawalSlip\Wsmro  $wsmro
     * @return void
     */
    public function deleted(Wsmro $wsmro)
    {
        //
    }

    /**
     * Handle the Wsmro "restored" event.
     *
     * @param  \App\Models\Form\WithdrawalSlip\Wsmro  $wsmro
     * @return void
     */
    public function restored(Wsmro $wsmro)
    {
        //
    }

    /**
     * Handle the Wsmro "force deleted" event.
     *
     * @param  \App\Models\Form\WithdrawalSlip\Wsmro  $wsmro
     * @return void
     */
    public function forceDeleted(Wsmro $wsmro)
    {
        //
    }
}
