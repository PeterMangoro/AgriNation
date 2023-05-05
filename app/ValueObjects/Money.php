<?php

namespace App\ValueObjects;

class Money
{
    

    public static function from(?object $value): string
    {
        if ($value->currency =='usd') {
            return '$' . number_format($value->amount, 2);
    }

    return number_format($value->amount, 2).strtoupper($value->currency);
        }
       

    public static function usdEquivalent(?object $value): string|null
    {
        if ($value->currency =='usd') {
            return null;
    }
        
        return '$' . number_format(($value->amount/$value->rate->rate), 2);
    }
}
