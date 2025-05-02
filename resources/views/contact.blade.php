<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - RassRhythm</title>
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
                    <h1 class="display-4 fw-bold">Contact Us</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
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

    <!-- Contact Info Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="contact-card text-center p-4 shadow-sm rounded h-100">
                        <div class="contact-icon mb-3">
                            <i class="fas fa-map-marker-alt fa-3x text-primary"></i>
                        </div>
                        <h3 class="h5">Our Location</h3>
                        <p>412, Vallabhacharya Rd, Atalji Nagar,<br>Surat, Gujarat 395006<br>India</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="contact-card text-center p-4 shadow-sm rounded h-100">
                        <div class="contact-icon mb-3">
                            <i class="fas fa-phone fa-3x text-primary"></i>
                        </div>
                        <h3 class="h5">Phone Number</h3>
                        <p>Main: +91 9876543210<br>Office: +91 9876543211<br>Support: +91 9876543212</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="contact-card text-center p-4 shadow-sm rounded h-100">
                        <div class="contact-icon mb-3">
                            <i class="fas fa-envelope fa-3x text-primary"></i>
                        </div>
                        <h3 class="h5">Email Address</h3>
                        <p>info@rassrhythm.com<br>support@rassrhythm.com<br>admissions@rassrhythm.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h2 class="section-title">We’d Love Your Feedback   </h2>
                    <p class="mb-4">Attended one of our classes or events? Have suggestions or thoughts to share? Fill out the form below and let us know how we’re doing — your feedback helps us grow and improve!</p>
                    @if(session('status'))
                    <div class="alert alert-success">
                    {{ session('status') }}
                    </div>
                    @endif
                    
                    <form action="{{ route('contactSubmit') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="name" placeholder="Your Name" value="{{ Auth::user()->name }}" readonly>
                                    <label for="name">Your Name</label>
                                    <div class="invalid-feedback">Please enter your name</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" placeholder="Your Email" value="{{ Auth::user()->email }}" readonly>
                                    <label for="email">Your Email</label>
                                    <div class="invalid-feedback">Please enter a valid email</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="subject" placeholder="Subject" name="subject" required>
                            <label for="subject">Subject</label>
                            <div class="invalid-feedback">Please enter a subject</div>
                        </div>
                        
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="message" placeholder="Your Message"name="message"  style="height: 150px" required></textarea>
                            <label for="message">Your Message</label>
                            <div class="invalid-feedback">Please enter your message</div>
                        </div>
                        
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Send Feedback</button>
                        </div>
                    </form>
                    <li class="breadcrumb-item"><a href="{{ route('all') }}">View Other's Feedback</a></li>

                </div>
                
                <div class="col-lg-6">
                    <div class="map-container rounded shadow-sm overflow-hidden">
                        <!-- Replace with actual Google Maps embed code in production -->
                        <!-- <img src="https://placeholder.svg?height=450&width=600"  class="img-fluid w-100" style="height: 450px; object-fit: cover;"> -->
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2290.2592872203677!2d72.85198236697377!3d21.218907690290536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04ff7020b9ddd%3A0x1635cb2e4eb4b727!2sGarba%20Class!5e0!3m2!1sen!2sin!4v1745172729289!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-5">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-12">
                    <h2 class="section-title">Frequently Asked Questions</h2>
                    <p class="section-subtitle">Find answers to common questions</p>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    What are the class timings?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    We offer classes throughout the day from 9 AM to 9 PM on weekdays and 10 AM to 6 PM on Saturdays. The specific timing for each level varies. Please check the schedule on your student dashboard after registration or contact our office for the latest schedule.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    How do I determine my skill level?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    If you're new to Garba, we recommend starting with our beginner classes. If you have some experience, you can schedule a free assessment session with our instructors who will evaluate your skills and recommend the appropriate level. You can also switch levels within the first two weeks if you find your current level too easy or challenging.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    What should I wear to classes?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    For regular practice sessions, comfortable clothing that allows free movement is recommended. Traditional attire is not required for regular classes but is encouraged for events and performances. For footwear, we recommend comfortable dance shoes or flat shoes with smooth soles.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Do you offer online classes?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes, we offer online classes for all levels. Our virtual sessions are conducted via Zoom and include both live classes and recorded tutorials. Online students have access to our learning portal where they can review class recordings and practice at their own pace.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    How can I apply to be a faculty member?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Experienced Garba dancers can apply to join our faculty team by filling out the faculty application form on our website. We look for candidates with a strong background in Garba, teaching experience, and a passion for preserving and promoting this art form. All applications are reviewed by our leadership team, and selected candidates are invited for an audition and interview.
                                </div>
                            </div>
                        </div>
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

