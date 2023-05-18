<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Handlers\Plant\PlantHandler;
use App\Views\Plants\PlantEditProps;
use App\Views\Plants\PlantIndexProps;
use App\Views\Plants\PlantCreateProps;
use App\Http\Requests\Plant\CreatePlantRequest;
use App\Http\Requests\Plant\UpdatePlantRequest;

class PlantController extends Controller
{
   public function index()
   {
      return inertia('Plant/index', [
         'data' => new PlantIndexProps()
      ]);
   }

   public function create()
   {
      return inertia('Plant/create',[
         'data'=> new PlantCreateProps()
      ]);
   }

   public function store(CreatePlantRequest $request)
   {
      PlantHandler::store($request);      

      return to_route('plants.index')->with('flash.banner', 'Plant Added Successfully');
   }

   public function show()
   {
      return inertia('Plant/show');
   }

   public function edit(string $uuid)
   {
      return inertia('Plant/edit',[
         'data'=> new PlantEditProps($uuid)
      ]);
   }

   public function update(UpdatePlantRequest $request,string $uuid)
   {
      PlantHandler::update($request, $uuid);
        return back();
   }

   public function delete()
   {
      return inertia('Plant/index');
   }

}
