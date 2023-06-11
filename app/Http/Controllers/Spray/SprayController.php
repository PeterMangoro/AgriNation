<?php

namespace App\Http\Controllers\Spray;

use App\Handlers\Spray\SprayHandler;
use App\Http\Controllers\Controller;
use App\Views\Sprays\SprayIndexProps;
use App\Views\Sprays\SprayCreateProps;
use App\Http\Requests\Spray\CreateSprayRequest;

class SprayController extends Controller
{
   public function index()
   {
      return inertia('Spray/index', [
         'data' => new SprayIndexProps()
      ]);
   }

   public function create()
   {
      return inertia('Spray/create',[
         'data' => new SprayCreateProps()
      ]);
   }

   public function store(CreateSprayRequest $request)
   {
      SprayHandler::store($request);      

      return to_route('sprays.index')->with('flash.banner', 'Spray Added Successfully');
   }

   public function show()
   {
      return inertia('Spray/show');
   }

   public function update()
   {
      return inertia('Spray/index');
   }

   public function delete()
   {
      return inertia('Spray/index');
   }

}
