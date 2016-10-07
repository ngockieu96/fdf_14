<?php

namespace App\Repositories\Category;

use DB;
use App\Models\Product;
use App\Models\Category;
use App\Repositories\BaseRepository;
use App\Repositories\Category\CategoryRepositoryInterface;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    protected $product;

    public function __construct(Category $category, Product $product)
    {
        $this->model = $category;
        $this->product = $product;
    }

    public function getListCategory()
    {
        return $this->model->pluck('name', 'id');
    }

    public function deleteCategoryWithProduct($category)
    {
        DB::beginTransaction();
        try {
            $productsId = $category->products()->pluck('id');
            $this->product->whereIn('id', $productsId)->delete();
            $category->delete();
            DB::commit();

            return true;
        } catch (Exception $e) {
            DB::rollBack();

            return false;
        }
    }
}
