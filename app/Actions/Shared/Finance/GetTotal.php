<?php
namespace App\Actions\Shared\Finance;

use App\Models\Finance\Income;
use App\Models\Finance\Expenditure;

class GetTotal
{
    public static function ofExpenditure(string $currency)
    {
      return Expenditure::getTotalOf($currency);
    }

    public static function ofIncome(string $currency)
    {
      return Income::getTotalOf($currency);
    }
}