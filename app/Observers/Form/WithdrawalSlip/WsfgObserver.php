<?php

namespace App\Observers\Form\WithdrawalSlip;

use App\Models\Form\WithdrawalSlip\Wsfg;

class WsfgObserver
{

    public $afterCommit = true;

    public function created(Wsfg $wsfg)
    {
        activity()
        ->performedOn($wsfg)
        ->event('created')
        ->withProperties(['Document Series Number' => $wsfg->document_series_no])
        ->log('created finished goods withdrawal slip.');
    }

    public function retrieved(Wsfg $wsfg)
    {
        activity()
        ->performedOn($wsfg)
        ->event('view')
        ->withProperties(['Document Series Number' => $wsfg->document_series_no])
        ->log('view finished goods withdrawal slip.');
    }

    /**
     * Handle the Wsfg "updated" event.
     *
     * @param  \App\Models\Form\WithdrawalSlip\Wsfg  $wsfg
     * @return void
     */
    public function updated(Wsfg $wsfg)
    {
        //
    }

    /**
     * Handle the Wsfg "deleted" event.
     *
     * @param  \App\Models\Form\WithdrawalSlip\Wsfg  $wsfg
     * @return void
     */
    public function deleted(Wsfg $wsfg)
    {
        //
    }

    /**
     * Handle the Wsfg "restored" event.
     *
     * @param  \App\Models\Form\WithdrawalSlip\Wsfg  $wsfg
     * @return void
     */
    public function restored(Wsfg $wsfg)
    {
        //
    }

    /**
     * Handle the Wsfg "force deleted" event.
     *
     * @param  \App\Models\Form\WithdrawalSlip\Wsfg  $wsfg
     * @return void
     */
    public function forceDeleted(Wsfg $wsfg)
    {
        //
    }
}
