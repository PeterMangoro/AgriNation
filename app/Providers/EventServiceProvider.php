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
    Location\CreatingLocation,   
};

// CreatingListeners
use App\Listeners\{    
    Expenditure\CreateExpenditure,
    Spray\CreateSpray,
    Chemical\CreateChemical,  
    Location\CreateLocation, 
};

// UpdatingEvents
use App\Events\{    
    Expenditure\UpdatingExpenditure,
    Spray\UpdatingSpray,
    Chemical\UpdatingChemical,  
    Location\UpdatingLocation,  
};

// UpdatingListeners
use App\Listeners\{    
    Expenditure\UpdateExpenditure,
    Spray\UpdateSpray,
    Chemical\UpdateChemical, 
    Location\UpdateLocation,   
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

        CreatingLocation::class => [
            CreateLocation::class,
        ],

        //Updating
        UpdatingChemical::class => [
            UpdateChemical::class,
        ],

        UpdatingLocation::class => [
            UpdateLocation::class,
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
