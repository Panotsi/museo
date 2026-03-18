<!DOCTYPE html>
<html>
<head>
    <title>Verify OTP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">
    <div class="container mt-5" style="max-width:400px;">
        <h3 class="mb-4 text-center">Email Verification</h3>
        @if(session('error'))
            <div class="alert alert-danger">
            {{ session('error') }}
            </div>
        @endif
    <form method="POST" action="/verify-otp">
        @csrf
        <input type="text" name="otp" class="form-control mb-3" placeholder="Enter OTP code">
        <button class="btn btn-warning w-100">
            Verify
        </button>
    </form>
    </div>
</body>
</html>
