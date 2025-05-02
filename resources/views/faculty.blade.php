<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty - RassRhythm</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/style-custom.css')}}">
    <style>
        .card-img-top{
            width: ;
        }
    </style>
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
                        <a class="nav-link" href="{{ route('about') }}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('faculty') }}">Faculty</a>
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
    <style>
        .faculty-img {
            width: 150px; /* Adjust size as needed */
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #ddd;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="display-4 fw-bold">Our Faculty</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Faculty</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 text-md-end">
                <img src="{{ asset('images/faculty.jpg') }}" alt="RassRhythm Faculty" class="faculty-img">
            </div>
        </div>
    </div>
</header>

    <!-- Faculty Intro Section -->
    <section class="py-5">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <h2 class="section-title">Meet Our Expert Instructors</h2>
                    <p class="section-subtitle">Learn from the best in the field</p>
                    <p>Our faculty consists of experienced Garba dancers and instructors who are passionate about preserving and promoting this traditional art form. Each instructor brings their unique expertise and teaching style to create a comprehensive learning experience for our students.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Senior Faculty Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h2 class="h3 text-center mb-4">Senior Faculty</h2>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card faculty-card h-100 border-0 shadow-sm">
                        <img src="{{ asset('images/viraj.jpg') }}" class="card-img-top" alt="Meera Patel">
                        <div class="card-body text-center">
                            <h3 class="card-title h4">Viraj Patel</h3>
                            <p class="faculty-position text-primary mb-2">Founder & Master Instructor</p>
                            <p class="card-text">With over 25 years of experience in Garba, Meera has performed nationally and internationally. She specializes in traditional Garba forms and has trained thousands of students.</p>
                            <div class="faculty-expertise mt-3">
                                <span class="badge bg-primary me-1 mb-1">Traditional Garba</span>
                                <span class="badge bg-primary me-1 mb-1">Choreography</span>
                                <span class="badge bg-primary me-1 mb-1">Performance</span>
                            </div>
                        </div>
                        <div class="card-footer bg-white border-0 text-center">        
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card faculty-card h-100 border-0 shadow-sm">
                        <img src="{{ asset('images/raj.jpg') }}" class="card-img-top" alt="Raj Sharma">
                        <div class="card-body text-center">
                            <h3 class="card-title h4">Raj Sharma</h3>
                            <p class="faculty-position text-primary mb-2">Creative Director</p>
                            <p class="card-text">Raj combines traditional Garba with contemporary elements to create unique choreographies. His innovative approach has won several awards at national competitions.</p>
                            <div class="faculty-expertise mt-3">
                                <span class="badge bg-primary me-1 mb-1">Contemporary Fusion</span>
                                <span class="badge bg-primary me-1 mb-1">Choreography</span>
                                <span class="badge bg-primary me-1 mb-1">Competition Training</span>
                            </div>
                        </div>
                        <div class="card-footer bg-white border-0 text-center">   
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card faculty-card h-100 border-0 shadow-sm">
                        <img src="{{ asset('images/anita.png') }}" class="card-img-top" alt="Anita Desai">
                        <div class="card-body text-center">
                            <h3 class="card-title h4">Anita Desai</h3>
                            <p class="faculty-position text-primary mb-2">Head Instructor</p>
                            <p class="card-text">Anita specializes in teaching beginners and has a gift for breaking down complex movements. Her patient approach makes her a favorite among new students.</p>
                            <div class="faculty-expertise mt-3">
                                <span class="badge bg-primary me-1 mb-1">Beginner Training</span>
                                <span class="badge bg-primary me-1 mb-1">Technique</span>
                                <span class="badge bg-primary me-1 mb-1">Folk Garba</span>
                            </div>
                        </div>
                        <div class="card-footer bg-white border-0 text-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Regular Faculty Section -->
    <section class="py-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h2 class="h3 text-center mb-4">Instructors</h2>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="card faculty-card h-100 border-0 shadow-sm">
                        <img src="{{ asset('images/vinit.jpg') }}" class="card-img-top" alt="Priya Mehta">
                        <div class="card-body text-center">
                            <h3 class="card-title h5">Vinit Patel</h3>
                            <p class="faculty-position text-primary mb-2">Intermediate Instructor</p>
                            <p class="card-text">Specializes in intermediate level training with focus on footwork and rhythm.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card faculty-card h-100 border-0 shadow-sm">
                        <img src="{{ asset('images/rinku.jpg') }}" class="card-img-top" alt="Vikram Joshi">
                        <div class="card-body text-center">
                            <h3 class="card-title h5">Rinkesh Patel</h3>
                            <p class="faculty-position text-primary mb-2">Advanced Instructor</p>
                            <p class="card-text">Expert in advanced techniques and performance preparation.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card faculty-card h-100 border-0 shadow-sm">
                        <img src="{{ asset('images/yash.jpg') }}" class="card-img-top" alt="Neha Singh">
                        <div class="card-body text-center">
                            <h3 class="card-title h5">Yash Patel</h3>
                            <p class="faculty-position text-primary mb-2">Children's Instructor</p>
                            <p class="card-text">Specializes in teaching Garba to children aged 5-12 years.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card faculty-card h-100 border-0 shadow-sm">
                        <img src="{{ asset('images/sajan.jpg') }}" class="card-img-top" alt="Neha Singh">
                        <div class="card-body text-center">
                            <h3 class="card-title h5">Sajan Patel</h3>
                            <p class="faculty-position text-primary mb-2">Children's Instructor</p>
                            <p class="card-text">Specializes in teaching Garba to children aged 5-12 years.</p>
                        </div>
                    </div>
                </div>
                </div>
        </div>
    </section>

    <!-- Guest Faculty Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h2 class="h3 text-center mb-4">Guest Faculty</h2>
                    <p class="text-center mb-4">We regularly invite renowned Garba artists to conduct special workshops and masterclasses</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card faculty-card h-100 border-0 shadow-sm">
                        <img src="{{ asset('images/jagdish.jpg') }}" class="card-img-top" alt="Falguni Pathak">
                        <div class="card-body text-center">
                            <h3 class="card-title h5">Jagdish Purohit</h3>
                            <p class="faculty-position text-primary mb-2">Guest Artist</p>
                            <p class="card-text">Renowned Garba singer and performer who conducts special workshops during Navratri season.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card faculty-card h-100 border-0 shadow-sm">
                        <img src="{{ asset('images/roopal.jpg') }}" class="card-img-top" alt="Devang Patel">
                        <div class="card-body text-center">
                            <h3 class="card-title h5">Roopal Shah</h3>
                            <p class="faculty-position text-primary mb-2">Guest Choreographer</p>
                            <p class="card-text">Internationally acclaimed choreographer who specializes in fusion Garba styles.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card faculty-card h-100 border-0 shadow-sm">
                        <img src="{{ asset('images/manoj.jpg') }}" class="card-img-top" alt="Rekha Thakkar">
                        <div class="card-body text-center">
                            <h3 class="card-title h5">Ami Shah</h3>
                            <p class="faculty-position text-primary mb-2">Cultural Expert</p>
                            <p class="card-text">Provides insights into the cultural and historical aspects of Garba through special lectures.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Join Faculty Section -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h2 class="section-title">Join Our Faculty Team</h2>
                    <h4>(Comming Soon)</h4>
                    <p>Are you an experienced Garba dancer or instructor? Do you have a passion for teaching and preserving this traditional art form? We're always looking for talented individuals to join our faculty team.</p>
                    <p>As a faculty member at RassRhythm, you'll have the opportunity to:</p>
                    <ul class="list-check">
                        <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Share your expertise with enthusiastic students</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Participate in cultural events and performances</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Collaborate with other talented instructors</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Contribute to preserving and promoting Garba</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Grow professionally through regular training and workshops</li>
                    </ul>
                    <a href="" class="btn btn-primary mt-3">Apply Now</a>
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

