<?php
namespace App\Actions\Shared\Finance;

use App\Models\Expenditure;
use App\Models\Income;

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