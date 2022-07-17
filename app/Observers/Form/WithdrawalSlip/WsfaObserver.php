<?php

namespace App\Observers\Form\WithdrawalSlip;

use App\Models\Form\WithdrawalSlip\Wsfa;

class WsfaObserver
{
    public $afterCommit = true;
    
    public function created(Wsfa $wsfa)
    {
        activity()
        ->performedOn($wsfa)
        ->event('created')
        ->withProperties(['Document Series Number' => $wsfa->document_series_no])
        ->log('created fixed asset item withdrawal slip.');
    }

    public function retrieved(Wsfa $wsfa)
    {
        activity()
        ->performedOn($wsfa)
        ->event('view')
        ->withProperties(['Document Series Number' => $wsfa->document_series_no])
        ->log('view fixed asset item withdrawal slip.');
    }

    /**
     * Handle the Wsfa "updated" event.
     *
     * @param  \App\Models\Form\WithdrawalSlip\Wsfa  $wsfa
     * @return void
     */
    public function updated(Wsfa $wsfa)
    {
        //
    }

    /**
     * Handle the Wsfa "deleted" event.
     *
     * @param  \App\Models\Form\WithdrawalSlip\Wsfa  $wsfa
     * @return void
     */
    public function deleted(Wsfa $wsfa)
    {
        //
    }

    /**
     * Handle the Wsfa "restored" event.
     *
     * @param  \App\Models\Form\WithdrawalSlip\Wsfa  $wsfa
     * @return void
     */
    public function restored(Wsfa $wsfa)
    {
        //
    }

    /**
     * Handle the Wsfa "force deleted" event.
     *
     * @param  \App\Models\Form\WithdrawalSlip\Wsfa  $wsfa
     * @return void
     */
    public function forceDeleted(Wsfa $wsfa)
    {
        //
    }
}
