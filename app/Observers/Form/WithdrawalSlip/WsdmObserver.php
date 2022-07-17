<?php

namespace App\Observers\Form\WithdrawalSlip;

use App\Models\Form\WithdrawalSlip\Wsdm;

class WsdmObserver
{
    public $afterCommit = true;

    public function created(Wsdm $wsdm)
    {
        activity()
        ->performedOn($wsdm)
        ->event('created')
        ->withProperties(['Document Series Number' => $wsdm->document_series_no])
        ->log('created direct material withdrawal slip.');
    }

    public function retrieved(Wsdm $wsdm)
    {
        activity()
        ->performedOn($wsdm)
        ->event('view')
        ->withProperties(['Document Series Number' => $wsdm->document_series_no])
        ->log('view direct material withdrawal slip');
    }

    /**
     * Handle the Wsdm "updated" event.
     *
     * @param  \App\Models\Form\WithdrawalSlip\Wsdm  $wsdm
     * @return void
     */
    public function updated(Wsdm $wsdm)
    {
        //
    }

    /**
     * Handle the Wsdm "deleted" event.
     *
     * @param  \App\Models\Form\WithdrawalSlip\Wsdm  $wsdm
     * @return void
     */
    public function deleted(Wsdm $wsdm)
    {
        //
    }

    /**
     * Handle the Wsdm "restored" event.
     *
     * @param  \App\Models\Form\WithdrawalSlip\Wsdm  $wsdm
     * @return void
     */
    public function restored(Wsdm $wsdm)
    {
        //
    }

    /**
     * Handle the Wsdm "force deleted" event.
     *
     * @param  \App\Models\Form\WithdrawalSlip\Wsdm  $wsdm
     * @return void
     */
    public function forceDeleted(Wsdm $wsdm)
    {
        //
    }
}
