<!DOCTYPE html>
<html>

<head>

<title>Add Artifact</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-dark text-light">

<div class="container mt-5">

<h2>Add Artifact</h2>

<form action="/admin/artifact/store" method="POST" enctype="multipart/form-data">


@csrf
<h4>Artifact Image</h4>

<input type="file" name="image" class="form-control mb-3">


<!-- BASIC INFORMATION -->

<h4 class="mt-4">Basic Information</h4>

<input type="text" name="accession_number" class="form-control mb-2" placeholder="Accession Number">

<input type="text" name="name_of_object" class="form-control mb-2" placeholder="Name of Object">

<input type="text" name="material" class="form-control mb-2" placeholder="Material">

<input type="text" name="type" class="form-control mb-2" placeholder="Type">

<textarea name="remarks" class="form-control mb-3" placeholder="Remarks"></textarea>

<!-- EXCAVATION -->

<h4>Excavation Information</h4>

<input type="text" name="excavation_site" class="form-control mb-2" placeholder="Excavation Site">

<input type="date" name="excavation_date" class="form-control mb-3">

<!-- RECORD -->

<h4>Record Information</h4>

<input type="date" name="date_recorded" class="form-control mb-2">

<input type="text" name="recorded_by" class="form-control mb-3" placeholder="Recorded By">

<!-- MEASUREMENTS -->

<h4>Measurements (cm)</h4>

<input type="number" step="0.01" name="length_cm" class="form-control mb-2" placeholder="Length">

<input type="number" step="0.01" name="height_cm" class="form-control mb-2" placeholder="Height">

<input type="number" step="0.01" name="width_cm" class="form-control mb-2" placeholder="Width">

<input type="number" step="0.01" name="rim_diameter_cm" class="form-control mb-2" placeholder="Rim Diameter">

<input type="number" step="0.01" name="base_diameter_cm" class="form-control mb-2" placeholder="Base Diameter">

<input type="number" step="0.01" name="thickness_cm" class="form-control mb-3" placeholder="Thickness">

<!-- CONSERVATION -->

<h4>Conservation</h4>

<textarea name="condition_before" class="form-control mb-2" placeholder="Condition Before"></textarea>

<textarea name="conservation_process" class="form-control mb-2" placeholder="Conservation Process"></textarea>

<textarea name="condition_after" class="form-control mb-3" placeholder="Condition After"></textarea>

<button class="btn btn-success">
Save Artifact
</button>

<a href="/admin" class="btn btn-secondary">
Cancel
</a>

</form>

</div>

</body>

</html>
