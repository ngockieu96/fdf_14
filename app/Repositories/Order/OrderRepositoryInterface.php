<?php
namespace App\Repositories\Order;
interface OrderRepositoryInterface
{
    public function count();
    public function all();
    public function find($id);
    public function findBy($column, $option);
    public function paginate($limit);
    public function lists($column, $key = null);
    public function create($inputs);
    public function insert($inputs);
    public function update($inputs, $id);
    public function delete($ids);
    public function search($column, $value);
}
