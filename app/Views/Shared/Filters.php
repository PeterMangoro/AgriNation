<?php

namespace App\Views\Shared;

class Filters
{
    public static function filters()
    {
        return [
            'search' => request('search'),
            'column' => request('column'),
            'direction' => request('direction'),
            'show' => request('show') ?: 'accounts',
        ];
    }

    public static function transport_filters()
    {
        return [
            'date' => request('date'),
            'owner' => request('owner'),
            'destination' => request('destination'),
            'departure' => request('departure'),
        ];
    }
}
