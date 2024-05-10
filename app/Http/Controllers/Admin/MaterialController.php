<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Material\StoreRequest;
use App\Http\Requests\Admin\Material\UpdateRequest;
use App\Models\Material;
use App\Services\MaterialService;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function __construct(protected MaterialService $materialService)
    {
        
    }

    public function index(Request $request)
    {
        $materials = $this->materialService->allWIthPaginate($request->get('perPage'));

        return view('admin.material.index', compact('materials'));
    }

    public function create()
    {
        return view('admin.material.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $this->materialService->create($data);

        return redirect()->route('admin.materials.index');
    }

    public function show(Material $material)
    {
        return view('admin.material.show', compact('material'));
    }

    public function edit(Material $material)
    {
        return view('admin.material.edit', compact('material'));
    }

    public function update(UpdateRequest $request, Material $material)
    {
        $data = $request->validated();

        $this->materialService->update($material, $data);

        return redirect()->route('admin.materials.index');
    }

    public function destroy(Material $material)
    {
        $this->materialService->delete($material);

        return redirect()->route('admin.materials.index');
    }
}
