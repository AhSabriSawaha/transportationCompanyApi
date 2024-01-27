<?php

namespace App\Http\Controllers\Admin;

use App\Data\CategoryData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreCategoryRequest;
use App\Http\Requests\Admin\Category\UpdateCategoryRequest;
use App\Http\Resources\Admin\CategoryResource;
use App\Models\Category;
use App\Services\CategoryService;
use App\Services\FileService;
use Illuminate\Http\Request;

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
        // $category->load([''])
        return response()->json([
            'data' => CategoryResource::make($category)
        ]);
    }


    public function store(StoreCategoryRequest $request)
    {
        /**
         * this approach or down below
         * $category = $this->categoryService->store(
         * CategoryData::from($request->validated()));

         * FileService::uploadImage($category,request()->file,'images');
         */

        $validated = $request->validated();

        $file = $validated['file'];

        $category = $this->categoryService->store(CategoryData::from($validated));

        FileService::uploadImage($category,$file,'images');

        return response()->json([
            'data' => CategoryResource::make($category)
        ]);
    }

    public function update(UpdateCategoryRequest $request,Category $category)
    {
        $category = $this->categoryService->update(CategoryData::from($request->validated()),$category);

        return response()->json([
            'data' => CategoryResource::make($category)
        ]);
    }

    public function delete(Category $category)
    {
        $category->delete();

        return response()->json([
            'data' => 'true'
        ]);
    }


}
