<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - RassRhythm</title>
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
                    <h1 class="display-4 fw-bold">Our Gallery</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Gallery</li>
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

    <!-- Gallery Tabs -->
    <section class="py-5">
        <div class="container">
            <ul class="nav nav-pills nav-justified mb-5" id="galleryTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="photos-tab" data-bs-toggle="pill" data-bs-target="#photos" type="button" role="tab" aria-controls="photos" aria-selected="true">
                        <i class="fas fa-image me-2"></i> Photos
                    </button>
                </li>
            
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="videos-tab" data-bs-toggle="pill" data-bs-target="#videos" type="button" role="tab" aria-controls="videos" aria-selected="false">
                        <i class="fas fa-video me-2"></i> Videos
                    </button>
                </li>
                     
            </ul>
            
            <div class="tab-content" id="galleryTabContent">
                <!-- Photos Tab -->
                <div class="tab-pane fade show active" id="photos" role="tabpanel" aria-labelledby="photos-tab">
                   
                        <div class="gallery-container">
                            @foreach ($galleryItems as $item)
                                <div class="gallery-wrapper" data-category="{{ strtolower($item->category) }}">
                                    <div class="gallery-item">
                                        <img src="{{ asset($item->photo_path) }}"  loading="lazy"  alt="{{ $item->description }}" class="img-fluid rounded"/>
                                    </div>
                                    <div class="gallery-info text-center">
                                        <p>{{ $item->description }}</p>
                                        <h5 class="mt-2 mb-0 fs-6">{{ $item->title }}</h5>
                                        <p class="small text-muted">{{ \Carbon\Carbon::parse($item->created_at)->format('F Y') }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div> 
                </div>
                        <!-- Videos Tab -->
                <div class="tab-pane fade" id="videos" role="tabpanel" aria-labelledby="videos-tab">
                            @if ($isEnrolled)
                            <!-- gallery.blade.php -->
                            <div class="gallery-container">
                                @foreach ($videos as $video)
                                    <div class="gallery-wrapper" data-category="{{ strtolower($video->category) }}">
                                        <div class="gallery-item">
                                            <a href="{{ route('video.detail', $video->id) }}">
                                            <video width="320" height="240" controls>
                                                <source src="{{ asset('uploads/videos/1745744593_ok.mp4') }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                            </a>
                                        </div>
                                        <div class="gallery-info text-center">
                                            <p>{{ $video->description }}</p>
                                                <h5 class="mt-2 mb-0 fs-6">{{ $video->category }}</h5>
                                            <p class="small text-muted">{{ \Carbon\Carbon::parse($video->created_at)->format('F Y') }}</p>
                                        </div>
                                    </div>
                                @endforeach
                    </div>
                    @else
                    <script> document.addEventListener("DOMContentLoaded", function () {
        const isEnrolled = @json($isEnrolled);

        document.getElementById('videos-tab').addEventListener('click', function (e) {
            if (!isEnrolled) {
                e.preventDefault();
                window.location.href = "{{ url('/') }}#classes";
            }
        });
    });</script>
                    @endif
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
    <a href="#" class="back-to-top" aria-label="Back to top">
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
        
        // Gallery Filter
        const filterButtons = document.querySelectorAll('.gallery-filter .btn');
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Remove active class from all buttons
                filterButtons.forEach(btn => btn.classList.remove('active'));
                // Add active class to clicked button
                this.classList.add('active');
                
                const filter = this.getAttribute('data-filter');
                const items = document.querySelectorAll('.gallery-item-wrapper');
                
                items.forEach(item => {
                    if (filter === 'all' || item.getAttribute('data-category') === filter) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
        
        // Video Modal
        const videoModal = document.getElementById('videoModal');
        if (videoModal) {
            videoModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const videoSrc = button.getAttribute('data-video-src');
                const videoFrame = document.getElementById('videoFrame');
                videoFrame.src = videoSrc;
            });
            
            videoModal.addEventListener('hidden.bs.modal', function() {
                const videoFrame = document.getElementById('videoFrame');
                videoFrame.src = '';
            });
        }
        
        // Load More Functionality (Placeholder)
        document.getElementById('loadMorePhotos')?.addEventListener('click', function() {
            alert('In a real application, this would load more photos from the server.');
        });
        
        document.getElementById('loadMoreVideos')?.addEventListener('click', function() {
            alert('In a real application, this would load more videos from the server.');
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
    </script>
</body>
</html>