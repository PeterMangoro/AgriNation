<?php
namespace App\Actions\Expenditure;

use App\Models\Expenditure;

class GetTotal
{
    public static function of(string $currency)
    {
      return Expenditure::getTotalOf($currency);
    }
}