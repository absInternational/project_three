<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function index()
    {
        $links = Link::all();
        return view('links.index', compact('links'));
    }

    public function create()
    {
        return view('links.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'link' => 'required|url',
            'description' => 'nullable|string',
        ]);

        Link::create([
            'user_id' => auth()->id(),
            'link' => $request->link,
            'description' => $request->description,
            'status' => 1
        ]);

        return redirect()->route('links.index')->with('success', 'Link created successfully.');
    }

    public function show(Link $link)
    {
        return view('links.show', compact('link'));
    }

    public function edit(Link $link)
    {
        return view('links.edit', compact('link'));
    }

    public function update(Request $request, Link $link)
    {
        $request->validate([
            'link' => 'required|url',
            'description' => 'nullable|string',
            'status' => 'required|boolean'
        ]);

        $link->update($request->all());

        return redirect()->route('links.index')->with('success', 'Link updated successfully.');
    }

    public function destroy(Link $link)
    {
        $link->delete();
        return redirect()->route('links.index')->with('success', 'Link deleted successfully.');
    }
}
