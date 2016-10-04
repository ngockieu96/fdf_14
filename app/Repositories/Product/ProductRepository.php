<?php

namespace App\Repositories\Product;

use Input;
use App\Models\Product;
use App\Repositories\BaseRepository;
use App\Repositories\Product\ProductRepositoryInterface;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function getListProductByListIds($listIds)
    {
        return $this->model->whereIn('id', $listIds)->get();
    }

    public function getListPriceOfProducts()
    {
        return $this->model->pluck('price', 'id');
    }

    public function getTotalCost($listItem)
    {
        foreach ($listItem as $item) {
            $listProductId[] = $item['product_id'];
            $listQuantity[$item['product_id']] = $item['quantity'];
        }
        $orderedProduct = $this->getListProductByListIds($listProductId);
        $totalCost = 0;
        foreach ($orderedProduct as $product) {
            $totalCost += $product->price * $listQuantity[$product->id];
        }

        return $totalCost;
    }

    public function create($inputs)
    {
        $inputs['image'] = $this->uploadProductImage($inputs['image']);
        $data = $this->model->create($inputs);

        if (!$data) {
            throw new Exception(trans('message.create_error'));
        }

        return $data;
    }

    public function update($inputs, $id)
    {
        if (empty($inputs['image'])) {
            unset($inputs['image']);
        } else {
            $inputs['image'] = $this->uploadProductImage($inputs['image']);
        }

        $data = $this->model->where('id', $id)->update($inputs);

        if (!$data) {
            throw new Exception(trans('message.update_error'));
        }

        return $data;
    }

    public function uploadProductImage($oldImage = null)
    {
        $file = Input::file('image');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path(config('settings.image_path')), $fileName);

        if (!empty($oldImage) && file_exists($oldImage)) {
            File::delete($oldImage);
        }

        return $fileName;
    }

    public function findProductById($id)
    {
        return $this->model->with('category', 'comments.user')->find($id);
    }

    public function filter($filters)
    {
        return $this->model->filter($filters)->paginate(config('settings.product_per_page'));
    }
}
