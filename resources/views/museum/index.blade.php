<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambobong</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Tambobong</a>
            <!--for mobile toggle button-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Exhibits</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Visit</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!--bootstrap carousel-->
    <div id="museumCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <!--loops through slides from the controller-->
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
        <div class="carousel-inner">
            @foreach($slides as $key => $slide)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" data-bs-interval="5000">
                    <!--displays the content of the $slide from controller-->
                    <img src="{{ $slide['image'] }}" alt="{{ $slide['title'] }}">
                    <div class="carousel-caption">
                        <h1>{{ $slide['title'] }}</h1>
                        <p>{{ $slide['description'] }}</p>
                        <a href="{{ $slide['button_link'] }}" class="btn btn-custom">
                            {{ $slide['button_text'] }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#museumCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#museumCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <section id="about" class="about-section text-center">
        <div class="container">
            <h1 class="modern-font">Tambobong</h1>
            <p class="about-subtitle">Museo kan Agrikulturang Bikolnon</p>
            <hr>
            <p class="about-p">The tambobong is more than a structure; it is a symbol of Bikolnon foresight. 
                Traditionally a small cottage designed to keep rice and other harvest secured, it stands 
                as the heart of our agricultural heritage. This museum preserves that legacy,
                showcasing the unique landscapes and practices that have shaped the Bikol Region’s
                evelopment.
            </p>
            <p class="about-p">
                We celebrate the paratanom and parasirà—the farmers and fishermen whose labor 
                forms the backbone of our food security. Through their struggles and triumphs, and the 
                vital initiatives of the Department of Agriculture, we see the true engine of 
                nation-building. Agriculture is our lifeblood; here, we honor the hands that feed the 
                community and the soil that sustains us all.
            </p>
        </div>
    </section>

       <section id="activities" class="activity-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="section-title fw-bold">Upcoming Activities</h2>
                    <p class="text-muted">Discover events and programs at Tambobong Museum</p>
                </div>
            </div>
            <div class="row g-4 justify-content-center">
                <!--loops through the activities from the database-->
                @forelse($activities as $activity)
                    <div class="col-lg-4 col-md-6">
                        <div class="activity-card">
                            <div class="img-container">
                                <!--displays the image from storage folder-->
                                <img src="{{ asset('storage/' . $activity->image) }}" alt="{{ $activity->title }}">
                                <div class="img-overlay"></div>
                            </div>
                            
                            <div class="card-content">
                                <span class="date-badge">
                                    <!--usage of carbon formating method-->
                                    {{ \Carbon\Carbon::parse($activity->date)->format('M d, Y') }}
                                </span>
                                <h3 class="title">{{ $activity->title }}</h3>
                                <!--limits the characters that is shown in the description in the index page-->
                                <p class="description">{{ Str::limit($activity->description, 100) }}</p>
                                <a href="{{ route('museum.activity', $activity->id) }}" class="read-more-btn">Read More →</a>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>