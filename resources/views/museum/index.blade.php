<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambobong - Museo kan Agrikulturang Bikolnon</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <!-- Favicon -->
     <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-dark text-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Tambobong</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#activities">Activities</a></li>
                    <li class="nav-item"><a class="nav-link" href="#collections">Collections</a></li>
                    <li class="nav-item"><a class="nav-link" href="#visit">Visit</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contacts">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Carousel (Home) -->
    <div id="museumCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
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
        <div class="carousel-inner">
            @foreach($slides as $key => $slide)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" data-bs-interval="5000">
                    <img src="{{ asset('storage/'.$slide->image) }}">
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

    <!-- About Section -->
    <section id="about" class="about-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <span class="about-subtitle">Our Heritage</span>
                    <h1 class="modern-font mb-4">Preserving the Soul of Bicol</h1>
                    <p class="about-p">
                        The tambobong is more than a structure; it is a symbol of Bikolnon foresight. 
                        Traditionally a small cottage designed to keep rice and other harvest secured, it stands 
                        as the heart of our agricultural heritage. This museum preserves that legacy,
                        showcasing the unique landscapes and practices that have shaped the Bikol Region's
                        development.
                    </p>
                    <p class="about-p">
                        We celebrate the paratanom and parasirà—the farmers and fishermen whose labor 
                        forms the backbone of our food security. Agriculture is our lifeblood; here, we honor 
                        the hands that feed the community and the soil that sustains us all.
                    </p>
                </div>
                <div class="col-lg-6">
                    <div class="about-image-wrapper">
                        <!-- Replace with your actual image path -->
                        <img src="{{ asset('images/logo.png') }}" 
                        alt="Tambobong Heritage" class="img-fluid rounded shadow-lg">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Activities Section -->
    <section id="activities" class="activity-section">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-12">
                    <h2 class="section-title fw-bold">Upcoming Activities</h2>
                    <p class="text-light">Discover events and programs at Tambobong Museum</p>
                </div>
            </div>
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
                                <a href="{{ route('museum.activity', $activity->id) }}" class="read-more-btn">
                                    Read More <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <div class="alert alert-dark border">
                            <p class="mb-0 text-muted">No upcoming activities found at this time.</p>
                        </div>
                    </div>
                @endforelse
            </div> 
        </div> 
    </section>
<!--Artifacts-->
    <section id="collections" class="collections py-5">
        <div class="container text-center">
            <h2 class="mb-5" style="font-family: 'Playfair Display', serif; font-size: 2.5rem; color:#c5992a; font-weight: 700">Museum Collections</h2>
                <div class="row g-4">
                    @foreach($artifacts as $artifact)
                        <div class="col-md-4">
                            <div class="box card border-secondary h-100" style="background-color: #121212">
                                @if($artifact->images->first())
                                <img src="{{ asset('storage/'.$artifact->images->first()->image) }}" 
                                class="card-img-top"
                                style="width: 50%; height: 50%; margin: 0 auto; padding: 5px;">
                                @else
                                <img src="{{ asset('images/no-image.png') }}" 
                                class="card-img-top"
                                style="width: 50%; height: 50%; margin: 0 auto; padding: 5px;">
                                @endif
                                    <div class="card-body">
                                        <h5 style="color: #e0e0e0;">
                                        {{ $artifact->name_of_object }}
                                        </h5>
                                        <p style="color: #a0a0a0">
                                        {{ $artifact->material }} • {{ $artifact->type }}
                                        </p>
                                        <a href="{{ route('artifact.show',$artifact->id) }}"
                                        class="btn btn-custom btn-sm">
                                        View Artifact
                                        </a>
                                    </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            <div class="mt-5">
                <a href="{{ route('collections') }}" class="btn btn-custom">
                View Full Collection
                </a>
            </div>
        </div>
    </section>
    <!-- Visit Section -->
    <section id="visit" class="visit-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-4 mb-lg-0">
                    <div class="map-wrapper rounded overflow-hidden shadow">
                        <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8159.324817044189!2d123.26603157597364!3d13.5678322759823!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a18cb620beaaab%3A0xf9509a17dfd6976b!2sDepartment%20of%20Agriculture%20-%20Regional%20Field%20Office%20No.5%20Bicol%20Region!5e0!3m2!1sen!2sph!4v1773101738811!5m2!1sen!2sph"
                        width="100%" 
                        height="450" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy">
                        </iframe>
                    </div>
                </div>
                <div class="col-lg-5 ps-lg-5">
                    <h2 class="visit-title fw-bold mb-4">Plan Your Visit</h2>
                    <p class="mb-4">Experience the rich agricultural history of the Bicol Region. We are open to the public for guided tours and educational programs.</p>
                    
                    <div class="visit-info-box bg-dark p-4 rounded shadow-sm border-start border-4 border-gold">
                        <h5 class="fw-bold mb-3">Opening Hours</h5>
                        <ul class="list-unstyled mb-4">
                            <li class="d-flex justify-content-between mb-2">
                                <span>Mon - Fri:</span>
                                <span class="fw-bold">8:00 AM - 5:00 PM</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <span>Sat - Sun:</span>
                                <span class="fw-bold">9:00 AM - 4:00 PM</span>
                            </li>
                        </ul>
                        
                        <div class="d-grid gap-2">
                            <a href="{{ route('virtual-tour') }}" class="btn btn-custom w-100">
                                <i class="bi bi-vr"></i> Virtual Tour
                            </a>
                            <a href="#contacts" class="btn btn-outline-light w-100">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer-container" id="contacts">
        <div class="tambobong-footer">
            <div class="footer-logo">
                <img src="{{ asset('images/logo.png') }}" 
                alt="Tambobong Logo">
                <h4>Tambobong</h4>
            </div>
            <address>
                San Agustin,<br>
                Pili, Camarines Sur,<br>
                Philippines
            </address>
            <a href="mailto:ocfemiaarjay30@gmail.com">ocfemiaarjay30@gmail.com</a>
        </div>
        <div class="nav-footer">
            <table>
                <p>Navigation</p>
                <tr>
                    <td><a href="#">Home</a></td>
                    <td><a href="#about">About</a></td>
                    <td><a href="#activities">Activities</a></td>
                    <td><a href="#collections">Collections</a></td>
                    <td><a href="#visit">Visit</a></td>
                </tr>
            </table>
        </div>
    </footer>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
    <script>
        let lastScrollTop = 0;
        const navbar = document.querySelector('.navbar');

        window.addEventListener('scroll', function() {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            if (scrollTop > lastScrollTop && scrollTop > 100) {
                // Scroll Down
                navbar.classList.add('hide');
            } else {
                // Scroll Up
                navbar.classList.remove('hide');
            }

            lastScrollTop = scrollTop;
        });
    </script>
</body>
</html>