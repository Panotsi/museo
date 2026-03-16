<!DOCTYPE html>
<html>
<head>
<title>Collections</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="bg-dark text-light">

<div class="container mt-5">

<h1 class="mb-4">Museum Collections</h1>

<form method="GET" action="{{ route('collections') }}" class="mb-4">

<input type="text" name="search" class="form-control" placeholder="Search artifact...">

</form>

<table class="table table-dark table-striped">

<thead>
<tr>
<th>Accession Number</th>
<th>Name</th>
<th>Material</th>
<th>Type</th>
<th>View</th>
</tr>
</thead>

<tbody>

@foreach($artifacts as $artifact)

<tr>
<td>{{ $artifact->accession_number }}</td>
<td>{{ $artifact->name_of_object }}</td>
<td>{{ $artifact->material }}</td>
<td>{{ $artifact->type }}</td>

<td>
<a href="{{ route('artifact.show', $artifact->id) }}" class="btn btn-warning btn-sm">
View
</a>
</td>

</tr>

@endforeach

</tbody>

</table>

{{ $artifacts->links() }}

</div>

</body>
</html>