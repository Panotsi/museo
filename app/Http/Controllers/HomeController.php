<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Artifact;
use App\Models\Slide;
use App\Models\Publication;

class HomeController
{
    public function index()
    {
        $slides = Slide::all(); // ✅ correct place
        //to get the activities from the database on ascending order by date
        $activities = Activity::orderBy('date', 'asc')->get();

        $artifacts = Artifact::with('images')->latest()->take(3)->get();

        $publications = Publication::latest()->take(10)->get();

        //to return the index page and pass the data to the view
        return view('museum.index', compact('slides', 'activities', 'artifacts', 'publications'));

    }
}
