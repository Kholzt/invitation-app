<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::orderBy("id", "desc")->paginate(10);
        $params["data"] = (object) [
            "products" => $products
        ];
        return Inertia::render("dashboard/products/Products", $params);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::orderBy("id", "desc")->get();
        $params["data"] = (object) [
            "title" => "Create New Product",
            "action_form" => "/admin/products",
            "categories" => $categories,
            "product" => (object)[
                "name" => "",
                "price" => "",
                "description" => "",
                "download_link" => ""
            ]
        ];

        return Inertia::render("dashboard/products/Form", $params);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $products = Products::with("assets")->find($id);
        $categories = Categories::orderBy("id", "desc")->get();
        $params["data"] = (object) [
            "title" => "Create New Product",
            "action_form" => "/admin/products/" . $products->id,
            "categories" => $categories,
            "product" => $products
        ];
        return Inertia::render("dashboard/products/Form", $params);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $products)
    {
        //
    }
}
