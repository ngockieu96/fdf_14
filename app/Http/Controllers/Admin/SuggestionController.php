<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\CreateSuggestionRequest;
use App\Http\Requests\UpdateSuggestionRequest;
use App\Http\Requests;
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
        $suggestions = $this->suggestionRepository->paginate(config('settings.suggestion_per_page'));

        return view('admin.suggestion.index', compact('suggestions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = $this->categoryRepository->getListCategory();

        return view('admin.suggestion.create', compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateSuggestionRequest $request)
    {
        $inputs = $request->only('name', 'description', 'image', 'category_id');
        $inputs['user_id'] = auth()->user()->id;

        if ($this->suggestionRepository->create($inputs)) {
            return redirect()->route('admin-suggestion.index')->with('success', trans('suggestion.create_suggestion_successfully'));
        }

        return redirect()->route('admin-suggestion.index')->with('errors', trans('suggestion.create_suggestion_fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $suggestion = $this->suggestionRepository->find($id);

        if (!$suggestion) {
            return redirect()->route('admin-suggestion.index')->with('errors', trans('suggestion.suggestion_not_found'));
        }

        return view('admin.suggestion.show', compact('suggestion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $suggestion = $this->suggestionRepository->find($id);
        $categories = $this->categoryRepository->getListCategory();

        if (!$suggestion) {
            return redirect()->route('admin-suggestion.index')->with('errors', trans('suggestion.suggestion_not_found'));
        }

        return view('admin.suggestion.edit', compact('suggestion', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, UpdateSuggestionRequest $request)
    {
        $input = $request->only('name', 'description', 'image', 'category_id');

        if ($this->suggestionRepository->update($input, $id)) {
            return redirect()->route('admin-suggestion.index')->with('success', trans('suggestion.update_suggestion_successfully'));
        }

        return redirect()->route('admin-suggestion.index')->with('errors', trans('suggestion.update_suggestion_fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $suggestion = $this->suggestionRepository->find($id);

        if (!$suggestion) {
            return redirect()->route('admin-suggestion.index')->with('errors', trans('suggestion.suggestion_not_found'));
        }

        if ($suggestion->delete()) {
            return redirect()->route('admin-suggestion.index')->with('success', trans('suggestion.delete_suggestion_successfully'));
        }

        return redirect()->route('admin-suggestion.index')->with('errors', trans('suggestion.delete_suggestion_fail'));
    }
}
