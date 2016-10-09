<?php

namespace App\Http\Controllers\User;

use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Comment\CommentRepositoryInterface;

class ProductController extends Controller
{

    protected $productRepository;
    protected $commentRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        CommentRepositoryInterface $commentRepository
    ) {
        $this->productRepository = $productRepository;
        $this->commentRepository = $commentRepository;
    }

    public function show($id)
    {
        $product = $this->productRepository->findProductById($id);
        $isRatedProduct = auth()->check() ? $this->commentRepository->isRatedProduct($id) : false;
        $product->view_count += config('settings.increate_view');
        $product->save();
        $isOrdered = false;

        if (Session::has('listItem')) {
            $listItem = Session::get('listItem');
            foreach ($listItem as $item) {
                if ($item['product_id'] == $id) {
                    $isOrdered = true;
                    break;
                }
            }
        }

        return view('user.product_detail', compact('product', 'isOrdered', 'isRatedProduct'));
    }
}
