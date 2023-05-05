<?php
namespace App\Handlers\Expenditure;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Events\Expenditure\CreatingExpenditure;
use App\Http\Requests\Expenditure\CreateExpenditureRequest;
use App\DataObjects\Expenditure\ExpenditureCreateData;

class ExpenditureHandler
{
    public static function store(CreateExpenditureRequest $request)
    {
        $validated_object = ExpenditureCreateData::fromRequest($request);
        event(new CreatingExpenditure($validated_object));

       
   
    }
}