<?php

namespace App\Http\Controllers;

use App\Handlers\Expenditure\ExpenditureHandler;
use App\Http\Requests\Expenditure\CreateExpenditureRequest;
use App\Views\Expenditures\ExpenditureIndexProps;

class ExpenditureController extends Controller
{
   public function index()
   {
      return inertia('Expenditure/index', [
         'data' => new ExpenditureIndexProps()
      ]);
   }

   public function create()
   {
      return inertia('Expenditure/create');
   }

   public function store(CreateExpenditureRequest $request)
   {
      ExpenditureHandler::store($request);      

      return to_route('expenditures.index')->with('flash.banner', 'Expenditure Added Successfully');
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
