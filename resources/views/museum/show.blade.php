<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $activity->title }}</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="{{ asset('css/activity.css') }}" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-12">
            
            <div class="page-wrapper">
                
                <!-- Title -->
                <h1 class="activity-title">{{ $activity->title }}</h1>
                
                <!-- Date -->
                <p class="activity-date">
                    {{ \Carbon\Carbon::parse($activity->date)->format('F d, Y') }}
                </p>
                
                <!-- Image -->
                <div class="image-container">
                    <img src="{{ asset('storage/' . $activity->image) }}" 
                         alt="{{ $activity->title }}">
                </div>
                
                <!-- Description -->
                <p class="activity-description">
                    {{ $activity->description }}
                </p>
                
                <!-- Back Button -->
                <a href="{{ url('/') }}" class="btn-back">
                    ← Back to Home
                </a>
                
            </div>
            
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>