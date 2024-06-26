<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

// CreatingEvents
use App\Events\{    
    Blog\CreatingBlog,     
    Spray\CreatingSpray,
    Fertilization\CreatingFertilization,
    Chemical\CreatingChemical,  
    Fertilizer\CreatingFertilizer,   
    Location\CreatingLocation,  
    Plant\CreatingPlant, 
    Finance\Income\CreatingIncome, 
    Finance\Debit\CreatingDebit, 
    Finance\Expenditure\CreatingExpenditure,
    Finance\Credit\CreatingCredit,
};

// CreatingListeners
use App\Listeners\{    
    Blog\CreateBlog, 
    Spray\CreateSpray,
    Fertilization\CreateFertilization,
    Chemical\CreateChemical, 
    Fertilizer\CreateFertilizer,  
    Location\CreateLocation, 
    Plant\CreatePlant,
    Finance\Income\CreateIncome,
    Finance\Debit\CreateDebit,
    Finance\Expenditure\CreateExpenditure,
    Finance\Credit\CreateCredit,
};

// UpdatingEvents
use App\Events\{
    Blog\UpdatingBlog, 
    Spray\UpdatingSpray,
    Fertilization\UpdatingFertilization,
    Chemical\UpdatingChemical, 
    Fertilizer\UpdatingFertilizer,  
    Location\UpdatingLocation,  
    Plant\UpdatingPlant,
    Finance\Income\UpdatingIncome,
    Finance\Debit\UpdatingDebit,
    Finance\Credit\UpdatingCredit,
    Finance\Expenditure\UpdatingExpenditure,
};

// UpdatingListeners
use App\Listeners\{   
    Blog\UpdateBlog,  
    Spray\UpdateSpray,
    Fertilization\UpdateFertilization,
    Chemical\UpdateChemical, 
    Fertilizer\UpdateFertilizer,
    Location\UpdateLocation,   
    Plant\UpdatePlant, 
    Finance\Income\UpdateIncome, 
    Finance\Expenditure\UpdateExpenditure,
    Finance\Debit\UpdateDebit,
    Finance\Credit\UpdateCredit,
    
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
        CreatingBlog::class => [
            CreateBlog::class,
        ],
      
        CreatingSpray::class => [
            CreateSpray::class,
        ],

        CreatingFertilization::class => [
            CreateFertilization::class,
        ],

        CreatingChemical::class => [
            CreateChemical::class,
        ],

        CreatingFertilizer::class => [
            CreateFertilizer::class,
        ],

        CreatingLocation::class => [
            CreateLocation::class,
        ],

        CreatingPlant::class => [
            CreatePlant::class,
        ],

        CreatingExpenditure::class => [
            CreateExpenditure::class,
        ],

        CreatingIncome::class => [
            CreateIncome::class,
        ],

        CreatingDebit::class => [
            CreateDebit::class,
        ],

        CreatingCredit::class => [
            CreateCredit::class,
        ],



        //Updating
        UpdatingBlog::class => [
            UpdateBlog::class,
        ],

        UpdatingChemical::class => [
            UpdateChemical::class,
        ],

        UpdatingFertilizer::class => [
            UpdateFertilizer::class,
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

        UpdatingDebit::class => [
            UpdateDebit::class,
        ],

        UpdatingCredit::class => [
            UpdateCredit::class,
        ],


        UpdatingSpray::class => [
            UpdateSpray::class,
        ],

        UpdatingFertilization::class => [
            UpdateFertilization::class,
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
