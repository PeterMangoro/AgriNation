<?php

namespace App\Http\Controllers\Finance;

use App\Actions\Finance\Debit\DeleteDebtAction;
use App\Http\Controllers\Controller;
use App\Handlers\Finance\Debit\DebitHandler;
use App\Views\Finance\Debits\DebitIndexProps;
use App\Views\Finance\Debits\DebitCreateProps;
use App\Http\Requests\Finance\Debit\CreateDebitRequest;
use App\Models\Finance\Debit;

class DebitController extends Controller
{
   public function index()
   {
      return inertia('Debit/index', [
         'data' => new DebitIndexProps()
      ]);
   }

   public function create()
   {
      return inertia('Debit/create',[
         'data' => new DebitCreateProps()
      ]);
   }

   public function store(CreateDebitRequest $request)
   {
      DebitHandler::store($request);      

      return to_route('debits.index')->with('flash.banner', 'Debit Added Successfully');
   }

   public function show()
   {
      return inertia('Debit/show');
   }

   public function update()
   {
      return inertia('Debit/index');
   }

   public function destroy(  $debt)
   {
      $debt=Debit::find($debt);
      // dd($debt);
      DeleteDebtAction::handle($debt);
      return back();
   }

}
