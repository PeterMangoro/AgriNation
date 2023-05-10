<?php
namespace App\ValueObjects;

class To2dp
{
    public static function of(int|float $value):string
    {
        return number_format($value, 2);
    }
}