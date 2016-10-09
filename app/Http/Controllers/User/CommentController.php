<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Repositories\Comment\CommentRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;

class CommentController extends Controller
{
    protected $commentRepository;
    protected $productRepository;

    public function __construct(
        CommentRepositoryInterface $commentRepository,
        ProductRepositoryInterface $productRepository
    ) {
        $this->commentRepository = $commentRepository;
        $this->productRepository = $productRepository;
    }

    public function store(Request $request)
    {
        if ($request->ajax()) {
            $inputs = $request->only('product_id', 'content', 'rate');

            try {
                $inputs['user_id'] = auth()->user()->id;
                $currentProduct = $this->productRepository->find($inputs['product_id']);

                if (empty($inputs['rate'])) {
                    $inputs['rate'] = config('settings.default_value');
                } else {
                    $currentRateCount = $currentProduct->rate_count;
                    $rateAverage = ($currentProduct->rate_average * $currentRateCount + (int) $inputs['rate']) / $currentRateCount;
                    $currentProduct->rate_average = round($rateAverage, config('settings.round_rate_average'));
                    $currentProduct->rate_count += config('settings.increate_rate');
                    $currentProduct->save();
                }

                $comment = $this->commentRepository->create($inputs);
                $result = [
                    'success' => true,
                    'content' => $inputs['content'],
                    'user' => auth()->user()->name,
                    'created_at' => $comment->created_at->diffForHumans(),
                    'rate_average' => $currentProduct->rate_average,
                    'rate_count' => $currentProduct->rate_count,
                    'avatarPath' => auth()->user()->getAvatarPath(),
                ];
            } catch (Exception $e) {
                $result = [
                    'success' => false,
                    'message' => trans('label.comment_fail'),
                ];

                return response()->json($result);
            }

            return response()->json($result);
        }

        return redirect()->back();
    }
}
