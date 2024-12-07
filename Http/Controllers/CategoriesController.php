<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Str;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::orderBy("id", "desc")->paginate(10);
        $params["data"] = (object) [
            "categories" => $categories
        ];
        return Inertia::render("dashboard/categories/Categories", $params);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            "name" => "required|unique:categories,name"
        ]);
        $data = [
            "name" => $request->name,
            "slug" => Str::slug($request->name),
        ];
        Categories::create($data);


        return to_route("categories.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        request()->validate([
            "name" => "required|unique:categories,name,$id,id"
        ]);

        $data = [
            "name" => $request->name,
            "slug" => Str::slug($request->name),
        ];
        Categories::find($id)->update($data);


        return to_route("categories.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $categories)
    {
        //
    }
}
