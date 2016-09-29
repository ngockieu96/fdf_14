<?php

namespace App\Repositories\Item;

use Auth;
use App\Models\Item;
use Session;
use App\Repositories\BaseRepository;
use App\Repositories\Item\ItemRepositoryInterface;

class ItemRepository extends BaseRepository implements ItemRepositoryInterface
{
    public function __construct(Item $item)
    {
        $this->model = $item;
    }

    public function addToCart($inputs)
    {
        if (Session::has('listItem')) {
            $currentItems = Session::get('listItem');
            $countItem = Session::get('countItem');
            Session::put('countItem', ++$countItem);
            $currentItems[$countItem] = collect($inputs);
            Session::put('listItem', $currentItems);
        } else {
            $defaultCountItem = config('settings.default_count_item');
            Session::put('countItem', $defaultCountItem);
            $listItem[$defaultCountItem] = collect($inputs);
            Session::put('listItem', $listItem);
        }
    }
}
