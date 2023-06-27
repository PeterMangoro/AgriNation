<?php
namespace App\Actions\Shared\Finance;

use App\Models\Finance\Credit;
use App\Models\Finance\Debit;
use App\Models\Finance\Income;
use App\Models\Finance\Expenditure;

class GetTotal
{
    public static function ofExpenditure(string $currency)
    {
      return Expenditure::getTotalOf($currency);
    }

    public static function ofCredit(string $currency)
    {
      return Credit::getTotalOf($currency);
    }

    public static function ofDebit(string $currency)
    {
      return Debit::getTotalOf($currency);
    }

    public static function ofIncome(string $currency)
    {
      return Income::getTotalOf($currency);
    }
}