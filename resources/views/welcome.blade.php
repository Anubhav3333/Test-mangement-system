@extends('layouts.dashboard')
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<div id="heroCarousel"
    class="carousel slide dashboard-hero"
    data-bs-ride="carousel"
    data-bs-interval="6500"
    data-bs-pause="hover">

    {{-- Indicators --}}
    <div class="carousel-indicators">
        <button type="button"
            data-bs-target="#heroCarousel"
            data-bs-slide-to="0"
            class="active"
            aria-current="true"
            aria-label="Slide 1"></button>

        <button type="button"
            data-bs-target="#heroCarousel"
            data-bs-slide-to="1"
            aria-label="Slide 2"></button>

        <button type="button"
            data-bs-target="#heroCarousel"
            data-bs-slide-to="2"
            aria-label="Slide 3"></button>
    </div>

   
    <div class="carousel-inner">

        {{-- Slide 1 --}}
        <div class="carousel-item active">
            <img src="https://plus.unsplash.com/premium_photo-1680807869780-e0876a6f3cd5?q=80&w=1171&auto=format&fit=crop"
                class="hero-image"
                alt="Modern school system">

            <div class="hero-overlay"></div>
            <div class="hero-glow"></div>

            <div class="carousel-caption hero-content">
                <div class="hero-badge">
                    <span class="badge-dot"></span>
                    Smart Education
                </div>

                <h1>
                    Welcome to Our
                    <span>School System.</span>
                </h1>

                <p>
                    A simple and modern platform to manage
                    your school activities easily.
                </p>

                <div class="hero-actions">
                    <a href="{{ route('login') }}"
                        class="hero-btn hero-btn-primary">
                        Login
                        <i class="bi bi-arrow-up-right"></i>
                    </a>

                    <a href="#features"
                        class="hero-btn hero-btn-outline">
                        Learn More
                    </a>
                </div>
            </div>
        </div>

        {{-- Slide 2 --}}
        <div class="carousel-item">
            <img src="https://plus.unsplash.com/premium_photo-1682125773446-259ce64f9dd7?q=80&w=2071&auto=format&fit=crop"
                class="hero-image"
                alt="Students learning in classroom">

            <div class="hero-overlay"></div>
            <div class="hero-glow"></div>

            <div class="carousel-caption hero-content">
                <div class="hero-badge">
                    <span class="badge-dot"></span>
                    Better Learning
                </div>

                <h1>
                    Learn Better.
                    <span>Grow Faster.</span>
                </h1>

                <p>
                    Make learning simple, organized and
                    more effective for everyone.
                </p>

                <div class="hero-actions">
                    <a href="{{ route('login') }}"
                        class="hero-btn hero-btn-primary">
                        Get Started
                        <i class="bi bi-arrow-up-right"></i>
                    </a>

                    <a href="#features"
                        class="hero-btn hero-btn-outline">
                        View Features
                    </a>
                </div>
            </div>
        </div>

        {{-- Slide 3 --}}
        <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1497633762265-9d179a990aa6?q=80&w=1173&auto=format&fit=crop"
                class="hero-image"
                alt="Books and education">

            <div class="hero-overlay"></div>
            <div class="hero-glow"></div>

            <div class="carousel-caption hero-content">
                <div class="hero-badge">
                    <span class="badge-dot"></span>
                    Simple Management
                </div>

                <h1>
                    Manage Smarter.
                    <span>Achieve More.</span>
                </h1>

                <p>
                    Keep your academic activities organized
                    with a clean and easy-to-use system.
                </p>

                <div class="hero-actions">
                    <a href="{{ route('login') }}"
                        class="hero-btn hero-btn-primary">
                        Login
                        <i class="bi bi-arrow-up-right"></i>
                    </a>

                    <a href="#features"
                        class="hero-btn hero-btn-outline">
                        Learn More
                    </a>
                </div>
            </div>
        </div>

    </div>


    <button class="carousel-control-prev"
        type="button"
        data-bs-target="#heroCarousel"
        data-bs-slide="prev"
        aria-label="Previous slide">

        <span class="control-icon">
            <i class="bi bi-arrow-left"></i>
        </span>
    </button>

    <button class="carousel-control-next"
        type="button"
        data-bs-target="#heroCarousel"
        data-bs-slide="next"
        aria-label="Next slide">

        <span class="control-icon">
            <i class="bi bi-arrow-right"></i>
        </span>
    </button>
</div>

<section id="features"
    class="py-5 bg-light"
    data-aos="fade-up"
    data-aos-duration="800">

    <div class="container py-4">

        <div class="text-center mb-5">
            <span class="section-label">
                Our Platform
            </span>

            <h2 class="fw-bold mt-2">
                Everything You Need in One Place
            </h2>

            <p class="text-muted mx-auto section-description">
                Manage your school activities with a simple,
                modern and easy-to-use platform.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-4"
                data-aos="fade-up"
                data-aos-delay="100">

                <div class="feature-card h-100 text-center">
                    <div class="feature-icon">
                        <i class="bi bi-mortarboard-fill"></i>
                    </div>

                    <h5 class="fw-bold">
                        Better Learning
                    </h5>

                    <p class="text-muted mb-0">
                        Make learning simple, organized and effective.
                    </p>
                </div>
            </div>
            <div class="col-md-4"
                data-aos="fade-up"
                data-aos-delay="200">

                <div class="feature-card h-100 text-center">
                    <div class="feature-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>

                    <h5 class="fw-bold">
                        Easy Management
                    </h5>

                    <p class="text-muted mb-0">
                        Manage school activities from one platform.
                    </p>
                </div>
            </div>

            <div class="col-md-4"
                data-aos="fade-up"
                data-aos-delay="300">

                <div class="feature-card h-100 text-center">
                    <div class="feature-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>

                    <h5 class="fw-bold">
                        Secure Platform
                    </h5>

                    <p class="text-muted mb-0">
                        Keep your academic information safe and organized.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="py-5 statistics-section"
    data-aos="fade-up">

    <div class="container py-3">
        <div class="row g-4 text-center">

            <div class="col-6 col-md-3"
                data-aos="zoom-in"
                data-aos-delay="100">
                <div class="stat-item">
                    <i class="bi bi-person-video3"></i>
                    <h3>100+</h3>
                    <p>Students</p>
                </div>
            </div>

            <div class="col-6 col-md-3"
                data-aos="zoom-in"
                data-aos-delay="200">
                <div class="stat-item">
                    <i class="bi bi-person-workspace"></i>
                    <h3>20+</h3>
                    <p>Teachers</p>
                </div>
            </div>

            <div class="col-6 col-md-3"
                data-aos="zoom-in"
                data-aos-delay="300">
                <div class="stat-item">
                    <i class="bi bi-building"></i>
                    <h3>10+</h3>
                    <p>Classes</p>
                </div>
            </div>

            <div class="col-6 col-md-3"
                data-aos="zoom-in"
                data-aos-delay="400">
                <div class="stat-item">
                    <i class="bi bi-award"></i>
                    <h3>99%</h3>
                    <p>Satisfaction</p>
                </div>
            </div>

        </div>
    </div>
</section>




<section class="py-5 bg-light">
    <div class="container py-4">

        <div class="text-center mb-5"
            data-aos="fade-up">

            <span class="section-label">
                Testimonials
            </span>

            <h2 class="fw-bold mt-2">
                What People Say
            </h2>

            <p class="text-muted">
                Simple experiences from our school community.
            </p>
        </div>

        <div class="row g-4 justify-content-center">

       
            <div class="col-md-5"
                data-aos="fade-right"
                data-aos-delay="100">

                <div class="testimonial-card h-100">
                    <div class="testimonial-stars mb-3">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>

                    <p>
                        “This platform makes school activities much easier
                        to manage and understand.”
                    </p>

                    <div class="d-flex align-items-center gap-3">
                        <div class="testimonial-avatar">
                            <i class="bi bi-person-fill"></i>
                        </div>

                        <div>
                            <h6 class="mb-1 fw-bold">
                                School Teacher
                            </h6>

                            <small class="text-muted">
                                Teacher
                            </small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5"
                data-aos="fade-left"
                data-aos-delay="200">

                <div class="testimonial-card h-100">
                    <div class="testimonial-stars mb-3">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>

                    <p>
                        “Everything is simple, clean and easy to access
                        from one place.”
                    </p>

                    <div class="d-flex align-items-center gap-3">
                        <div class="testimonial-avatar">
                            <i class="bi bi-person-fill"></i>
                        </div>

                        <div>
                            <h6 class="mb-1 fw-bold">
                                School Administrator
                            </h6>

                            <small class="text-muted">
                                Administrator
                            </small>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>



<section id="blog" class="py-5 bg-light">
    <div class="container py-4">

        <div class="text-center mb-5"
            data-aos="fade-up">

            <span class="badge rounded-pill text-bg-primary px-3 py-2">
                Latest Updates
            </span>

            <h2 class="fw-bold mt-3">
                From Our Blog
            </h2>

            <p class="text-secondary mx-auto"
                style="max-width: 600px;">
                Helpful ideas, updates and tips for better learning.
            </p>
        </div>

        <div class="row g-4">

   
            <div class="col-md-4"
                data-aos="fade-up"
                data-aos-delay="100">

                <div class="card h-100 border-0 rounded-4 shadow-sm overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?q=80&w=800&auto=format&fit=crop"
                        class="card-img-top"
                        style="height: 210px; object-fit: cover;"
                        loading="lazy"
                        alt="Students learning">

                    <div class="card-body p-4">
                        <span class="badge text-bg-light text-primary mb-2">
                            Education
                        </span>

                        <h5 class="card-title fw-bold">
                            How Technology Improves Learning
                        </h5>

                        <p class="card-text text-secondary">
                            Discover simple ways technology can make
                            education more effective.
                        </p>

                        <a href="#"
                            class="btn btn-link text-primary fw-semibold text-decoration-none px-0">
                            Read Article
                            <i class="bi bi-arrow-up-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

           
            <div class="col-md-4"
                data-aos="fade-up"
                data-aos-delay="200">

                <div class="card h-100 border-0 rounded-4 shadow-sm overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?q=80&w=800&auto=format&fit=crop"
                        class="card-img-top"
                        style="height: 210px; object-fit: cover;"
                        loading="lazy"
                        alt="Teacher teaching students">

                    <div class="card-body p-4">
                        <span class="badge text-bg-light text-primary mb-2">
                            Teaching
                        </span>

                        <h5 class="card-title fw-bold">
                            Better Ways to Manage a Classroom
                        </h5>

                        <p class="card-text text-secondary">
                            Practical ideas for creating a more organized
                            learning environment.
                        </p>

                        <a href="#"
                            class="btn btn-link text-primary fw-semibold text-decoration-none px-0">
                            Read Article
                            <i class="bi bi-arrow-up-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Blog Card 3 --}}
            <div class="col-md-4"
                data-aos="fade-up"
                data-aos-delay="300">

                <div class="card h-100 border-0 rounded-4 shadow-sm overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1456324504439-367cee3b3c32?q=80&w=800&auto=format&fit=crop"
                        class="card-img-top"
                        style="height: 210px; object-fit: cover;"
                        loading="lazy"
                        alt="Books and education">

                    <div class="card-body p-4">
                        <span class="badge text-bg-light text-primary mb-2">
                            Productivity
                        </span>

                        <h5 class="card-title fw-bold">
                            Simple Habits for Better Results
                        </h5>

                        <p class="card-text text-secondary">
                            Small daily habits that help students learn
                            and perform better.
                        </p>

                        <a href="#"
                            class="btn btn-link text-primary fw-semibold text-decoration-none px-0">
                            Read Article
                            <i class="bi bi-arrow-up-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- CTA /  question  SECTION  -->
<section class="simple-cta-section py-5"
    data-aos="zoom-in"
    data-aos-duration="800">
    <div class="container text-center py-4">
        <span class="cta-icon">
            <i class="bi bi-question-circle-fill"></i>
        </span>

        <h2 style="color: #6366f1 !important;" class="fw-bold mt-3">
            Have a Question or Doubt?
        </h2>

        <p class="mb-4">
            Feel free to ask your question and get the help you need.
        </p>

        <a style="background-color: #6366f1; color: white;"
            href="{{ url('/contact') }}"
            class="btn rounded-pill px-4 py-2 fw-semibold">
            Ask Your Question
            <i class="bi bi-arrow-up-right ms-2"></i>
        </a>
    </div>

</section>




{{-- FOOTER --}}
{{-- COMPLETE FOOTER --}}
<footer class="main-footer bg-dark text-white pt-5 pb-3">
    <div class="container">

        <div class="row gy-4">

            {{-- Brand --}}
            <div class="col-lg-4 col-md-6">
                <h5 class="fw-bold mb-3">
                    <i class="bi bi-mortarboard-fill text-primary me-2"></i>
                    School System
                </h5>

                <p class="text-white-50 mb-0">
                    A simple and modern platform for better education management.
                </p>
            </div>

            {{-- Quick Links --}}
            <div class="col-lg-2 col-6">
                <h6 class="fw-bold mb-3">
                    Quick Links
                </h6>

                <ul class="list-unstyled mb-0">
                    <li class="mb-2">
                        <a href="#heroCarousel"
                            class="link-light text-decoration-none">
                            Home
                        </a>
                    </li>

                    <li class="mb-2">
                        <a href="#features"
                            class="link-light text-decoration-none">
                            Features
                        </a>
                    </li>

                    <li class="mb-2">
                        <a href="#blog"
                            class="link-light text-decoration-none">
                            Blog
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('login') }}"
                            class="link-light text-decoration-none">
                            Login
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Contact --}}
            <div class="col-lg-3 col-6">
                <h6 class="fw-bold mb-3">
                    Contact Us
                </h6>

                <ul class="list-unstyled text-white-50 mb-0">
                    <li class="mb-2">
                        <i class="bi bi-envelope me-2 text-primary"></i>
                        support@example.com
                    </li>

                    <li class="mb-2">
                        <i class="bi bi-telephone me-2 text-primary"></i>
                        +91 98765 43210
                    </li>

                    <li>
                        <i class="bi bi-geo-alt me-2 text-primary"></i>
                        India
                    </li>
                </ul>
            </div>

            {{-- Social Media --}}
            <div class="col-lg-3">
                <h6 class="fw-bold mb-3">
                    Follow Us
                </h6>

                <p class="text-white-50 small">
                    Follow us for latest updates.
                </p>

                <div class="d-flex gap-2">

                    <a href="https://facebook.com"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="btn btn-outline-light rounded-circle"
                        aria-label="Facebook">
                        <i class="bi bi-facebook"></i>
                    </a>

                    <a href="https://instagram.com"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="btn btn-outline-light rounded-circle"
                        aria-label="Instagram">
                        <i class="bi bi-instagram"></i>
                    </a>

                    <a href="https://youtube.com"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="btn btn-outline-light rounded-circle"
                        aria-label="YouTube">
                        <i class="bi bi-youtube"></i>
                    </a>

                    <a href="https://linkedin.com"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="btn btn-outline-light rounded-circle"
                        aria-label="LinkedIn">
                        <i class="bi bi-linkedin"></i>
                    </a>

                </div>
            </div>

        </div>

        <hr class="border-secondary my-4">

        <div class="row align-items-center gy-2">

            <div class="col-md-6 text-center text-md-start">
                <small class="text-white-50">
                    © {{ date('Y') }} School System. All rights reserved.
                </small>
            </div>

            <div class="col-md-6 text-center text-md-end">
                <a href="#"
                    class="text-white-50 small text-decoration-none me-3">
                    Privacy Policy
                </a>

                <a href="#"
                    class="text-white-50 small text-decoration-none">
                    Terms & Conditions
                </a>
            </div>

        </div>

    </div>
</footer>

{{-- Back to Top Button --}}
<a href="#heroCarousel"
    class="btn btn-primary rounded-circle back-to-top shadow"
    aria-label="Back to top">
    <i class="bi bi-arrow-up"></i>
</a>
{{-- FOOTER --}}




<style>
    .main-footer {
        padding: 24px 0 14px;
        background: #111827;
        font-family: 'Inter', sans-serif;
    }

    .footer-brand {
        color: #ffffff;
        font-size: 18px;
        font-weight: 700;
    }

    .footer-brand i {
        color: #a5b4fc;
    }

    .footer-description {
        color: rgba(255, 255, 255, .60);
        font-size: 13px;
    }

    .footer-link {
        display: inline-flex;
        align-items: center;
        padding: 8px 14px;
        margin-left: 8px;
        border: 1px solid rgba(255, 255, 255, .18);
        border-radius: 8px;
        color: rgba(255, 255, 255, .85) !important;
        background: rgba(255, 255, 255, .06);
        font-size: 13px;
        font-weight: 600;
        text-decoration: none !important;
        transition: all .25s ease;
    }

    .footer-link:hover {
        border-color: #6366f1;
        color: #ffffff !important;
        background: #6366f1;
        transform: translateY(-2px);
    }

    .footer-line {
        margin: 18px 0 12px;
        border-color: rgba(255, 255, 255, .12);
    }

    .footer-copyright {
        color: rgba(255, 255, 255, .50);
        font-size: 12px;
    }

    @media (max-width: 767px) {
        .main-footer {
            padding: 22px 0 14px;
        }

        .footer-link {
            margin: 5px 3px 0;
        }
    }
</style>

<style>
    .cta-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 64px;
        height: 64px;
        border-radius: 50%;
        color: #6366f1;
        background: #ffffff;
        font-size: 28px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, .15);
    }
</style>






<!-- fotor css -->
<style>
    .main-footer {
        font-family: 'Inter', sans-serif;
    }

    .main-footer a {
        transition: all .25s ease;
    }

    .main-footer a:hover {
        color: #a5b4fc !important;
    }

    .main-footer .btn-outline-light {
        width: 38px;
        height: 38px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0;
    }

    .main-footer .btn-outline-light:hover {
        color: #6366f1;
        background: #ffffff;
        border-color: #ffffff;
    }

    .back-to-top {
        position: fixed;
        right: 24px;
        bottom: 24px;
        z-index: 1000;
        width: 44px;
        height: 44px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>


<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

    :root {
        --primary: #6366f1;
        --secondary: #8b5cf6;
        --dark: #111827;
        --white: #ffffff;
    }

    html {
        scroll-behavior: smooth;
    }

    .dashboard-hero {
        position: relative;
        width: 100%;
        height: calc(100vh - 110px);
        min-height: 600px;
        overflow: hidden;
        border-radius: 24px;
        background: var(--dark);
        font-family: 'Inter', sans-serif;
        box-shadow: 0 25px 70px rgba(15, 23, 42, 0.25);
    }

    .dashboard-hero .carousel-inner,
    .dashboard-hero .carousel-item {
        position: relative;
        width: 100%;
        height: 100%;
    }

    .hero-image {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transform: scale(1.08);
        transition: transform 8s cubic-bezier(.2, .7, .2, 1);
    }

    .carousel-item.active .hero-image {
        transform: scale(1);
    }

    .hero-overlay {
        position: absolute;
        inset: 0;
        z-index: 1;
        background:
            linear-gradient(90deg,
                rgba(2, 6, 23, .94) 0%,
                rgba(2, 6, 23, .72) 42%,
                rgba(2, 6, 23, .20) 100%),
            linear-gradient(0deg,
                rgba(2, 6, 23, .70),
                transparent 55%);
    }

    .hero-glow {
        position: absolute;
        z-index: 2;
        top: 10%;
        left: 28%;
        width: 420px;
        height: 420px;
        border-radius: 50%;
        background: rgba(99, 102, 241, .25);
        filter: blur(100px);
        animation: glowMove 7s ease-in-out infinite alternate;
    }

    @keyframes glowMove {
        from {
            transform: translate(-20px, 20px) scale(.9);
        }

        to {
            transform: translate(80px, -30px) scale(1.2);
        }
    }

    .hero-content {
        position: absolute;
        z-index: 3;
        top: 50%;
        right: auto;
        bottom: auto;
        left: 9%;
        max-width: 680px;
        padding: 0;
        text-align: left;
        transform: translateY(-42%);
    }

    .carousel-item.active .hero-content {
        animation: contentReveal 1s ease both;
    }

    @keyframes contentReveal {
        from {
            opacity: 0;
            transform: translate(-35px, -35%);
        }

        to {
            opacity: 1;
            transform: translate(0, -42%);
        }
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 9px 16px;
        margin-bottom: 24px;
        border: 1px solid rgba(255, 255, 255, .30);
        border-radius: 50px;
        background: rgba(255, 255, 255, .12);
        color: rgba(255, 255, 255, .92);
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        backdrop-filter: blur(12px);
    }

    .badge-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #a5b4fc;
        box-shadow: 0 0 14px #a5b4fc;
        animation: pulseDot 1.8s infinite;
    }

    @keyframes pulseDot {

        0%,
        100% {
            opacity: 1;
            transform: scale(1);
        }

        50% {
            opacity: .45;
            transform: scale(.65);
        }
    }

    .hero-content h1 {
        margin: 0 0 22px;
        color: var(--white);
        font-size: clamp(42px, 5.5vw, 78px);
        font-weight: 800;
        line-height: 1.02;
        letter-spacing: -3px;
    }

    .hero-content h1 span {
        display: block;
        color: #a5b4fc;
    }

    .hero-content p {
        max-width: 570px;
        margin-bottom: 34px;
        color: rgba(255, 255, 255, .80);
        font-size: 17px;
        line-height: 1.8;
    }

    .hero-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 14px;
    }

    .hero-btn {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        padding: 15px 24px;
        border-radius: 12px;
        font-size: 14px;
        font-weight: 700;
        text-decoration: none;
        transition: all .3s ease;
    }

    .hero-btn-primary {
        color: #ffffff;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        box-shadow: 0 12px 30px rgba(99, 102, 241, .35);
    }

    .hero-btn-primary:hover {
        color: #ffffff;
        transform: translateY(-4px);
        box-shadow: 0 18px 35px rgba(99, 102, 241, .5);
    }

    .hero-btn-outline {
        border: 1px solid rgba(255, 255, 255, .35);
        color: #ffffff;
        background: rgba(255, 255, 255, .08);
        backdrop-filter: blur(10px);
    }

    .hero-btn-outline:hover {
        color: var(--dark);
        background: #ffffff;
        transform: translateY(-4px);
    }

    .control-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 54px;
        height: 54px;
        border: 1px solid rgba(255, 255, 255, .30);
        border-radius: 50%;
        color: #ffffff;
        background: rgba(255, 255, 255, .12);
        backdrop-filter: blur(12px);
        transition: all .3s ease;
    }

    .carousel-control-prev,
    .carousel-control-next {
        z-index: 5;
        width: auto;
        margin: 0 28px;
        opacity: 1;
    }

    .carousel-control-prev:hover .control-icon,
    .carousel-control-next:hover .control-icon {
        color: var(--dark);
        background: #ffffff;
        transform: scale(1.1);
    }

    .carousel-indicators {
        z-index: 5;
        right: auto;
        bottom: 32px;
        left: 9%;
        justify-content: flex-start;
        width: auto;
        margin: 0;
        gap: 8px;
    }

    .carousel-indicators button {
        width: 32px;
        height: 4px;
        margin: 0;
        border: 0;
        border-radius: 20px;
        background: rgba(255, 255, 255, .45);
        transition: all .4s ease;
    }

    .carousel-indicators button.active {
        width: 65px;
        background: #ffffff;
    }

    .features-section {
        padding: 80px 20px;
        scroll-margin-top: 80px;
        font-family: 'Inter', sans-serif;
        background: #f8fafc;
    }

    .section-label {
        display: inline-block;
        margin-bottom: 12px;
        color: var(--primary);
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
    }

    .features-section h2 {
        margin-bottom: 14px;
        color: var(--dark);
        font-weight: 800;
    }

    .features-section p {
        max-width: 650px;
        margin: 0 auto;
        color: #64748b;
        line-height: 1.7;
    }

    @media (max-width: 768px) {
        .dashboard-hero {
            height: calc(100vh - 100px);
            min-height: 560px;
            border-radius: 16px;
        }

        .hero-content {
            right: 8%;
            left: 8%;
            max-width: none;
        }

        .hero-content h1 {
            font-size: clamp(40px, 12vw, 60px);
            letter-spacing: -2px;
        }

        .hero-content p {
            font-size: 15px;
            line-height: 1.6;
        }

        .carousel-control-prev,
        .carousel-control-next {
            display: none;
        }

        .carousel-indicators {
            bottom: 28px;
            left: 8%;
        }

        .hero-actions {
            gap: 10px;
        }

        .hero-btn {
            padding: 13px 18px;
            font-size: 13px;
        }
    }

    @media (prefers-reduced-motion: reduce) {

        *,
        *::before,
        *::after {
            animation-duration: .01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: .01ms !important;
        }
    }
</style>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const animatedElements = document.querySelectorAll(
            '#features, #features .feature-card, ' +
            '.statistics-section, .statistics-section .stat-item, ' +
            '.testimonial-card, .simple-cta-section, .main-footer'
        );

        animatedElements.forEach(function(element, index) {
            element.classList.add('scroll-reveal');

            const delay = (index % 4) * 100;
            element.style.setProperty(
                '--animation-delay',
                delay + 'ms'
            );
        });

        const observer = new IntersectionObserver(function(entries, observer) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('show');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.15
        });

        document
            .querySelectorAll('.scroll-reveal')
            .forEach(function(element) {
                observer.observe(element);
            });
    });
</script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
    AOS.init({
        duration: 800,
        offset: 100,
        easing: 'ease-out-cubic',
        once: true
    });
</script>




@section('content')
@endsection