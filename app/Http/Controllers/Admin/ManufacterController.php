<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Manufacter\StoreRequest;
use App\Http\Requests\Admin\Manufacter\UpdateRequest;
use App\Models\Manufacter;
use App\Services\ManufacterService;
use Illuminate\Http\Request;

class ManufacterController extends Controller
{
    public function __construct(protected ManufacterService $manufacterService)
    {
    }

    public function index(Request $request)
    {
        $manufacters = $this->manufacterService->allWIthPaginate($request->get('perPage'));

        return view('admin.manufacter.index', compact('manufacters'));
    }

    public function create()
    {
        return view('admin.manufacter.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $this->manufacterService->create($data);

        return redirect()->route('admin.manufacters.store');
    }

    public function show(Manufacter $manufacter)
    {
        return view('admin.manufacter.show', compact('manufacter'));
    }

    public function edit(Manufacter $manufacter)
    {
        return view('admin.manufacter.edit', compact('manufacters'));
    }

    public function update(UpdateRequest $request, Manufacter $manufacter)
    {
        $data = $request->validated();

        $this->manufacterService->update($manufacter, $data);

        return redirect()->route('admin.manufactes.index');
    }

    public function destroy(Manufacter $manufacter)
    {
        $this->manufacterService->delete($manufacter);

        return redirect()->route('admin.manufactes.index');
    }
}
