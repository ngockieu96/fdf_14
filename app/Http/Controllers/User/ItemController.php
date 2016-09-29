<?php

namespace App\Http\Controllers\User;

use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Item\ItemRepositoryInterface;

class ItemController extends Controller
{

    protected $itemRepository;

    public function __construct(ItemRepositoryInterface $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }

    public function index()
    {
        Session::forget(['listItem', 'countItem']);

        return redirect()->action('HomeController@index');
    }

    public function store(Request $request)
    {
        $inputs = $request->only('product_id', 'quantity');
        $this->itemRepository->addToCart($inputs);

        return redirect()->action('HomeController@index');
    }
}
