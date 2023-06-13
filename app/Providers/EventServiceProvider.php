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
    Plant\CreatingPlant, 
    Income\CreatingIncome, 
};

// CreatingListeners
use App\Listeners\{    
    Expenditure\CreateExpenditure,
    Spray\CreateSpray,
    Chemical\CreateChemical,  
    Location\CreateLocation, 
    Plant\CreatePlant,
    Income\CreateIncome,
};

// UpdatingEvents
use App\Events\{    
    Expenditure\UpdatingExpenditure,
    Spray\UpdatingSpray,
    Chemical\UpdatingChemical,  
    Location\UpdatingLocation,  
    Plant\UpdatingPlant,
    Income\UpdatingIncome,
};

// UpdatingListeners
use App\Listeners\{    
    Expenditure\UpdateExpenditure,
    Spray\UpdateSpray,
    Chemical\UpdateChemical, 
    Location\UpdateLocation,   
    Plant\UpdatePlant, 
    Income\UpdateIncome, 
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

        CreatingPlant::class => [
            CreatePlant::class,
        ],

        CreatingIncome::class => [
            CreateIncome::class,
        ],

        //Updating
        UpdatingChemical::class => [
            UpdateChemical::class,
        ],

        UpdatingLocation::class => [
            UpdateLocation::class,
        ],

        UpdatingPlant::class => [
            UpdatePlant::class,
        ],

        UpdatingIncome::class => [
            UpdateIncome::class,
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
