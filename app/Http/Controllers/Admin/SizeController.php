<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Size\StoreRequest;
use App\Http\Requests\Admin\Size\UpdateRequest;
use App\Models\Size;
use App\Services\SizeService;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function __construct(protected SizeService $sizeService)
    {
    }

    public function index(Request $request)
    {
        $sizes = $this->sizeService->allWIthPaginate($request->get('perPage'));

        return view('admin.size.index', compact('sizes'));
    }

    public function create()
    {
        return view('admin.size.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $this->sizeService->create($data);

        return redirect()->route('admin.sizes.index');
    }

    public function show(Size $size)
    {
        return view('admin.size.show', compact('size'));
    }

    public function edit(Size $size)
    {
        return view('admin.size.edit', compact('size'));
    }

    public function update(UpdateRequest $request, Size $size)
    {
        $data = $request->validated();

        $this->sizeService->update($size, $data);

        return redirect()->route('admin.sizes.index');
    }

    public function destroy(Size $size)
    {
        $this->sizeService->delete($size);

        return redirect()->route('admin.sizes.index');
    }
}
