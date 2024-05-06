<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User\Role;
use App\Models\User\User;
use App\Services\RoleService;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct(
        protected UserService $userService,
        protected RoleService $roleService
    ) {
    }

    public function index(Request $request)
    {
        //TODO: Исправить: при указании offset и переходе на другую страницу через Links, offset удаляется 
        $users = $this->userService->getAllWithPaginate($request->get('offset'));

        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $roles = $this->roleService->all();

        return view('admin.user.create', compact('roles'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $this->userService->create($data);

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = $this->roleService->all();

        return view('admin.user.edit', compact('user', 'roles'));
    }

    public function update(UpdateRequest $request, User $user)
    {
        $data = $request->validated();

        $this->userService->update($user, $data);

        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user)
    {
        //TODO: Исправить: заместо одного пользователя удаляются все
        $this->userService->delete($user);

        return redirect()->route('admin.users.index');
    }
}
