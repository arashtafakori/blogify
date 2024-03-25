<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index()
    {
        return redirect(route("foods.list"));
    }
 
    public function list()
    {
        return view("foods.list");
    } 

    public function create()
    {
        return view("foods.create");
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        return view("foods.show");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
