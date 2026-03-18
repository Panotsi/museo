<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Artifact;

class AdminController
{

/* ADMIN PAGE */

public function index(Request $request)
{
    $activities = Activity::orderBy('date','asc')->get();
    $artifacts = Artifact::latest()->get();

    $editActivity = null;

    if($request->editActivity){
        $editActivity = Activity::find($request->editActivity);
    }

    return view('admin',compact(
        'activities',
        'artifacts',
        'editActivity'
    ));
}

/* ACTIVITY FUNCTIONS */

public function storeActivity(Request $request)
{
    $image = null;

    if($request->hasFile('image')){
        $image = $request->file('image')->store('activities','public');
    }

    Activity::create([
        'title'=>$request->title,
        'description'=>$request->description,
        'date'=>$request->date,
        'image'=>$image
    ]);

    return redirect('/admin');
}

public function updateActivity(Request $request,$id)
{
    $activity = Activity::findOrFail($id);

    $activity->update([
        'title'=>$request->title,
        'description'=>$request->description,
        'date'=>$request->date
    ]);

    return redirect('/admin');
}

public function deleteActivity($id)
{
    Activity::destroy($id);
    return redirect('/admin');
}

/* ARTIFACT FUNCTIONS */

public function createArtifact()
{
    return view('admin-artifact-create');
}

public function storeArtifact(Request $request)
{
    $image = null;
    $model = null;

    if($request->hasFile('model_3d')){
        $model = $request->file('model_3d')->store('model','public');
    }

    if($request->hasFile('image')){
        $image = $request->file('image')->store('artifacts','public');
    }

    Artifact::create([

        'accession_number'=>$request->accession_number,
        'name_of_object'=>$request->name_of_object,
        'material'=>$request->material,
        'type'=>$request->type,
        'remarks'=>$request->remarks,

        'excavation_site'=>$request->excavation_site,
        'excavation_date'=>$request->excavation_date,

        'date_recorded'=>$request->date_recorded,
        'recorded_by'=>$request->recorded_by,

        'length_cm'=>$request->length_cm,
        'height_cm'=>$request->height_cm,
        'width_cm'=>$request->width_cm,
        'rim_diameter_cm'=>$request->rim_diameter_cm,
        'base_diameter_cm'=>$request->base_diameter_cm,
        'thickness_cm'=>$request->thickness_cm,

        'condition_before'=>$request->condition_before,
        'conservation_process'=>$request->conservation_process,
        'condition_after'=>$request->condition_after,

        'image'=>$image,
        'model_3d'=>$model
    ]);

    return redirect('/admin');

}


public function editArtifact($id)
{
    $artifact = Artifact::findOrFail($id);
    return view('admin-artifact-edit',compact('artifact'));
}

public function updateArtifact(Request $request,$id)
{
    $artifact = Artifact::findOrFail($id);

    $image = $artifact->image;

    $model = $artifact->model_3d;

    if($request->hasFile('model_3d')){
        $model = $request->file('model_3d')->store('model','public');
    }

    if($request->hasFile('image')){
        $image = $request->file('image')->store('artifacts','public');
    }

    $artifact->update([

        'accession_number'=>$request->accession_number,
        'name_of_object'=>$request->name_of_object,
        'material'=>$request->material,
        'type'=>$request->type,
        'remarks'=>$request->remarks,

        'excavation_site'=>$request->excavation_site,
        'excavation_date'=>$request->excavation_date,

        'date_recorded'=>$request->date_recorded,
        'recorded_by'=>$request->recorded_by,

        'length_cm'=>$request->length_cm,
        'height_cm'=>$request->height_cm,
        'width_cm'=>$request->width_cm,
        'rim_diameter_cm'=>$request->rim_diameter_cm,
        'base_diameter_cm'=>$request->base_diameter_cm,
        'thickness_cm'=>$request->thickness_cm,

        'condition_before'=>$request->condition_before,
        'conservation_process'=>$request->conservation_process,
        'condition_after'=>$request->condition_after,

        'image'=>$image,
        'model_3d'=>$model
    ]);
    return redirect('/admin');
}

public function deleteArtifact($id)
{
    Artifact::destroy($id);
    return redirect('/admin');
}

}
