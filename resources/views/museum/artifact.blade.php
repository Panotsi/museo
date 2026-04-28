<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/artifact.css') }}" rel="stylesheet">
    <title>Artifact</title>
</head>
<body>
    <div class="container">
        <h1>{{ $artifact->name_of_object }}</h1>
        <p class="impDetails"><strong>Accession Number:</strong> {{ $artifact->accession_number }}</p>
        <p class="impDetails"><strong>Material:</strong> {{ $artifact->material }}</p>
        <p class="impDetails"><strong>Type:</strong> {{ $artifact->type }}</p>
        <div class="disContainer">
            <div class="model">
                @if($artifact->model_3d)
                <!-- 3D MODEL -->
                <model-viewer
                    src="{{ asset('storage/'.$artifact->model_3d) }}"
                    camera-controls
                    auto-rotate
                    class="artifact-viewer">
                </model-viewer>
                @elseif($artifact->images->count() > 0)

                <!-- IMAGE CAROUSEL -->
                <div id="artifactCarousel" class="carousel slide artifact-carousel" data-bs-ride="carousel">

                    <div class="carousel-inner">

                    @foreach($artifact->images as $key => $img)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img src="{{ asset('storage/'.$img->image) }}" class="carousel-img">
                        </div>
                    @endforeach

                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#artifactCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>

                    <button class="carousel-control-next" type="button" data-bs-target="#artifactCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                    </div>

                    @endif

                </div>
            <div class=measurement>
                <h3>Measurements</h3>
                <ul>
                    @if(!is_null($artifact->length_cm))
                        <li>Length: {{ $artifact->length_cm }} cm</li>
                    @endif
                    @if(!is_null($artifact->height_cm))
                        <li>Height: {{ $artifact->height_cm }} cm</li>
                    @endif
                    @if(!is_null($artifact->width_cm))
                        <li>Width: {{ $artifact->width_cm }} cm</li>
                    @endif
                    @if(!is_null($artifact->rim_diameter_cm))
                        <li>Rim Diameter: {{ $artifact->rim_diameter_cm }} cm</li>
                    @endif
                    @if(!is_null($artifact->base_diameter_cm))
                        <li>Base Diameter: {{ $artifact->base_diameter_cm }} cm</li>
                    @endif
                    @if(!is_null($artifact->thickness_cm))
                        <li>Thickness: {{ $artifact->thickness_cm }} cm</li>
                    @endif
                </ul>
            </div>
        </div>

<h3>Conservation</h3>

<p><b>Before Treatment:</b> {{ $artifact->condition_before }}</p>

<p><b>Process:</b> {{ $artifact->conservation_process }}</p>

<p><b>After Treatment:</b> {{ $artifact->condition_after }}</p>
    </div>

<script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
