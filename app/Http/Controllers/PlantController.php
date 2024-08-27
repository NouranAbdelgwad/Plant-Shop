<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("welcome")->with("plants", Plant::all());
    }
    public function get(){
        return view("plants")->with("plants", Plant::all());
    }
    /**
     * Show the form for creating a new resource.
     */
    public function filter(Request $request)
    {
        $sortOption = $request->input('sort');
        $query = Plant::query();
        switch ($sortOption) {
            case 'latest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'price_low_high':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high_low':
                $query->orderBy('price', 'desc');
                break;
            default:
                break;
        }
        $products = $query->paginate(5);
        return view('plants')->with("plants", $products);
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $plants = Plant::paginate(3);
        return view("product")->with("plant", Plant::find($id))->with("plants", $plants);
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
