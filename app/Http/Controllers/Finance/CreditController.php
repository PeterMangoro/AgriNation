<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Handlers\Finance\Credit\CreditHandler;
use App\Views\Finance\Credits\CreditIndexProps;
use App\Http\Requests\Finance\Credit\CreateCreditRequest;



class CreditController extends Controller
{
   public function index()
   {
      return inertia('Credit/index', [
         'data' => new CreditIndexProps()
      ]);
   }

   public function create()
   {
      return inertia('Credit/create');
   }

   public function store(CreateCreditRequest $request)
   {
      CreditHandler::store($request);      

      return to_route('credits.index')->with('flash.banner', 'Credit Added Successfully');
   }

   public function show()
   {
      return inertia('Credit/show');
   }

   public function update()
   {
      return inertia('Credit/index');
   }

   public function delete()
   {
      return inertia('Credit/index');
   }

}
