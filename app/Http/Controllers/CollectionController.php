<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artifact;

class CollectionController
{
    public function index(Request $request)
    {
        $search = $request->search;

        $artifacts = Artifact::when($search, function ($query) use ($search) {
            $query->where('name_of_object', 'like', "%$search%")
                  ->orWhere('material', 'like', "%$search%")
                  ->orWhere('type', 'like', "%$search%");
        })->paginate(10);

        return view('museum.collections', compact('artifacts'));
    }

    public function show($id)
    {
        $artifact = Artifact::findOrFail($id);

        return view('museum.artifact', compact('artifact'));
    }
}