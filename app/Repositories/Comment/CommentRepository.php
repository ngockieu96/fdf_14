<?php

namespace App\Repositories\Comment;

use App\Models\Comment;
use App\Repositories\BaseRepository;
use App\Repositories\Comment\CommentRepositoryInterface;

class CommentRepository extends BaseRepository implements CommentRepositoryInterface
{
    public function __construct(Comment $comment)
    {
        $this->model = $comment;
    }

    public function isRatedProduct($productId)
    {
        $countRate = $this->model->where('product_id', $productId)
            ->where('rate', '<>', config('settings.default_value'))->count();

        return $countRate != config('settings.default_value');
    }
}
