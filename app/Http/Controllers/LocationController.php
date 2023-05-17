<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Handlers\Location\LocationHandler;
use App\Views\Locations\LocationEditProps;
use App\Views\Locations\LocationIndexProps;
use App\Http\Requests\Location\CreateLocationRequest;
use App\Http\Requests\Location\UpdateLocationRequest;

class LocationController extends Controller
{
   public function index()
   {
      return inertia('Location/index', [
         'data' => new LocationIndexProps()
      ]);
   }

   public function create()
   {
      return inertia('Location/create');
   }

   public function store(CreateLocationRequest $request)
   {
      LocationHandler::store($request);      

      return to_route('locations.index')->with('flash.banner', 'Location Added Successfully');
   }

   public function show()
   {
      return inertia('Location/show');
   }

   public function edit(string $uuid)
   {
      return inertia('Location/edit',[
         'data'=> new LocationEditProps($uuid)
      ]);
   }

   public function update(UpdateLocationRequest $request,string $uuid)
   {
      LocationHandler::update($request, $uuid);
        return back();
   }

   public function delete()
   {
      return inertia('Location/index');
   }

}
