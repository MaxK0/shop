<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Color\StoreRequest;
use App\Http\Requests\Admin\Color\UpdateRequest;
use App\Models\Color;
use App\Services\ColorService;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function __construct(protected ColorService $colorService) {}

    public function index(Request $request)
    {
        $colors = $this->colorService->allWIthPaginate($request->get('perPage'));
        
        return view('admin.color.index', compact('colors'));
    }

    public function create()
    {
        return view('admin.color.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $this->colorService->create($data);
        
        return redirect()->route('admin.colors.index');
    }

    public function show(Color $color)
    {
        return view('admin.color.show', compact('color'));
    }

    public function edit(Color $color)
    {
        return view('admin.color.edit', compact('color'));
    }

    public function update(UpdateRequest $request, Color $color)
    {
        $data = $request->validated();

        $this->colorService->update($color, $data);

        return redirect()->route('admin.colors.index');
    }

    public function destroy(Color $color)
    {
        $this->colorService->delete($color);

        return redirect()->route('admin.colors.index');
    }
}
