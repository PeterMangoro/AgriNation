<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Handlers\Finance\Income\IncomeHandler;
use App\Views\Finance\Incomes\IncomeIndexProps;
use App\Views\Finance\Incomes\IncomeCreateProps;
use App\Http\Requests\Finance\Income\CreateIncomeRequest;



class IncomeController extends Controller
{
   public function index()
   {
      return inertia('Income/index', [
         'data' => new IncomeIndexProps()
      ]);
   }

   public function create()
   {
      return inertia('Income/create',[
         'data' => new IncomeCreateProps()
      ]);
   }

   public function store(CreateIncomeRequest $request)
   {
      IncomeHandler::store($request);      

      return to_route('incomes.index')->with('flash.banner', 'Income Added Successfully');
   }

   public function show()
   {
      return inertia('Income/show');
   }

   public function update()
   {
      return inertia('Income/index');
   }

   public function delete()
   {
      return inertia('Income/index');
   }

}
