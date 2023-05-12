<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

// CreatingEvents
use App\Events\{    
    Expenditure\CreatingExpenditure,
    Spray\CreatingSpray,
    Chemical\CreatingChemical,
   
};

// CreatingListeners
use App\Listeners\{    
    Expenditure\CreateExpenditure,
    Spray\CreateSpray,
    Chemical\CreateChemical,
   
};

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

        //Creating
        CreatingExpenditure::class => [
            CreateExpenditure::class,
        ],

        CreatingSpray::class => [
            CreateSpray::class,
        ],

        CreatingChemical::class => [
            CreateChemical::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
