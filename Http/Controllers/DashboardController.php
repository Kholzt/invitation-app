<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $productCount = Products::count();
        $categoryCount = Categories::count();
        $params["data"] = (object) [
            "userCount" => $userCount,
            "productCount" => $productCount,
            "categoryCount" => $categoryCount,
        ];
        return Inertia::render("dashboard/Dashboard", $params);
    }
}
