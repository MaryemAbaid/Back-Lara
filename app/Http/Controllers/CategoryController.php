<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return category::get();
    }
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'image' => 'required',
            'cat_prents' => 'required'
        ]);
        $image = $request->file('image');
        $imgName = time() . "." . $image->getClientOriginalExtension();
        $image->move('categoires/', $imgName);
        category::create(
            [
                'nom' => $request->nom,
                'image' => $imgName,
                'cat_prents' => $request->cat_prents
            ]
        );

        return response()->json([
            'message' => "insert is valide"
        ]);
    }
    public function show(category $category)
    {
        return response()->json([
            'cat' => $category
        ]);
    }
    public function update(Request $request, category $category)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imgName = time() . "." . $image->getClientOriginalExtension();
            $image->move('categoires/', $imgName);
            $category->update([
                'image' => $imgName,
            ]);
        }

        if ($request->nom) {
            $category->update([
                'nom' => $request->nom,
            ]);
        }
        if ($request->cat_prents) {
            $category->update([
                'cat_prents' => $request->cat_prents,
            ]);
        }
        return response()->json([
            'message' => 'Item updated successfully'
        ]);
    }
    public function destroy(category $category)
    {
        $category->delete();
    }
    public function count()
    {
        return category::get()->count();


    }
}
