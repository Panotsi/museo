<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Title</title>
</head>
<body>
    <div class="container mt-5">

<h1>{{ $artifact->name_of_object }}</h1>
@if($artifact->image)
<img src="{{ asset('storage/'.$artifact->image) }}" width="300">
@endif
<p><strong>Accession Number:</strong> {{ $artifact->accession_number }}</p>
<p><strong>Material:</strong> {{ $artifact->material }}</p>
<p><strong>Type:</strong> {{ $artifact->type }}</p>

<h3>Measurements</h3>

<ul>
<li>Length: {{ $artifact->length_cm }} cm</li>
<li>Height: {{ $artifact->height_cm }} cm</li>
<li>Width: {{ $artifact->width_cm }} cm</li>
<li>Rim Diameter: {{ $artifact->rim_diameter_cm }} cm</li>
<li>Base Diameter: {{ $artifact->base_diameter_cm }} cm</li>
<li>Thickness: {{ $artifact->thickness_cm }} cm</li>
</ul>

<h3>Conservation</h3>

<p><b>Before Treatment:</b> {{ $artifact->condition_before }}</p>

<p><b>Process:</b> {{ $artifact->conservation_process }}</p>

<p><b>After Treatment:</b> {{ $artifact->condition_after }}</p>

</div>

</body>
</html>
