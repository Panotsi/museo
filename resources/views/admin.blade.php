<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>
<div class="container mt-4">

    <h1 class="mb-4 text-center text-md-start">Museum Admin Dashboard</h1>

    <!-- ADD ACTIVITY -->
    <div class="section-box">
        <h3>Add Activity</h3>
        <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addModal">
            + Add Activity
        </button>
    </div>

    <!-- ACTIVITIES -->
    <div class="section-box">
        <h3>Activities</h3>

        <div class="table-responsive">
        <table class="table table-dark table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Title</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach($activities as $activity)
            <tr>
                <td>{{ $activity->id }}</td>

                <td>
                    @if($activity->image)
                        <img src="{{ asset('storage/'.$activity->image) }}" width="50" height="50">
                    @endif
                </td>

                <td>{{ $activity->title }}</td>
                <td>{{ $activity->date }}</td>

                <td>
                    <button 
                        class="btn btn-primary btn-sm editBtn"
                        data-id="{{ $activity->id }}"
                        data-title="{{ $activity->title }}"
                        data-description="{{ $activity->description }}"
                        data-date="{{ $activity->date }}"
                        data-image="{{ $activity->image }}"
                        data-bs-toggle="modal"
                        data-bs-target="#editModal">
                        Edit
                    </button>

                    <a href="/admin/activity/delete/{{ $activity->id }}" class="btn btn-danger btn-sm">
                        Delete
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>

    <!-- ARTIFACTS -->
    <div class="section-box">
        <h3>Artifacts</h3>

        <a href="/admin/artifact/create" class="btn btn-success mb-3">
            + Add Artifact
        </a>

        <div class="table-responsive">
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
                  @if($artifact->images->first())
                    <img src="{{ asset('storage/'.$artifact->images->first()->image) }}" width="50" height="50">
                  @endif
                </td>

                <td>{{ $artifact->accession_number }}</td>
                <td>{{ $artifact->name_of_object }}</td>
                <td>{{ $artifact->material }}</td>
                <td>{{ $artifact->type }}</td>

                <td>
                    <a href="/admin/artifact/edit/{{ $artifact->id }}" class="btn btn-primary btn-sm">Edit</a>
                    <a href="/admin/artifact/delete/{{ $artifact->id }}" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>

    <!--For Carousel-->
    <div class="section-box">
    <h3>Carousel Slides</h3>

    <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#slideModal">
        + Add Slide
    </button>

    <div class="table-responsive">
        <table class="table table-dark table-striped align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Preview</th>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
            @foreach($slides as $slide)
            <tr>
                <td>{{ $slide->id }}</td>

                <td>
                    <img src="{{ asset('storage/'.$slide->image) }}" class="slide-img">
                </td>

                <td>{{ $slide->title }}</td>

                <td>
                    <div class="d-flex gap-2 flex-wrap">
                        <button 
                            class="btn btn-primary btn-sm editSlideBtn"
                            data-id="{{ $slide->id }}"
                            data-title="{{ $slide->title }}"
                            data-description="{{ $slide->description }}"
                            data-button_text="{{ $slide->button_text }}"
                            data-button_link="{{ $slide->button_link }}"
                            data-image="{{ $slide->image }}"
                            data-bs-toggle="modal"
                            data-bs-target="#editSlideModal">
                            Edit
                        </button>

                        <a href="/admin/slide/delete/{{ $slide->id }}" class="btn btn-danger btn-sm">
                            Delete
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>


<div class="section-box">
    <h3>Publications</h3>

    <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#publicationModal">
        + Add Publication
    </button>

    <div class="table-responsive">
        <table class="table table-dark table-striped align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>PDF</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($publications as $pub)
                <tr>
                    <td>{{ $pub->id }}</td>

                    <td>
                        <img src="{{ asset('storage/'.$pub->image) }}" width="60" height="60" style="object-fit: cover; border-radius: 8px;">
                    </td>

                    <td>{{ $pub->title }}</td>

                    <td>
                        {{ Str::limit($pub->description, 50) }}
                    </td>

                    <td>
                        <a href="{{ asset('storage/'.$pub->pdf) }}" target="_blank" class="btn btn-warning btn-sm">
                            View
                        </a>
                    </td>

                    <td>
                      <div class="d-flex gap-2 flex-wrap">
                      <button
                        class="btn btn-primary btn-sm editPublicationBtn"
                        data-id="{{ $pub->id }}"
                        data-title="{{ $pub->title }}"
                        data-description="{{ $pub->description }}"
                        data-bs-toggle="modal"
                        data-bs-target="#editPublicationModal">
                        Edit
                      </button>
                      <form action="{{ route('admin.publications.delete', $pub->id) }}" method="POST" onsubmit="return confirm('Delete this publication?')">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm">
                          Delete
                        </button>
                      </form>
                      </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</div>

<!-- ADD MODAL -->
<div class="modal fade" id="addModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark text-light">

      <form action="/admin/activity/store" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="modal-header">
          <h5>Add Activity</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <input type="text" name="title" class="form-control mb-2" placeholder="Title" required>
          <textarea name="description" class="form-control mb-2" placeholder="Description"></textarea>
          <input type="date" name="date" class="form-control mb-2" required>
          <input type="file" name="image" class="form-control">
        </div>

        <div class="modal-footer">
          <button class="btn btn-success w-100">Save</button>
        </div>

      </form>

    </div>
  </div>
</div>

<!-- EDIT MODAL -->
<div class="modal fade" id="editModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark text-light">

      <form id="editForm" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="modal-header">
          <h5>Edit Activity</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <input type="text" id="editTitle" name="title" class="form-control mb-2" required>
          <textarea id="editDescription" name="description" class="form-control mb-2"></textarea>
          <input type="date" id="editDate" name="date" class="form-control mb-2" required>

          <img id="editImagePreview" class="mb-2" width="100">

          <input type="file" name="image" class="form-control">
        </div>

        <div class="modal-footer">
          <button class="btn btn-warning w-100">Update</button>
        </div>

      </form>

    </div>
  </div>
</div>
<!--Modal for slide-->
<div class="modal fade" id="editSlideModal">
  <div class="modal-dialog">
    <div class="modal-content bg-dark text-light">

      <form id="editSlideForm" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="modal-header">
          <h5>Edit Slide</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <input type="text" id="editSlideTitle" name="title" class="form-control mb-2" required>
          <textarea id="editSlideDescription" name="description" class="form-control mb-2"></textarea>
          <input type="text" id="editSlideButtonText" name="button_text" class="form-control mb-2">
          <input type="text" id="editSlideButtonLink" name="button_link" class="form-control mb-2">

          <img id="editSlideImagePreview" width="100" class="mb-2">

          <input type="file" name="image" class="form-control">
        </div>

        <div class="modal-footer">
          <button class="btn btn-warning w-100">Update</button>
        </div>

      </form>

    </div>
  </div>
</div>

<div class="modal fade" id="slideModal">
  <div class="modal-dialog">
    <div class="modal-content bg-dark text-light">

      <form action="/admin/slide/store" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="modal-header">
          <h5>Add Slide</h5>
        </div>

        <div class="modal-body">
          <input type="text" name="title" class="form-control mb-2" placeholder="Title" required>
          <textarea name="description" class="form-control mb-2" placeholder="Description"></textarea>
          <input type="text" name="button_text" class="form-control mb-2" placeholder="Button Text">
          <input type="text" name="button_link" class="form-control mb-2" placeholder="Button Link">
          <input type="file" name="image" class="form-control" required>
        </div>

        <div class="modal-footer">
          <button class="btn btn-success w-100">Save</button>
        </div>

      </form>

    </div>
  </div>
</div>

<div class="modal fade" id="publicationModal">
  <div class="modal-dialog">
    <div class="modal-content bg-dark text-light">

      <form action="{{ route('admin.publications.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="modal-header">
          <h5>Add Publication</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <input type="text" name="title" class="form-control mb-2" placeholder="Title" required>
          <textarea name="description" class="form-control mb-2" placeholder="Description"></textarea>
          <label for="image">Image</label>
          <input type="file" name="image" id="image" class="form-control mb-2" required>
          <label for="pdf">PDF</label>
          <input type="file" name="pdf" id="pdf" class="form-control" required>
        </div>

        <div class="modal-footer">
          <button class="btn btn-success w-100">Save</button>
        </div>

      </form>

    </div>
  </div>
</div>

<div class="modal fade" id="editPublicationModal">
  <div class="modal-dialog">
    <div class="modal-content bg-dark text-light">

      <form id="editPublicationForm" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="modal-header">
          <h5>Edit Publication</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <input type="text" id="editPubTitle" name="title" class="form-control mb-2" required>

          <textarea id="editPubDescription" name="description" class="form-control mb-2"></textarea>
          <label for="image">Image</label>
          <input type="file" name="image" class="form-control mb-2" id="image">
          <label for="pdf">PDF</label>
          <input type="file" name="pdf" class="form-control" id="pdf">
        </div>

        <div class="modal-footer">
          <button class="btn btn-warning w-100">Update</button>
        </div>

      </form>

    </div>
  </div>
</div>

<!-- SCRIPTS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.querySelectorAll('.editBtn').forEach(button => {
    button.addEventListener('click', function () {

        document.getElementById('editTitle').value = this.dataset.title;
        document.getElementById('editDescription').value = this.dataset.description;
        document.getElementById('editDate').value = this.dataset.date;

        document.getElementById('editForm').action = `/admin/activity/update/${this.dataset.id}`;

        document.getElementById('editImagePreview').src = this.dataset.image 
            ? `/storage/${this.dataset.image}` 
            : '';
    });
});

document.querySelectorAll('.editSlideBtn').forEach(button => {
    button.addEventListener('click', function () {

        document.getElementById('editSlideTitle').value = this.dataset.title;
        document.getElementById('editSlideDescription').value = this.dataset.description;
        document.getElementById('editSlideButtonText').value = this.dataset.button_text;
        document.getElementById('editSlideButtonLink').value = this.dataset.button_link;

        document.getElementById('editSlideForm').action = `/admin/slide/update/${this.dataset.id}`;

        document.getElementById('editSlideImagePreview').src = this.dataset.image 
            ? `/storage/${this.dataset.image}` 
            : '';
    });
});

document.querySelectorAll('.editPublicationBtn').forEach(button => {
    button.addEventListener('click', function () {

        document.getElementById('editPubTitle').value = this.dataset.title;
        document.getElementById('editPubDescription').value = this.dataset.description;

        document.getElementById('editPublicationForm').action =
            `/admin/publications/update/${this.dataset.id}`;
    });
});
</script>
<a href="/logout" class="btn btn-danger" style="margin: 1rem auto; display: block; width: 100px;">Logout</a>
</body>
</html>