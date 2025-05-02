<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - RassRhythm</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/style-custom.css')}}">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.blade.php">
                <span class="fw-bold fs-3">Rass<span class="text-warning">Rhythm</span></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('about') }}">About Us</a>
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
                        <a class="nav-link btn btn-danger text-white ms-lg-3 px-4" href="{{ route('login') }}">Logout</a>
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
    <!-- Page Header -->
    <header class="page-header py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="display-4 fw-bold">About Us</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">About Us</li>
                        </ol>
                    </nav>
                </div>
                <style>
        .logoo-img {
            width: 150px; /* Adjust size as needed */
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #ddd;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
                <div class="col-md-6 text-md-end">
                <img src="{{ asset('images/logoo.png') }}" alt="RassRhythm" class="logoo-img">
            </div>

                
            </div>
        </div>
    </header>

    <!-- Our Story Section -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4 mb-md-0">
                    <img src="{{ asset('images/aboutus.jpg') }}" alt="Our Story" class="img-fluid rounded shadow">
                </div>
                <div class="col-md-6">
                    <h2 class="section-title">Our Story</h2>
                    <p class="lead mb-4">Preserving tradition through the art of Garba since 2010</p>
                    <p>RassRhythm was founded with a passion for preserving and promoting the traditional art form of Garba. What started as a small community gathering has now grown into one of the most respected Garba training institutes in the country.</p>
                    <p>Our journey began when our founder, Mrs. Meera Patel, a renowned Garba dancer, noticed the declining interest in authentic Garba among the younger generation. She decided to create a space where people of all ages could learn and appreciate this beautiful dance form.</p>
                    <p>Over the years, we have trained thousands of students, organized numerous cultural events, and participated in national and international competitions, bringing home accolades and recognition.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-12">
                    <h2 class="section-title">Our Mission & Vision</h2>
                    <p class="section-subtitle">What drives us forward</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="text-center mb-4">
                                <i class="fas fa-bullseye fa-3x text-primary"></i>
                                <h3 class="h4 mt-3">Our Mission</h3>
                            </div>
                            <p>To preserve and promote the rich cultural heritage of Garba by providing high-quality training to enthusiasts of all ages and skill levels. We aim to create a community of passionate dancers who appreciate the traditional aspects while embracing modern innovations.</p>
                            <p>We are committed to making Garba accessible to everyone, regardless of their background or experience, and to create a supportive environment where students can grow both as dancers and individuals.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="text-center mb-4">
                                <i class="fas fa-eye fa-3x text-primary"></i>
                                <h3 class="h4 mt-3">Our Vision</h3>
                            </div>
                            <p>To be the leading Garba training institute globally, recognized for our commitment to authenticity, innovation, and excellence. We envision a world where Garba is celebrated not just during festivals but as a year-round cultural and artistic expression.</p>
                            <p>We aspire to create a global network of Garba enthusiasts who share our passion for this art form and contribute to its evolution while respecting its traditional roots.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Values Section -->
    <section class="py-5">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-12">
                    <h2 class="section-title">Our Core Values</h2>
                    <p class="section-subtitle">The principles that guide us</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-3 col-sm-6">
                    <div class="value-card text-center p-4 h-100">
                        <div class="value-icon mb-3">
                            <i class="fas fa-heart fa-3x text-primary"></i>
                        </div>
                        <h3 class="value-title h5">Passion</h3>
                        <p class="value-text">We are driven by our love for Garba and are committed to sharing this passion with our students.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="value-card text-center p-4 h-100">
                        <div class="value-icon mb-3">
                            <i class="fas fa-history fa-3x text-primary"></i>
                        </div>
                        <h3 class="value-title h5">Tradition</h3>
                        <p class="value-text">We honor and preserve the traditional aspects of Garba while embracing innovation.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="value-card text-center p-4 h-100">
                        <div class="value-icon mb-3">
                            <i class="fas fa-star fa-3x text-primary"></i>
                        </div>
                        <h3 class="value-title h5">Excellence</h3>
                        <p class="value-text">We strive for excellence in everything we do, from teaching to organizing events.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="value-card text-center p-4 h-100">
                        <div class="value-icon mb-3">
                            <i class="fas fa-users fa-3x text-primary"></i>
                        </div>
                        <h3 class="value-title h5">Community</h3>
                        <p class="value-text">We foster a sense of belonging and create a supportive community for all our students.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Achievements Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-12">
                    <h2 class="section-title">Our Achievements</h2>
                    <p class="section-subtitle">Milestones in our journey</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-year">2010</div>
                            <div class="timeline-content">
                                <h3 class="h5">RassRhythm Founded</h3>
                                <p>Started with just 20 students in a small studio.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-year">2012</div>
                            <div class="timeline-content">
                                <h3 class="h5">First State-Level Competition</h3>
                                <p>Won first prize at the State Garba Championship.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-year">2015</div>
                            <div class="timeline-content">
                                <h3 class="h5">Expanded to Three Locations</h3>
                                <p>Opened two new branches to accommodate growing demand.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-year">2018</div>
                            <div class="timeline-content">
                                <h3 class="h5">National Recognition</h3>
                                <p>Featured on national television for our contribution to preserving traditional Garba.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-year">2023</div>
                            <div class="timeline-content">
                                <h3 class="h5">1000+ Students Milestone</h3>
                                <p>Celebrated training over 1000 students since our inception.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- Team Section -->
<section class="py-5">
    <style>
        .team-img img {
            width: 180px;
            height: 180px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #eee;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
        }
    </style>
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="section-title">Our Leadership Team</h2>
                <p class="section-subtitle">The people behind RassRhythm</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="team-card text-center">
                    <div class="team-img mb-3">
                        <img src="{{ asset('images/viraj.jpg') }}" class="img-fluid" alt="Viraj Patel">
                    </div>
                    <h3 class="team-name h4">Viraj Patel</h3>
                    <p class="team-position text-primary mb-2">Founder & Director</p>
                    <p class="team-bio">A nationally recognized Garba dancer with over 25 years of experience. Meera's passion for preserving traditional Garba led to the creation of RassRhythm.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="team-card text-center">
                    <div class="team-img mb-3">
                        <img src="{{ asset('images/raj.jpg') }}" class="img-fluid" alt="Raj Sharma">
                    </div>
                    <h3 class="team-name h4">Raj Sharma</h3>
                    <p class="team-position text-primary mb-2">Creative Director</p>
                    <p class="team-bio">With a background in choreography and performing arts, Raj brings innovation and creativity to our Garba routines while respecting traditional elements.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="team-card text-center">
                    <div class="team-img mb-3">
                        <img src="{{ asset('images/anita.png') }}" class="img-fluid" alt="Anita Desai">
                    </div>
                    <h3 class="team-name h4">Anita Desai</h3>
                    <p class="team-position text-primary mb-2">Head Instructor</p>
                    <p class="team-bio">A patient and dedicated teacher with a gift for breaking down complex movements. Anita has trained hundreds of students from beginners to professionals.</p>
                </div>
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

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="js/script.js"></script>
</body>
</html>

