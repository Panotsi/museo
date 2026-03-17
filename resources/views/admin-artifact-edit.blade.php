<!DOCTYPE html>
<html>
<head>
    <title>Edit Artifact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">
<div class="container mt-5">
    <h2>Edit Artifact</h2>
    <form action="/admin/artifact/update/{{ $artifact->id }}" method="POST" enctype="multipart/form-data">
    @csrf
        <label>Artifact Image</label><br>
        @if($artifact->image)
        <img src="{{ asset('storage/'.$artifact->image) }}" 
        class="card-img-top"
        style="width: 200px;">
        @endif
        <input type="file" name="image" class="form-control mb-3">
        <label>3D Model</label>
            @if($artifact->model_3d)
            <model-viewer
            src="{{ asset('storage/'.$artifact->model_3d) }}"
            camera-controls
            auto-rotate
            style="width:200px;">
            </model-viewer>
            @endif
        <input type="file" name="model_3d" class="form-control mb-3">

    <h4>Basic Information</h4>

        <input type="text" name="accession_number" class="form-control mb-2"
        value="{{ $artifact->accession_number }}">
        
        <input type="text" name="name_of_object" class="form-control mb-2"
        value="{{ $artifact->name_of_object }}">
        
        <input type="text" name="material" class="form-control mb-2"
        value="{{ $artifact->material }}">

        <input type="text" name="type" class="form-control mb-2"
        value="{{ $artifact->type }}">
    
        <textarea name="remarks" class="form-control mb-3">{{ $artifact->remarks }}</textarea>

    <h4>Excavation Information</h4>

        <input type="text" name="excavation_site" class="form-control mb-2"
        value="{{ $artifact->excavation_site }}">

        <input type="date" name="excavation_date" class="form-control mb-3"
        value="{{ $artifact->excavation_date }}">

    <h4>Record Information</h4>

        <input type="date" name="date_recorded" class="form-control mb-2"
        value="{{ $artifact->date_recorded }}">

        <input type="text" name="recorded_by" class="form-control mb-3"
        value="{{ $artifact->recorded_by }}">

    <h4>Measurements</h4>

        <input type="number" step="0.01" name="length_cm" class="form-control mb-2"
        value="{{ $artifact->length_cm }}">

        <input type="number" step="0.01" name="height_cm" class="form-control mb-2"
        value="{{ $artifact->height_cm }}">

        <input type="number" step="0.01" name="width_cm" class="form-control mb-2"
        value="{{ $artifact->width_cm }}">

        <input type="number" step="0.01" name="rim_diameter_cm" class="form-control mb-2"
        value="{{ $artifact->rim_diameter_cm }}">

        <input type="number" step="0.01" name="base_diameter_cm" class="form-control mb-2"
        value="{{ $artifact->base_diameter_cm }}">

        <input type="number" step="0.01" name="thickness_cm" class="form-control mb-3"
        value="{{ $artifact->thickness_cm }}">

    <h4>Conservation</h4>

        <textarea name="condition_before" class="form-control mb-2">{{ $artifact->condition_before }}</textarea>

        <textarea name="conservation_process" class="form-control mb-2">{{ $artifact->conservation_process }}</textarea>

        <textarea name="condition_after" class="form-control mb-3">{{ $artifact->condition_after }}</textarea>

        <button class="btn btn-warning">
        Update Artifact
        </button>

        <a href="/admin" class="btn btn-secondary">
        Cancel
        </a>
    </form>
</div>
<script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
</body>
</html>
