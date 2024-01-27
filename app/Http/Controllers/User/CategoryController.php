<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\CategoryResource;
use App\Models\Category;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    public function __construct(
        public CategoryService $categoryService
    )
    {

    }
    public function index()
    {
        $categories = $this->categoryService->get();

        return response()->json([
            'data' => CategoryResource::collection($categories)
        ]);

    }

    public function show(Category $category)
    {
        return response()->json([
            'data' => CategoryResource::make($category)
        ]);
    }
}
