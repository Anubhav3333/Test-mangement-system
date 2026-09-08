@extends('layouts.dashboard')

<div id="heroCarousel"
     class="carousel slide dashboard-hero"
     data-bs-ride="carousel"
     data-bs-interval="6500">

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
                 alt="Modern technology workspace">

            <div class="hero-overlay"></div>
            <div class="hero-glow"></div>

            <div class="carousel-caption hero-content">
                <div class="hero-badge">
                    <span class="badge-dot"></span>
                    Technology & Innovation
                </div>

                <h1>Build Something <span>Amazing.</span></h1>

                <p>
                    Explore modern technology and create powerful digital
                    solutions that make a real difference.
                </p>

                <div class="hero-actions">
                    <a href="#" class="hero-btn hero-btn-primary">
                        Explore Now
                        <i class="bi bi-arrow-up-right"></i>
                    </a>

                    <a href="#" class="hero-btn hero-btn-outline">
                        Learn More
                    </a>
                </div>
            </div>
        </div>

        {{-- Slide 2 --}}
        <div class="carousel-item">
            <img src="https://plus.unsplash.com/premium_photo-1682125773446-259ce64f9dd7?q=80&w=2071&auto=format&fit=crop"
                 class="hero-image"
                 alt="Students learning in a classroom">

            <div class="hero-overlay"></div>
            <div class="hero-glow"></div>

            <div class="carousel-caption hero-content">
                <div class="hero-badge">
                    <span class="badge-dot"></span>
                    Smart Education
                </div>

                <h1>Welcome to Our <span>School System.</span></h1>

                <p>
                    Manage students, teachers, classes and academic activities
                    through one powerful digital platform.
                </p>

                <div class="hero-actions">
                    <a href="#" class="hero-btn hero-btn-primary">
                        Get Started
                        <i class="bi bi-arrow-up-right"></i>
                    </a>

                    <a href="#" class="hero-btn hero-btn-outline">
                        View Features
                    </a>
                </div>
            </div>
        </div>

        {{-- Slide 3 --}}
        <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1497633762265-9d179a990aa6?q=80&w=1173&auto=format&fit=crop"
                 class="hero-image"
                 alt="Productive workspace with books">

            <div class="hero-overlay"></div>
            <div class="hero-glow"></div>

            <div class="carousel-caption hero-content">
                <div class="hero-badge">
                    <span class="badge-dot"></span>
                    Productivity
                </div>

                <h1>Work Smarter. <span>Grow Faster.</span></h1>

                <p>
                    A modern workspace for learning, managing and achieving
                    more every day.
                </p>

                <div class="hero-actions">
                    <a href="#" class="hero-btn hero-btn-primary">
                        Learn More
                        <i class="bi bi-arrow-up-right"></i>
                    </a>

                    <a href="#" class="hero-btn hero-btn-outline">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>

    </div>

    {{-- Previous button --}}
    <button class="carousel-control-prev"
            type="button"
            data-bs-target="#heroCarousel"
            data-bs-slide="prev"
            aria-label="Previous slide">
        <span class="control-icon">
            <i class="bi bi-arrow-left"></i>
        </span>
    </button>

    {{-- Next button --}}
    <button class="carousel-control-next"
            type="button"
            data-bs-target="#heroCarousel"
            data-bs-slide="next"
            aria-label="Next slide">
        <span class="control-icon">
            <i class="bi bi-arrow-right"></i>
        </span>
    </button>

    {{-- Bottom information --}}
    <div class="hero-bottom-info">
        <div>
            <strong>01</strong>
            <span>/ 03</span>
        </div>

        <div class="scroll-text">
            <span class="scroll-line"></span>
            Scroll to explore
        </div>
    </div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

    :root {
        --primary: #6366f1;
        --secondary: #8b5cf6;
        --white: #ffffff;
        --dark: #111827;
    }

    .dashboard-hero {
        position: relative;
        width: 100%;
        height: calc(100vh - 90px);
        min-height: 600px;
        overflow: hidden;
        border-radius: 24px;
        background: #111827;
        font-family: 'Inter', sans-serif;
        box-shadow: 0 25px 70px rgba(15, 23, 42, 0.25);
    }

    .dashboard-hero .carousel-inner,
    .dashboard-hero .carousel-item {
        width: 100%;
        height: 100%;
    }

    .dashboard-hero .carousel-item {
        overflow: hidden;
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
                rgba(2, 6, 23, .92) 0%,
                rgba(2, 6, 23, .70) 42%,
                rgba(2, 6, 23, .20) 100%),
            linear-gradient(0deg,
                rgba(2, 6, 23, .65),
                transparent 45%);
    }

    .hero-glow {
        position: absolute;
        z-index: 2;
        width: 420px;
        height: 420px;
        left: 28%;
        top: 10%;
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
        left: 9%;
        right: auto;
        bottom: auto;
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
        border: 1px solid rgba(255, 255, 255, .3);
        border-radius: 50px;
        background: rgba(255, 255, 255, .12);
        color: rgba(255, 255, 255, .9);
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
        0%, 100% {
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
        color: rgba(255, 255, 255, .78);
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
        color: white;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        box-shadow: 0 12px 30px rgba(99, 102, 241, .35);
    }

    .hero-btn-primary:hover {
        color: white;
        transform: translateY(-4px);
        box-shadow: 0 18px 35px rgba(99, 102, 241, .5);
    }

    .hero-btn-outline {
        color: white;
        border: 1px solid rgba(255, 255, 255, .35);
        background: rgba(255, 255, 255, .08);
        backdrop-filter: blur(10px);
    }

    .hero-btn-outline:hover {
        color: var(--dark);
        background: white;
        transform: translateY(-4px);
    }

    .control-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 54px;
        height: 54px;
        border: 1px solid rgba(255, 255, 255, .3);
        border-radius: 50%;
        color: white;
        background: rgba(255, 255, 255, .12);
        backdrop-filter: blur(12px);
        transition: all .3s ease;
    }

    .carousel-control-prev,
    .carousel-control-next {
        z-index: 5;
        width: auto;
        opacity: 1;
        margin: 0 28px;
    }

    .carousel-control-prev:hover .control-icon,
    .carousel-control-next:hover .control-icon {
        color: var(--dark);
        background: white;
        transform: scale(1.1);
    }

    .carousel-indicators {
        z-index: 5;
        right: auto;
        left: 9%;
        bottom: 38px;
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
        background: white;
    }

    .hero-bottom-info {
        position: absolute;
        z-index: 4;
        right: 8%;
        bottom: 38px;
        display: flex;
        align-items: center;
        gap: 28px;
        color: white;
    }

    .hero-bottom-info strong {
        font-size: 28px;
    }

    .hero-bottom-info span {
        color: rgba(255, 255, 255, .55);
    }

    .scroll-text {
        display: flex;
        align-items: center;
        gap: 10px;
        color: rgba(255, 255, 255, .65);
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .scroll-line {
        width: 42px;
        height: 1px;
        background: rgba(255, 255, 255, .6);
    }

    @media (max-width: 768px) {
        .dashboard-hero {
            height: calc(100vh - 100px);
            min-height: 560px;
            border-radius: 16px;
        }

        .hero-content {
            left: 8%;
            right: 8%;
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

        .hero-bottom-info {
            right: 8%;
            bottom: 38px;
        }

        .scroll-text {
            display: none;
        }

        .carousel-indicators {
            left: 8%;
            bottom: 38px;
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

@section('content')

@endsection