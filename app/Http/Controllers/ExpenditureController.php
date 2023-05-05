<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExpenditureController extends Controller
{
    public function index()
    {        
       return inertia('Expenditure/index');
    }

    public function create()
    {        
       return inertia('Expenditure/create');
    }

    public function store()
    {        
       return inertia('Expenditure/index');
    }

    public function show()
    {        
       return inertia('Expenditure/show');
    }

    public function update()
    {        
       return inertia('Expenditure/index');
    }

    public function delete()
    {        
       return inertia('Expenditure/index');
    }
}
