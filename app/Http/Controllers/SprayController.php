<?php

namespace App\Http\Controllers;

use App\Handlers\Spray\SprayHandler;
use App\Http\Requests\Spray\CreateSprayRequest;
use App\Views\Sprays\SprayIndexProps;

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
      return inertia('Spray/create');
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
