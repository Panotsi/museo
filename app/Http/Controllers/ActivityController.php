<?php

namespace App\Http\Controllers;

use App\Models\Activity;

class ActivityController
{
    public function show($id)
    {
        //looks for the activity id
        $activity = Activity::findOrFail($id);

        //sends activity data to the view
        return view('museum.show', compact('activity'));
    }
}