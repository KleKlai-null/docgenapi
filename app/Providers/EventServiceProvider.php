<?php

namespace App\Providers;

use App\Models\Form\Memorandum;
use App\Models\Form\ReturnSlip\ReturnSlip;
use App\Models\Form\ServiceCall;
use App\Models\Form\WithdrawalSlip\Wsdm;
use App\Models\Form\WithdrawalSlip\Wsfa;
use App\Models\Form\WithdrawalSlip\Wsfg;
use App\Models\Form\WithdrawalSlip\Wsma;
use App\Models\Form\WithdrawalSlip\Wsmi;
use App\Models\Form\WithdrawalSlip\Wsmro;
use App\Observers\Form\MemorandumObserver;
use App\Observers\Form\ReturnSlip\ReturnSlipObserver;
use App\Observers\Form\ServiceCallObserver;
use App\Observers\Form\WithdrawalSlip\WsdmObserver;
use App\Observers\Form\WithdrawalSlip\WsfaObserver;
use App\Observers\Form\WithdrawalSlip\WsfgObserver;
use App\Observers\Form\WithdrawalSlip\WsmaObserver;
use App\Observers\Form\WithdrawalSlip\WsmiObserver;
use App\Observers\Form\WithdrawalSlip\WsmroObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Withdrawal Slip Event
         */
        Wsmi::observe(WsmiObserver::class);
        Wsmro::observe(WsmroObserver::class);
        Wsdm::observe(WsdmObserver::class);
        Wsfa::observe(WsfaObserver::class);
        Wsfg::observe(WsfgObserver::class);
        Wsma::observe(WsmaObserver::class);

        /**
         * Return  Slip Event
         */
        ReturnSlip::observe(ReturnSlipObserver::class);

        /**
         * Memorandum
         */
        Memorandum::observe(MemorandumObserver::class);

        /**
         * Service Call
         */
        ServiceCall::observe(ServiceCallObserver::class);

    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
