<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use App\ProductFilters;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;

class FilterController extends Controller
{

    protected $productRepository;
    protected $categoryRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        CategoryRepositoryInterface $categoryRepository
    ) {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function filter(ProductFilters $filters)
    {
        $inputs = $filters->inputs();
        $products = $this->productRepository->filter($filters);
        $products->appends($inputs)->links();
        $categories = $this->categoryRepository->getListCategory();

        return view('home', compact('products', 'categories', 'inputs'));
    }
}
