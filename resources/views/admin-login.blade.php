<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">
    <div class="container mt-5" style="max-width:400px;">
        <h2 class="mb-4 text-center">Admin Login</h2>
        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
    <form method="POST" action="/admin-login">
        @csrf

        <input type="email" name="email" class="form-control mb-3" placeholder="Email">
        <input type="password" name="password" class="form-control mb-3" placeholder="Password">
        <button class="btn btn-warning w-100">
        Login
        </button>
    </form>
    </div>
</body>
</html>
