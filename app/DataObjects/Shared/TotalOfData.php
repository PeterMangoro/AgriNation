<?php

namespace App\DataObjects\Shared;

use App\Models\Spray\Spray;
use App\Models\Spray\Chemical;
use App\Models\Garden\Location;
use App\Models\Fertilizer\Fertilizer;
use App\Actions\Shared\Model\GetCount;
use App\Models\Fertilizer\Fertilization;

class TotalOfData
{

    public function __construct(
        public readonly int $chemicals,
        public readonly int $sprays,
        public readonly int $locations,
        public readonly int $fertilizers,
        public readonly int $fertilizations
    ) {
    }

    public static function counts()
    {
        return new self(
            GetCount::totalOf(new Chemical()),
            GetCount::totalOf(new Spray()),
            GetCount::totalOf(new Location()),
            GetCount::totalOf(new Fertilizer()),
            GetCount::totalOf(new Fertilization()),
        );
    }
}
