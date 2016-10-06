<?php

namespace App\Repositories\Suggestion;

use App\Models\Suggestion;
use Input;
use App\Repositories\BaseRepository;
use App\Repositories\Suggestion\SuggestionRepositoryInterface;

class SuggestionRepository extends BaseRepository implements SuggestionRepositoryInterface
{
    public function __construct(Suggestion $suggestion)
    {
        $this->model = $suggestion;
    }

    public function create($inputs)
    {
        if (!empty($inputs['image'])) {
            $file = Input::file('image');
            $fileName = uniqid(time(), true) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path(config('settings.suggestion_image_path')), $fileName);
            $inputs['image'] = $fileName;
        }

        $data = $this->model->create($inputs);

        if (!$data) {
            throw new Exception(trans('message.create_error'));
        }

        return $data;
    }
}
