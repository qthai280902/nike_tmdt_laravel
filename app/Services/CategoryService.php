<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    /**
     * Get all categories in a flat collection.
     */
    public function getAllCategories(): Collection
    {
        return Category::all();
    }

    /**
     * Get top-level categories with their children.
     */
    public function getCategoryTree(): Collection
    {
        return Category::whereNull('parent_id')
            ->with('children')
            ->get();
    }

    /**
     * Find a category by slug.
     */
    public function findBySlug(string $slug): ?Category
    {
        return Category::where('slug', $slug)->first();
    }
}
