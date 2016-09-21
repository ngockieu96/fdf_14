<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepositoryInterface;

class UsersController extends Controller
{
     protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->paginate(config('settings.user_per_page'));

        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->only('name', 'email', 'avatar', 'password', 'phone', 'address');

        if ($this->userRepository->register($input)) {
            return redirect()->route('user.index')->with('success', trans('user.create_user_successfully'));
        }

        return redirect()->route('user.index')->with('errors', trans('user.create_user_fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);

        if (!$user) {
            return redirect()->route('user.index')->with('errors', trans('user.user_not_found'));
        }

        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        try {
            $data = $request->only(['email', 'name', 'password', 'avatar', 'phone', 'address']);
            $this->userRepository->update($data, $id);
        } catch (Exception $e) {
            return redirect()->route('user.index')->with('errors', trans('user.update_user_fail'));
        }

        return redirect()->route('user.index')->with('success', trans('user.update_user_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
