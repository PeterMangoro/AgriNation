<?php

namespace App\Http\Controllers;

use App\Handlers\Fertilizer\FertilizerHandler;
use App\Views\Fertilizers\FertilizerEditProps;
use App\Views\Fertilizers\FertilizerIndexProps;
use App\Http\Requests\Fertilizer\CreateFertilizerRequest;
use App\Http\Requests\Fertilizer\UpdateFertilizerRequest;

class FertilizerController extends Controller
{
   public function index()
   {
      return inertia('Fertilizer/index', [
         'data' => new FertilizerIndexProps()
      ]);
   }

   public function create()
   {
      return inertia('Fertilizer/create');
   }

   public function store(CreateFertilizerRequest $request)
   {
      FertilizerHandler::store($request);      

      return to_route('fertilizers.index')->with('flash.banner', 'Fertilizer Added Successfully');
   }

   public function show()
   {
      return inertia('Fertilizer/show');
   }

   public function edit(string $uuid)
   {
      return inertia('Fertilizer/edit',[
         'data'=> new FertilizerEditProps($uuid)
      ]);
   }

   public function update(UpdateFertilizerRequest $request,string $uuid)
   {
      FertilizerHandler::update($request, $uuid);
        return back();
   }

   public function delete()
   {
      return inertia('Fertilizer/index');
   }

}
