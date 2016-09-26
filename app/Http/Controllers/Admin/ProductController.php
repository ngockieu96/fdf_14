<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;

class ProductController extends Controller
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

    public function index()
    {
        $products = $this->productRepository->paginate(config('settings.product_per_page'));

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = $this->categoryRepository->getListCategory();

        return view('admin.product.create', compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateProductRequest $request)
    {
        $input = $request->only('name', 'description', 'image', 'price', 'category_id', 'quantity', 'status');

        if ($this->productRepository->create($input)) {
            return redirect()->route('product.index')->with('success', trans('product.create_product_successfully'));
        }

        return redirect()->route('product.index')->with('errors', trans('product.create_product_fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $product = $this->productRepository->find($id);

        if (!$product) {
            return redirect()->route('product.index')->with('errors', trans('product.product_not_found'));
        }

        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $product = $this->productRepository->find($id);
        $categories = $this->categoryRepository->getListCategory();

        if (!$product) {
            return redirect()->route('product.index')->with('errors', trans('product.product_not_found'));
        }

        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, UpdateProductRequest $request)
    {
        $input = $request->only('name', 'description', 'image', 'price', 'category_id', 'quantity', 'status');

        if ($this->productRepository->update($input, $id)) {
            return redirect()->route('product.index')->with('success', trans('product.update_product_successfully'));
        }

        return redirect()->route('product.index')->with('errors', trans('product.update_product_fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $product = $this->productRepository->find($id);

        if (!$product) {
            return redirect()->route('product.index')->with('errors', trans('product.product_not_found'));
        }

        if ($product->delete()) {
            return redirect()->route('product.index')->with('success', trans('product.delete_product_successfully'));
        }

        return redirect()->route('product.index')->with('errors', trans('product.delete_product_fail'));
    }
}
