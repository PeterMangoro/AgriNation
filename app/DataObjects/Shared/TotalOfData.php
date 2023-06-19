<?php
namespace App\DataObjects\Shared;

use App\Models\Spray;
use App\Models\Chemical;
use App\Models\Location;
use App\Actions\Shared\Model\GetCount;
use App\Models\Fertilizer;

class TotalOfData
{

    public function __construct(
        public readonly int $chemicals,
        public readonly int $sprays,
        public readonly int $locations,
        public readonly int $fertilizers
    )
    {
        
    }

    public static function counts()
    {
        return new self (
            GetCount::totalOf(new Chemical()),
            GetCount::totalOf(new Spray()),
            GetCount::totalOf(new Location()),
            GetCount::totalOf(new Fertilizer()),
        );
    }    
}