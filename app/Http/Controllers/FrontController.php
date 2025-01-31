<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Workshop;
use App\Services\FrontService;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    protected $frontService;
    public function __construct(FrontService $frontService)
    {
        $this->frontService = $frontService;
    }
    public function index()
    {   
        $data = $this->frontService->getFormPageData();
        $products = Product::all();
        return view('front.index', array_merge($data, ['products' => $products]));
    }

    public function details(Workshop $workshop)
    {
        return view('front.details', compact('workshop'));
    }

    public function category(Category $category)
    {
        return view('front.category', compact('category'));
    }
    public function film()
    {
        $data = $this->frontService->getFormPageData();
        $products = Product::all();
        return view('front.film', array_merge($data, ['products' => $products]));
    }
}