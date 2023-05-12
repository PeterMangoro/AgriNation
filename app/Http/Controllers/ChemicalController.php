<?php

namespace App\Http\Controllers;

use App\Handlers\Chemical\ChemicalHandler;
use App\Http\Requests\Chemical\CreateChemicalRequest;
use App\Views\Chemicals\ChemicalIndexProps;

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

   public function update()
   {
      return inertia('Chemical/index');
   }

   public function delete()
   {
      return inertia('Chemical/index');
   }

}
