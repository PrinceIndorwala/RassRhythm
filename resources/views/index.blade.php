<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RassRhythm - Authentic Garba Dance Classes</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Lightbox CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/style-custom.css')}}">
</head>
<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{url('/')}}">
                <span class="fw-bold fs-3">Rass<span class="text-warning">Rhythm</span></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('faculty') }}">Faculty</a>
                    </li>
                    
                    <li class="nav-item">
                    @auth
                    <a class="nav-link" href="{{ route('gallery') }}">Gallery</a>
                    @else
                    <a class="nav-link" href="{{ route('login', ['message' => 'Sorry ,To access gallery you have to login.']) }}">Gallery</a>
                    @endauth
                    </li>
                    <li class="nav-item">
                    @auth
                    <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                    @else
                    <a class="nav-link" href="{{ route('login', ['message' => 'Sorry ,To access Contact page you have to login.']) }}">Contact</a>
                    @endauth
                    </li>

                    @auth
                    <li class="nav-item d-flex align-items-center ms-3">
                    <img src="{{ asset('images/profile-icon.png') }}" alt="User Icon" style="width: 20px; height: 20px; border-radius: 50%;">
                    <span class="ms-2 text-white">{{ Auth::user()->name ??'Guest' }}</span>
                    </li>
        
                   
                    <li class="nav-item">
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="nav-link btn btn-danger text-white ms-lg-3 px-4" style="border: none; background: none;">
            Logout
        </button>
    </form>
</li>


                    @else
                    <li class="nav-item">
                        <a class="nav-link btn btn-warning text-dark ms-lg-3 px-4" href="{{ route('register') }}">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-warning text-dark ms-lg-3 px-4" href="{{ route('login') }}">Login</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    
    <main class="hero-section">
        <div class="overlay"></div>
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-md-7 text-white" data-aos="fade-right" data-aos-duration="1000">
                <h1 class="display-3 fw-bold">Experience the Joy of Garba</h1>
                <p class="lead">Join RassRhythm to learn authentic Garba dance from expert instructors</p>
                <div class="mt-4">
                    <a href="{{ route('register') }}" class="btn btn-warning btn-lg me-2 pulse-btn">Join Now</a>
                    <a href="{{ route('about') }}" class="btn btn-outline-light btn-lg">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</main>


    <!-- Features Section -->
    <section class="py-5">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-12" data-aos="fade-up">
                    <h2 class="section-title">Why Choose RassRhythm?</h2>
                    <p class="section-subtitle">We offer the best Garba learning experience</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card text-center p-4 shadow-sm rounded h-100">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-user-tie fa-3x text-primary"></i>
                        </div>
                        <h3 class="feature-title h5">Expert Instructors</h3>
                        <p class="feature-text">Learn from professional dancers with years of experience in traditional Garba. Our instructors are nationally recognized performers.</p>
                        <a href="{{ route('faculty') }}" class="btn btn-link text-primary">Meet our faculty <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card text-center p-4 shadow-sm rounded h-100">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-layer-group fa-3x text-primary"></i>
                        </div>
                        <h3 class="feature-title h5">Multiple Levels</h3>
                        <p class="feature-text">Classes for beginners, intermediate, and professional dancers. Progress at your own pace with structured curriculum for each level.</p>
                        <a href="#classes" class="btn btn-link text-primary">View our classes <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-card text-center p-4 shadow-sm rounded h-100">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-calendar-alt fa-3x text-primary"></i>
                        </div>
                        <h3 class="feature-title h5">Regular Events</h3>
                        <p class="feature-text">Participate in cultural events and showcase your talent. We organize performances, competitions, and workshops throughout the year.</p>
                        <a href="#events" class="btn btn-link text-primary">Upcoming events <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

   
    <!-- Classes Section -->
    <section id="classes" class="py-5">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-12" data-aos="fade-up">
                    <h2 class="section-title">Our Classes</h2>
                    <p class="section-subtitle">Choose the level that suits you best</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card class-card h-100 border-0 shadow-sm">
                        <div class="class-level beginner">Beginner</div>
                        <div class="overflow-hidden">
                            <img src="{{ asset('images/beg_i.jpg') }}" class="card-img-top class-img" alt="Beginner Class">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title h4">Beginner's Garba</h3>
                            <p class="card-text">Perfect for those who are new to Garba. Learn the basic steps and rhythms in a supportive environment.</p>
                            <ul class="list-group list-group-flush mb-3">
                                <li class="list-group-item"><i class="fas fa-clock text-primary me-2"></i> 2 classes per week</li>
                                <li class="list-group-item"><i class="fas fa-calendar text-primary me-2"></i> 3 months course</li>
                                <li class="list-group-item"><i class="fas fa-dollar-sign text-primary me-2"></i>₹ 8000 for Full Course</li>
                            </ul>
                            <div class="d-grid">
                            @auth
                            <a class="btn btn-primary enroll-btn" data-level="Beginner" data-fee="8000" href="{{ route('enroll') }}">Enroll Now</a>
                            @else
                            <a class="btn btn-primary enroll-btn" href="{{ route('login') }}">Login to Enroll</a>
                            @endauth
                            </div>
                        </div>
                        <div class="card-footer bg-white border-0">
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="badge bg-success">Most Popular</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card class-card h-100 border-0 shadow-sm">
                        <div class="class-level intermediate">Intermediate</div>
                        <div class="overflow-hidden">
                            <img src="{{ asset('images/inter_i.jpg') }}" class="card-img-top class-img" alt="Intermediate Class">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title h4">Intermediate Garba</h3>
                            <p class="card-text">For dancers with basic knowledge. Learn complex steps, formations, and improve your technique.</p>
                            <ul class="list-group list-group-flush mb-3">
                                <li class="list-group-item"><i class="fas fa-clock text-primary me-2"></i> 3 classes per week</li>
                                <li class="list-group-item"><i class="fas fa-calendar text-primary me-2"></i> 4 months course</li>
                                <li class="list-group-item"><i class="fas fa-dollar-sign text-primary me-2"></i> ₹ 11000 for Full Course</li>
                            </ul>
                            <div class="d-grid">
                                @auth
                                <a class="btn btn-primary enroll-btn" data-level="Intermediate" data-fee="11000" href="{{ route('enroll') }}">Enroll Now</a>
                                @else
                                <a class="btn btn-primary enroll-btn" href="{{ route('login') }}">Login to Enroll</a>
                                @endauth
                            </div>
                        </div>
                        <div class="card-footer bg-white border-0">
                            <div class="d-flex align-items-center justify-content-between">
                            
                                <span class="badge bg-primary">Trending</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card class-card h-100 border-0 shadow-sm">
                        <div class="class-level pro">Professional</div>
                        <div class="overflow-hidden">
                            <img src="{{ asset('images/proff.jpg') }}" class="card-img-top class-img" alt="Professional Class">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title h4" >Professional Garba</h3>
                            <p class="card-text">Advanced techniques for experienced dancers. Perfect your skills, style, and performance quality.</p>
                            <ul class="list-group list-group-flush mb-3">
                                <li class="list-group-item"><i class="fas fa-clock text-primary me-2"></i> 4 classes per week</li>
                                <li class="list-group-item"><i class="fas fa-calendar text-primary me-2"></i> 6 months course</li>
                                <li class="list-group-item"><i class="fas fa-dollar-sign text-primary me-2"></i>₹ 16000 for Full Course</li>
                            </ul>
                            <div class="d-grid">
                            @auth
                            <a class="btn btn-primary enroll-btn" data-level="Professional" data-fee="16000" href="{{ route('enroll') }}">Enroll Now</a>
                            @else
                            <a class="btn btn-primary enroll-btn" href="{{ route('login') }}">Login to Enroll</a>
                            @endauth
                            </div>
                        </div>
                        <div class="card-footer bg-white border-0">
                            <div class="d-flex align-items-center justify-content-between">
                                
                                <span class="badge bg-danger">Advanced</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5" data-aos="fade-up">
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right">
                    <div class="position-relative">
                        <img src="{{ asset('images/welcome.jpg') }}" alt="About RassRhythm" class="img-fluid rounded shadow-lg">
                        <div class="experience-badge">
                            <span class="exp-years">15</span>
                            <span class="exp-text">Years of Excellence</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <h2 class="section-title">About RassRhythm</h2>
                    <p class="lead text-primary mb-4">Preserving tradition through the art of Garba since 2010</p>
                    <p>RassRhythm was founded with a passion for preserving and promoting the traditional art form of Garba. What started as a small community gathering has now grown into one of the most respected Garba training institutes in the country.</p>
                    <p>Our journey began when our founder, Mrs. Meera Patel, a renowned Garba dancer, noticed the declining interest in authentic Garba among the younger generation. She decided to create a space where people of all ages could learn and appreciate this beautiful dance form.</p>
                    <div class="row mt-4">
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center">
                                <div class="about-icon me-3">
                                    <i class="fas fa-medal text-primary"></i>
                                </div>
                                <div>
                                    <h4 class="h6 mb-1">Award-Winning Training</h4>
                                    <p class="mb-0 small">Nationally recognized program</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center">
                                <div class="about-icon me-3">
                                    <i class="fas fa-certificate text-primary"></i>
                                </div>
                                <div>
                                    <h4 class="h6 mb-1">Certified Instructors</h4>
                                    <p class="mb-0 small">Experienced professionals</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center">
                                <div class="about-icon me-3">
                                    <i class="fas fa-music text-primary"></i>
                                </div>
                                <div>
                                    <h4 class="h6 mb-1">Authentic Music</h4>
                                    <p class="mb-0 small">Traditional and modern tracks</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center">
                                <div class="about-icon me-3">
                                    <i class="fas fa-users text-primary"></i>
                                </div>
                                <div>
                                    <h4 class="h6 mb-1">Community Focus</h4>
                                    <p class="mb-0 small">Inclusive and supportive</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('about') }}" class="btn btn-primary mt-4">Learn More About Us</a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-12" data-aos="fade-up">
                    <h2 class="section-title">Gallery Highlights</h2>
                    <p class="section-subtitle">Glimpses of our classes and events</p>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-md-4 col-6" data-aos="zoom-in" data-aos-delay="100">
                    <a href="https://placeholder.svg?height=600&width=800" data-lightbox="gallery" data-title="Navratri Celebration 2022">
                        <div class="gallery-item">
                            <img src="{{ asset('images/g_i1.jpg') }}" alt="Gallery Image" class="img-fluid rounded">
                            
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-6" data-aos="zoom-in" data-aos-delay="200">
                    <a href="https://placeholder.svg?height=600&width=800" data-lightbox="gallery" data-title="Annual Competition 2022">
                        <div class="gallery-item">
                            <img src="{{ asset('images/g_i2.jpg') }}" alt="Gallery Image" class="img-fluid rounded">
                            
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-6" data-aos="zoom-in" data-aos-delay="300">
                    <a href="https://placeholder.svg?height=600&width=800" data-lightbox="gallery" data-title="Workshop Session">
                        <div class="gallery-item">
                            <img src="{{ asset('images/g_i3.jpg') }}" alt="Gallery Image" class="img-fluid rounded">
                            
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-6" data-aos="zoom-in" data-aos-delay="400">
                    <a href="https://placeholder.svg?height=600&width=800" data-lightbox="gallery" data-title="Performance at Cultural Festival">
                        <div class="gallery-item">
                            <img src="{{ asset('images/g_i4.jpg') }}" alt="Gallery Image" class="img-fluid rounded">
                            
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-6" data-aos="zoom-in" data-aos-delay="500">
                    <a href="https://placeholder.svg?height=600&width=800" data-lightbox="gallery" data-title="Beginner's Class">
                        <div class="gallery-item">
                            <img src="{{ asset('images/g_i5.jpg') }}" alt="Gallery Image" class="img-fluid rounded">
                            
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-6" data-aos="zoom-in" data-aos-delay="600">
                    <div class="gallery-more">
                    @auth
                    <a class="nav-link" href="{{route('gallery')}}">View More</a>
                    @else
                    <a class="nav-link" href="{{ route('login', ['message' => 'To access photos, please login.']) }}">View More</a>
                    @endauth
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Upcoming Events -->
    
     <section id="events" class="py-5 bg-light">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-12" data-aos="fade-up">
                    <h2 class="section-title">Upcoming Events</h2>
                    <p class="section-subtitle">(Comming Soon)</p>
                    <p class="section-subtitle">Join us for these exciting Garba events</p>
                </div>
            </div>
            
            <div class="text-center mt-5" data-aos="fade-up">
                <a  class="btn btn-outline-primary btn-lg">View All Events</a>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-5">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12" data-aos="fade-up">
                <h2 class="section-title">What Our Students Say</h2>
                <p class="section-subtitle">Hear from those who have experienced RassRhythm</p>
            </div>
        </div>
        <div class="testimonial-slider" data-aos="fade-up">
            <div class="row">
                @foreach ($feedbacks as $feedback)
                <div class="col-md-4 mb-4">
                    <div class="testimonial-card p-4 bg-white shadow-sm rounded h-100">
                        <p class="testimonial-name h6 mb-0">{{ $feedback->name }} </p>
                        <p class="testimonial-info small text-muted mb-0">{{ $feedback->subject ?? 'RassRhythm Student' }}</p>
                        <div class="testimonial-author d-flex align-items-center mt-3">
                            <div>
                                <h6  class="testimonial-text">"{{ $feedback->message }}"</h6>
                                
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-4">
                <div class="testimonial-dots"></div>
            </div>
        </div>
    </div>
</section>

    <!-- Newsletter Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center" data-aos="fade-up">
                    <h2 class="section-title">Stay Updated</h2>
                    <p class="mb-4">Subscribe to our newsletter to receive updates on classes, events, and special offers.</p>
                    <form class="newsletter-form">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control form-control-lg" placeholder="Your Email Address" aria-label="Your Email Address">
                            <button class="btn btn-primary btn-lg" type="submit">Subscribe</button>
                        </div>
                        <div class="form-text text-center">We respect your privacy and will never share your information.</div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center" data-aos="zoom-in">
                    <h2 class="text-white mb-4">Ready to Start Your Garba Journey?</h2>
                    <p class="text-white mb-4">Join RassRhythm today and experience the joy of authentic Garba dance.</p>
                    <a class="btn btn-warning btn-lg px-5 pulse-btn" id="scroll-to-classes">ENROLL NOW</a>

                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white pt-5 pb-4">
    <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h3 class="h5 mb-3">RassRhythm</h3>
                    <p>Experience the authentic Garba dance with our expert instructors. We offer classes for all levels from beginners to professionals.</p>
                    <div class="social-icons mt-3">
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                <div class="col-md-2 mb-4">
                    <h3 class="h5 mb-3">Quick Links</h3>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ route('index') }}" class="text-white text-decoration-none">Home</a></li> 
                        <li class="mb-2"><a href="{{ route('about') }}" class="text-white text-decoration-none">About Us</a></li>
                        <li class="mb-2"><a href="{{ route('faculty') }}" class="text-white text-decoration-none">Faculty</a></li>
                        <li class="mb-2"><a href="{{ route('gallery') }}" class="text-white text-decoration-none">Gallery</a></li>
                        <li class="mb-2"><a href="{{ route('contact') }}" class="text-white text-decoration-none">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h3 class="h5 mb-3">Contact Info</h3>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-map-marker-alt me-2"></i> VIP Plaza, Surat , India</li>
                        <li class="mb-2"><i class="fas fa-phone me-2"></i> +91 9876543210</li>
                        <li class="mb-2"><i class="fas fa-envelope me-2"></i> info@rassrhythm.com</li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h3 class="h5 mb-3">Opening Hours</h3>
                    <ul class="list-unstyled">
                        <li class="mb-2">Monday - Friday: 9am - 9pm</li>
                        <li class="mb-2">Saturday: 10am - 6pm</li>
                        <li class="mb-2">Sunday: Closed</li>
                    </ul>
                </div>
            </div>
            <hr class="my-4">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-md-0">© 2025 RassRhythm.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <a href="#py-5" class="back-to-top" aria-label="Back to top">
        <i class="fas fa-arrow-up"></i>
    </a>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS Animation Library -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Lightbox JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <!-- Custom JS -->
    <script src="js/script.js"></script>
    
    <script>
        // Initialize AOS
        AOS.init();
        
        // Preloader
        window.addEventListener('load', function() {
            const preloader = document.getElementById('preloader');
            preloader.style.display = 'none';
        });
        
        // Counter animation
        const counters = document.querySelectorAll('.counter-number');
        counters.forEach(counter => {
            const target = parseInt(counter.getAttribute('data-count'));
            const duration = 2000; // 2 seconds
            const step = target / (duration / 16); // 60fps
            
            let current = 0;
            const updateCounter = () => {
                current += step;
                if (current < target) {
                    counter.textContent = Math.floor(current);
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.textContent = target;
                }
            };
            
            // Start counter when element is in viewport
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        updateCounter();
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });
            
            observer.observe(counter);
        });
        
        // Event countdown
        const countdownElements = document.querySelectorAll('[data-countdown]');
        countdownElements.forEach(element => {
            const targetDate = new Date(element.getAttribute('data-countdown')).getTime();
            
            const updateCountdown = () => {
                const now = new Date().getTime();
                const distance = targetDate - now;
                
                if (distance < 0) {
                    element.innerHTML = 'Event Started';
                    return;
                }
                
                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                
                element.querySelector('.countdown-days').textContent = days.toString().padStart(2, '0');
                element.querySelector('.countdown-hours').textContent = hours.toString().padStart(2, '0');
                element.querySelector('.countdown-minutes').textContent = minutes.toString().padStart(2, '0');
            };
            
            updateCountdown();
            setInterval(updateCountdown, 60000); // Update every minute
        });
        
        // Back to top button
        const backToTopButton = document.querySelector('.back-to-top');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                backToTopButton.classList.add('show');
            } else {
                backToTopButton.classList.remove('show');
            }
        });

        document.querySelectorAll(".enroll-btn").forEach(button => {
        button.addEventListener("click", function(event) {
            let level = this.getAttribute("data-level");
            let fee = this.getAttribute("data-fee");

            // Store in localStorage
            localStorage.setItem("selectedLevel", level);
            localStorage.setItem("selectedFee", fee);
        });
    });
    document.getElementById("scroll-to-classes").addEventListener("click", function(event) {
        event.preventDefault(); // Prevent any default behavior
        document.getElementById("classes").scrollIntoView({ behavior: "smooth" });
    });
    
    </script>
</body>
</html>

