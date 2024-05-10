<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\StoreRequest;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Tag;
use App\Services\TagService;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct(protected TagService $tagService)
    {
    }

    public function index(Request $request)
    {
        $tags = $this->tagService->allWIthPaginate($request->get('perPage'));

        return view('admin.tag.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tag.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $this->tagService->create($data);

        return redirect()->route('admin.tags.index');
    }

    public function show(Tag $tag)
    {
        return view('admin.tag.show', compact('tag'));
    }

    public function edit(Tag $tag)
    {
        return view('admin.tag.edit', compact('tag'));
    }

    public function update(UpdateRequest $request, Tag $tag)
    {
        $data = $request->validated();

        $this->tagService->update($tag, $data);

        return redirect()->route('admin.tags.index');
    }

    public function destroy(Tag $tag)
    {
        $this->tagService->delete($tag);

        return redirect()->route('admin.tags.index');
    }
}
