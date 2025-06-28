<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CmsPageRequest;
use App\Models\CmsPage;
use Illuminate\Http\Request;

class CmsController extends Controller
{
    public function index()
    {
        $pages = CmsPage::latest()->paginate(10);
        return view('admin.cms.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.cms.create');
    }

    public function store(CmsPageRequest $request)
    {
        CmsPage::create($request->validated());
        return redirect()->route('admin.cms.index')
            ->with('success', 'Page created successfully');
    }

    public function edit(CmsPage $page)
    {
        return view('admin.cms.edit', compact('page'));
    }

    public function update(CmsPageRequest $request, CmsPage $page) // Changed $cm to $page
    {
        $page->update($request->validated()); // Now uses the correctly bound $page model
        return redirect()->route('admin.cms.index')
            ->with('success', 'Page updated successfully');
    }

    public function show(CmsPage $page)
    {
        // Only show active pages to non-admin users
        if (!auth()->user()?->hasRole('admin') && !$page->is_active) {
            abort(404);
        }

        // Set meta tags for SEO
        $meta = [
            'title' => $page->meta_title ?? $page->title,
            'description' => $page->meta_description,
            'keywords' => ''
        ];

        return view('pages.show', compact('page', 'meta'));
    }

    public function destroy(CmsPage $page)
    {
        $page->delete();
        return redirect()->route('admin.cms.index')
            ->with('success', 'Page deleted successfully');
    }
}
