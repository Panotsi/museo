<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Museum Publications</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/publication.css') }}">
</head>

<body>

<div class="container py-4">

    <h1 class="page-title">Museum Publications</h1>

    <div class="pub-grid">

        @foreach($publications as $pub)
        <a href="{{ asset('storage/'.$pub->pdf) }}" target="_blank" class="pub-card">

            <div class="img-wrapper">
                <img src="{{ asset('storage/'.$pub->image) }}" alt="{{ $pub->title }}">

                <div class="overlay">
                    <span>View</span>
                </div>
            </div>

        </a>
        @endforeach

    </div>

</div>

</body>
</html>