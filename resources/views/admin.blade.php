<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">
    <div class="container mt-5">
        <h1 class="mb-4">Museum Admin Dashboard</h1>
        <!-- ADD ACTIVITY -->
        <h3>Add Activity</h3>
        <form action="/admin/activity/store" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="title" class="form-control mb-2" placeholder="Title">
            <textarea name="description" class="form-control mb-2" placeholder="Description"></textarea>
            <input type="date" name="date" class="form-control mb-2">
            <input type="file" name="image" class="form-control mb-3">
            <button class="btn btn-success">Add Activity</button>
        </form>
        <hr>

<!-- ACTIVITIES TABLE -->

    <h3>Activities</h3>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($activities as $activity)
            <tr>
                <td>{{ $activity->id }}</td>
                <td>{{ $activity->title }}</td>
                <td>{{ $activity->date }}</td>
                <td>
                <a href="/admin?editActivity={{ $activity->id }}" class="btn btn-primary btn-sm">
                Edit
                </a>
                <a href="/admin/activity/delete/{{ $activity->id }}" class="btn btn-danger btn-sm">
                Delete
                </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

<!-- EDIT ACTIVITY -->

    @if($editActivity)
    <hr>
    <h3>Edit Activity</h3>
        <form action="/admin/activity/update/{{ $editActivity->id }}" method="POST">
        @csrf
            <input type="text" name="title" class="form-control mb-2"
            value="{{ $editActivity->title }}">
            <textarea name="description" class="form-control mb-2">{{ $editActivity->description }}</textarea>
            <input type="date" name="date" class="form-control mb-3"
            value="{{ $editActivity->date }}">
            <button class="btn btn-warning">Update</button>
            <a href="/admin" class="btn btn-secondary">
            Cancel
            </a>
        </form>
    @endif
    
    <hr>

<!-- ARTIFACT SECTION -->

    <h3>Artifacts</h3>

        <a href="/admin/artifact/create" class="btn btn-success mb-3">
        Add Artifact
        </a>

        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Accession</th>
                    <th>Name</th>
                    <th>Material</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($artifacts as $artifact)
                <tr>
                    <td>{{ $artifact->id }}</td>
                    <td>
                @if($artifact->image)
                    <img src="{{ asset('storage/'.$artifact->image) }}" 
                    class="card-img-top"
                    style="width: 50px; height: 50px;">
                @endif
                    </td>
                    <td>{{ $artifact->accession_number }}</td>
                    <td>{{ $artifact->name_of_object }}</td>
                    <td>{{ $artifact->material }}</td>
                    <td>{{ $artifact->type }}</td>
                    <td>
                    <a href="/admin/artifact/edit/{{ $artifact->id }}" class="btn btn-primary btn-sm">
                    Edit
                    </a>
                    <a href="/admin/artifact/delete/{{ $artifact->id }}" class="btn btn-danger btn-sm">
                    Delete
                    </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
</body>
</html>
