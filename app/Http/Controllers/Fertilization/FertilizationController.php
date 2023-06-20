<?php

namespace App\Http\Controllers\Fertilization;

use App\Handlers\Fertilization\FertilizationHandler;
use App\Http\Controllers\Controller;
use App\Views\Fertilizations\FertilizationIndexProps;
use App\Views\Fertilizations\FertilizationCreateProps;
use App\Http\Requests\Fertilization\CreateFertilizationRequest;

class FertilizationController extends Controller
{
   public function index()
   {
      return inertia('Fertilization/index', [
         'data' => new FertilizationIndexProps()
      ]);
   }

   public function create()
   {
      return inertia('Fertilization/create',[
         'data' => new FertilizationCreateProps()
      ]);
   }

   public function store(CreateFertilizationRequest $request)
   {
      FertilizationHandler::store($request);      

      return to_route('fertilizations.index')->with('flash.banner', 'Fertilization Added Successfully');
   }

   public function show()
   {
      return inertia('Fertilization/show');
   }

   public function update()
   {
      return inertia('Fertilization/index');
   }

   public function delete()
   {
      return inertia('Fertilization/index');
   }

}
