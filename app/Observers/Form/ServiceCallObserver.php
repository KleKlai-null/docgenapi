<?php

namespace App\Observers\Form;

use App\Models\Form\ServiceCall;

class ServiceCallObserver
{
    public $afterCommit = true;
    
    public function created(ServiceCall $serviceCall)
    {
        activity()
        ->performedOn($serviceCall)
        ->event('created')
        ->withProperties(['Document Series Number' => $serviceCall->document_series_no])
        ->log('created service call slip.');
    }

    public function retrieved(ServiceCall $serviceCall)
    {
        activity()
        ->performedOn($serviceCall)
        ->event('view')
        ->withProperties(['Document Series Number' => $serviceCall->document_series_no])
        ->log('view service call slip.');
    }

    /**
     * Handle the ServiceCall "updated" event.
     *
     * @param  \App\Models\Form\ServiceCall  $serviceCall
     * @return void
     */
    public function updated(ServiceCall $serviceCall)
    {
        //
    }

    /**
     * Handle the ServiceCall "deleted" event.
     *
     * @param  \App\Models\Form\ServiceCall  $serviceCall
     * @return void
     */
    public function deleted(ServiceCall $serviceCall)
    {
        //
    }

    /**
     * Handle the ServiceCall "restored" event.
     *
     * @param  \App\Models\Form\ServiceCall  $serviceCall
     * @return void
     */
    public function restored(ServiceCall $serviceCall)
    {
        //
    }

    /**
     * Handle the ServiceCall "force deleted" event.
     *
     * @param  \App\Models\Form\ServiceCall  $serviceCall
     * @return void
     */
    public function forceDeleted(ServiceCall $serviceCall)
    {
        //
    }
}
