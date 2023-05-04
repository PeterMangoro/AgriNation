<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExpenditureController extends Controller
{
    public function index()
    {
       return inertia('Expenditure/index');
    }
}
