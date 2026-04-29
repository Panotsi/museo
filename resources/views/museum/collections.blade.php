<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collections</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/collection.css') }}">
</head>

<body>
<div class="container py-5">

    <h1 class="mb-4 fw-bold title">Museum Collections</h1>

    <form method="GET" action="{{ route('collections') }}" class="mb-4">
        <input type="text" name="search" class="form-control search-box" placeholder="Search artifact...">
    </form>

    <div class="table-responsive">
        <table class="table-custom align-middle">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Material</th>
                    <th>Type</th>
                    <th>View</th>
                </tr>
            </thead>

            <tbody>
                @foreach($artifacts as $artifact)
                <tr>
                    <td>
                        @if($artifact->images->first())
                            <img src="{{ asset('storage/'.$artifact->images->first()->image) }}" class="table-img">
                        @else
                            <img src="{{ asset('images/no-image.png') }}" class="table-img">
                        @endif
                    </td>

                    <td>{{ $artifact->name_of_object }}</td>
                    <td>{{ $artifact->material }}</td>
                    <td>{{ $artifact->type }}</td>

                    <td>
                        <a href="{{ route('artifact.show', $artifact->id) }}" class="btn btn-view btn-sm">
                            View
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    <div class="mt-3">
        {{ $artifacts->links() }}
    </div>

</div>
</body>
</html>