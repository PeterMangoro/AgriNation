<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Expenditure\CreateExpenditureRequest;

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

    public function store(CreateExpenditureRequest $request)
    {        
      // $this->handle()::store($request);
      
      $exp_id= DB::table('expenditures')->insertGetId([  
         'user_id' => Auth::user()->id,      
         'title' => $request->title,
         'quantity' => $request->quantity,
         'units' => $request->units,
         'detail' => $request->detail,
         'shop' => $request->shop,        
         'date'=> $request->date,              
         'created_at' => Carbon::now(),
     ]);
     
     $price_id= DB::table('prices')->insertGetId([        
      'expenditure_id'=> $exp_id,    
      'amount' => $request->price,
      'currency' => $request->currency,              
      'created_at' => Carbon::now(),
  ]);

  if ($request->currency != 'usd') {
   DB::table('currency_rates')->insertGetId([  
      'price_id' => $price_id, 
      'rate' => $request->rate,              
      'created_at' => Carbon::now(),
  ]);
  }
      
     
      return to_route('expenditures.create')->with('flash.banner', 'Expenditure Added Successfully');
 
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

   //  private function handle(): ProductHandler
   //  {
   //      return new ProductHandler();
   //  }
}
