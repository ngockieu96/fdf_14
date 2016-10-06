<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CreateSuggestionRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Suggestion\SuggestionRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;

class SuggestionController extends Controller
{
    protected $suggestionRepository;
    protected $categoryRepository;

    public function __construct(
        SuggestionRepositoryInterface $suggestionRepository,
        CategoryRepositoryInterface $categoryRepository
    ) {
        $this->suggestionRepository = $suggestionRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->getListCategory();

        return view('user.suggestion', compact('categories'));
    }

    public function store(CreateSuggestionRequest $request)
    {
        $inputs = $request->only('category_id', 'name', 'image', 'description');
        $inputs['user_id'] = auth()->user()->id;

        if ($this->suggestionRepository->create($inputs)) {
            return redirect()->action('HomeController@index')->with('success', trans('suggestion.create_suggestion_successfully'));
        }

        return redirect()->action('HomeController@index')->with('errors', trans('suggestion.create_suggestion_fail'));
    }
}
