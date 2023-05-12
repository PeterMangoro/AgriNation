<?php
namespace App\DataObjects\Shared;

use App\Models\Chemical;
use App\Actions\Shared\Model\GetCount;
use App\Models\Spray;

class TotalOfData
{

    public function __construct(
        public readonly int $chemicals,
        public readonly int $sprays
    )
    {
        
    }

    public static function counts()
    {
        return new self (
            GetCount::totalOf(new Chemical()),
            GetCount::totalOf(new Spray())
        );
    }
}