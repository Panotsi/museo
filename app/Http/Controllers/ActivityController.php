<?php

namespace App\Http\Controllers;

use App\Models\Activity;

class ActivityController
{
    public function show($id)
    {
        $activity = Activity::findOrFail($id);

        return view('museum.show', compact('activity'));
    }
}