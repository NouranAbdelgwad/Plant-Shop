<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        if(Auth::check()){
        return Auth::user()->is_admin? view("dashboard")->with("products", Plant::paginate(5)) : view("welcome");
        }
    }
    public function delete($id) {
        $plant = Plant::findOrFail($id);
        $plant->delete();
        return redirect("/dashboard")->with("deleted", "The " . $plant->name . " has been deleted!");
    }
    public function create(Request $request)
    {
        $validatedProduct = $request->validate([
            "name" => "required|string|max:255",
            "price" => "required|numeric|min:0",
            "category" => "required|string|max:255",
            "description" => "required|string",
            "image_1" => "required|string|url",
        ]);
        try {
            Plant::create($validatedProduct);
            return redirect("/dashboard")->with('success', 'Product created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function update($id, Request $request){
        $validatedProduct = $request->validate([
            "name" => "required|string|max:255",
            "price" => "required|numeric|min:0",
            "category" => "required|string|max:255",
            "description" => "required|string",
            "image_1" => "required|string|url",
        ]);
        try {
            $product = Plant::findOrFail($id);
            $product->update($validatedProduct);
            return redirect("/dashboard")->with('success', $product->name . 'updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


}

