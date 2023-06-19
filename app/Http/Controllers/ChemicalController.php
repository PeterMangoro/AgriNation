<?php

namespace App\Http\Controllers;

use App\Handlers\Chemical\ChemicalHandler;
use App\Views\Chemicals\ChemicalEditProps;
use App\Views\Chemicals\ChemicalIndexProps;
use App\Http\Requests\Chemical\CreateChemicalRequest;
use App\Http\Requests\Chemical\UpdateChemicalRequest;

class ChemicalController extends Controller
{
   public function index()
   {
      return inertia('Chemical/index', [
         'data' => new ChemicalIndexProps()
      ]);
   }

   public function create()
   {
      return inertia('Chemical/create');
   }

   public function store(CreateChemicalRequest $request)
   {
      ChemicalHandler::store($request);      

      return to_route('chemicals.index')->with('flash.banner', 'Chemical Added Successfully');
   }

   public function show()
   {
      return inertia('Chemical/show');
   }

   public function edit(string $uuid)
   {
      return inertia('Chemical/edit',[
         'data'=> new ChemicalEditProps($uuid)
      ]);
   }

   public function update(UpdateChemicalRequest $request,string $uuid)
   {
      ChemicalHandler::update($request, $uuid);
        return back();
   }

   public function delete()
   {
      return inertia('Chemical/index');
   }

}
