@extends('layouts.dashboard')

<div id="carouselExample" class="carousel slide dashboard-slider" data-bs-ride="carousel">

    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2"></button>
    </div>

    <div class="carousel-inner">

        <div class="carousel-item active">
            <img src="https://plus.unsplash.com/premium_photo-1680807869780-e0876a6f3cd5?q=80&w=1171&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Technology">
            <div class="slider-overlay"></div>

            <div class="carousel-caption">
                <span>TECHNOLOGY</span>
                <h1>Build Something Amazing</h1>
                <p>Explore modern technology and create powerful digital solutions.</p>
                <a href="#" class="slider-btn">Explore Now</a>
            </div>
        </div>

        <div class="carousel-item">
            <img src="https://plus.unsplash.com/premium_photo-1682125773446-259ce64f9dd7?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Technology">
            <div class="slider-overlay"></div>

            <div class="carousel-caption">
                <span>INNOVATION</span>
                <h1>welcome to school managment system</h1>
                <p></p>
                <a href="#" class="slider-btn">Get Started</a>
            </div>
        </div>

        <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1497633762265-9d179a990aa6?q=80&w=1173&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Workspace">
            <div class="slider-overlay"></div>

            <div class="carousel-caption">
                <span>PRODUCTIVITY</span>
                <h1>Work Smarter. Grow Faster.</h1>
                <p>A modern workspace for building, learning and achieving more.</p>
                <a href="#" class="slider-btn">Learn More</a>
            </div>
        </div>

    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>

</div>
<style>
    .dashboard-slider {
        width: 100%;
        height: calc(100vh - 5rem);
        min-height: 500px;
        border-radius: 18px;
        overflow: hidden;
        position: relative;
        box-shadow: 0 10px 35px rgba(0, 0, 0, 0.18);
    }

    .dashboard-slider .carousel-inner,
    .dashboard-slider .carousel-item {
        width: 100%;
        height: 100%;
    }

    .dashboard-slider .carousel-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .slider-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(90deg,
                rgba(0, 0, 0, 0.75) 0%,
                rgba(0, 0, 0, 0.45) 45%,
                rgba(0, 0, 0, 0.15) 100%);
    }

    .dashboard-slider .carousel-caption {
        position: absolute;
        top: 50%;
        left: 8%;
        right: auto;
        bottom: auto;
        transform: translateY(-50%);
        text-align: left;
        max-width: 650px;
    }

    .dashboard-slider .carousel-caption span {
        display: inline-block;
        font-size: 14px;
        font-weight: 700;
        letter-spacing: 3px;
        margin-bottom: 15px;
        padding: 7px 14px;
        border: 1px solid rgba(255, 255, 255, 0.5);
        border-radius: 30px;
    }

    .dashboard-slider .carousel-caption h1 {
        font-size: clamp(38px, 5vw, 70px);
        font-weight: 800;
        line-height: 1.05;
        margin-bottom: 20px;
    }

    .dashboard-slider .carousel-caption p {
        font-size: 18px;
        line-height: 1.7;
        margin-bottom: 30px;
        max-width: 570px;
    }

    .slider-btn {
        display: inline-block;
        padding: 13px 28px;
        background: white;
        color: #111;
        text-decoration: none;
        border-radius: 30px;
        font-weight: 600;
        transition: 0.3s;
    }

    .slider-btn:hover {
        color: white;
        background: #111;
    }

    .dashboard-slider .carousel-control-prev,
    .dashboard-slider .carousel-control-next {
        width: 60px;
        height: 60px;
        top: 50%;
        transform: translateY(-50%);
        margin: 0 20px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(8px);
        opacity: 1;
    }

    .dashboard-slider .carousel-indicators {
        margin-bottom: 25px;
    }

    .dashboard-slider .carousel-indicators button {
        width: 30px;
        height: 4px;
        border: 0;
        border-radius: 5px;
    }

    @media (max-width: 768px) {
        .dashboard-slider {
            height: calc(100vh - 6rem);
            min-height: 450px;
            border-radius: 12px;
        }

        .dashboard-slider .carousel-caption {
            left: 7%;
            right: 7%;
        }

        .dashboard-slider .carousel-caption h1 {
            font-size: 38px;
        }

        .dashboard-slider .carousel-caption p {
            font-size: 15px;
        }

        .dashboard-slider .carousel-control-prev,
        .dashboard-slider .carousel-control-next {
            display: none;
        }
    }
</style>

@section('content')

@endsection