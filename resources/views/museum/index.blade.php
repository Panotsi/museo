<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambobong</title>
    
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Tambobong</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Exhibits</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Visit</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Slideshow Section -->
    <div id="museumCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        
        <!-- Indicators -->
        <div class="carousel-indicators">
            @foreach($slides as $key => $slide)
                <button type="button" 
                    data-bs-target="#museumCarousel" 
                    data-bs-slide-to="{{ $key }}" 
                    class="{{ $key == 0 ? 'active' : '' }}" 
                    aria-current="{{ $key == 0 ? 'true' : 'false' }}" 
                    aria-label="Slide {{ $key + 1 }}">
                </button>
            @endforeach
        </div>

        <!-- Slides Wrapper -->
        <div class="carousel-inner">
            @foreach($slides as $key => $slide)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" data-bs-interval="5000">
                    <img src="{{ $slide['image'] }}" alt="{{ $slide['title'] }}">
                    
                    <div class="carousel-caption">
                        <h1 class="display-4 fw-bold">{{ $slide['title'] }}</h1>
                        <p class="lead d-none d-md-block">{{ $slide['description'] }}</p> <!-- Hidden on small mobile -->
                        <a href="{{ $slide['button_link'] }}" class="btn btn-custom mt-3">
                            {{ $slide['button_text'] }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#museumCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#museumCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- About Section -->
    <section id="about" class="about-section">
        <div class="container">
            <h1 class="modern-font">Tambobong</h1>
            <p class="about-subtitle">Museo kan Agrikulturang Bikolnon</p>
        </div>
    </section>

    <!-- Activity Section -->
    <section id="activities" class="activity-section">
        <div class="container">
            
            <!-- Section Header -->
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="section-title fw-bold">Upcoming Activities</h2>
                    <p class="text-muted">Discover events and programs at Tambobong Museum</p>
                </div>
            </div>

            <!-- Activities Grid -->
            <div class="row g-4 justify-content-center">
                
                @forelse($activities as $activity)
                    <div class="col-lg-4 col-md-6">
                        <div class="activity-card">
                            <div class="img-container">
                                <img src="{{ asset('storage/' . $activity->image) }}" alt="{{ $activity->title }}">
                                <div class="img-overlay"></div>
                            </div>
                            
                            <div class="card-content">
                                <span class="date-badge">
                                    {{ \Carbon\Carbon::parse($activity->date)->format('M d, Y') }}
                                </span>
                                <h3 class="title">{{ $activity->title }}</h3>
                                <p class="description">{{ Str::limit($activity->description, 100) }}</p>
                                <a href="{{ route('museum.show', $activity->id) }}" class="read-more-btn">
                                    Read More →
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>No upcoming activities found.</p>
                    </div>
                @endforelse

            </div>
        </div>
    </section>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>