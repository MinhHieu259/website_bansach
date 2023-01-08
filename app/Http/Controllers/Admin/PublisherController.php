<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PublisherRequest;
use App\Models\Category;
use App\Models\Publisher;
use App\Services\PublisherService;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function __construct(PublisherService $publisherService)
    {
        $this->publisherService = $publisherService;
    }

    public function index() {
        $publishers = $this->publisherService->findAll();
        return view('components.admin.publishers.index', compact('publishers'));

    }

    public function create() {
        return view('components.admin.publishers.create');
    }

    public function store(PublisherRequest $request)
    {
        $data = $request->validated();
        $this->publisherService->save(($data));
        return redirect()->route('admin.publishers');
    }

    public function show(Publisher $publisher) {
        return view('components.admin.publishers.edit', compact('publisher'));
    }

    public function update(PublisherRequest $request, Publisher $publisher)
    {
        $request->validated();
        $publisher->update($request->all());
        return redirect()->route('admin.publishers');
    }

    public function destroy(Publisher $publisher)
    {
        $publisher->delete();
        return redirect()->route('admin.publishers');
    }
}
