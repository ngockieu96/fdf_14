<?php

namespace App\Http\Controllers\User;

use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Product\ProductRepositoryInterface;

class CartController extends Controller
{

    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository) {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        if (Session::has('listItem')) {
            $listItem = Session::get('listItem');
            foreach ($listItem as $item) {
                $listProductId[] = $item['product_id'];
                $listQuantity[$item['product_id']] = $item['quantity'];
            }
            $orderedProduct = $this->productRepository->getListProductByListIds($listProductId);

            return view('user.cart', compact('orderedProduct', 'listQuantity'));
        } else {
            return view('user.cart');
        }
    }
}
