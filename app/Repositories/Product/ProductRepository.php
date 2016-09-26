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
}
