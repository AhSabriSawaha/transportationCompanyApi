<?php


namespace App\Services;

use App\Data\CategoryData;
use App\Models\Category;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CategoryService
{
    public function get()
    {
        return QueryBuilder::for(Category::query())
            ->allowedFilters([
                'name',
                AllowedFilter::exact('id')
            ])
            ->get();
    }

    public function store(CategoryData $data)
    {
        return Category::create($data->toArray());
    }

    public function update(CategoryData $data,Category $category)
    {
        $category->update($data->toArray());

        return $category;
    }
}

