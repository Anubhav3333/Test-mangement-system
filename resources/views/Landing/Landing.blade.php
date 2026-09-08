<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Exam Management System</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />


    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* ===== NAVIGATION BAR ===== */
        .navbar {
            background-color: #f8f9fa;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: bold;
            color: #333 !important;
        }

        .navbar-brand img {
            height: 50px;
            width: auto;
        }

        .navbar-brand-text {
            font-size: 18px;
            font-weight: 700;
        }

        .navbar-brand-text small {
            display: block;
            font-size: 11px;
            color: #e74c3c;
            font-weight: 600;
            margin-top: -5px;
        }

        .nav-link {
            color: #333 !important;
            font-weight: 500;
            margin: 0 10px;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: #e74c3c !important;
        }

        .nav-link.active {
            color: #e74c3c !important;
        }

        /* ===== HERO SECTION ===== */
        .hero-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            padding: 80px 0;
            min-height: 600px;
            display: flex;
            align-items: center;
        }

        .hero-content {
            padding: 40px 0;
        }

        .hero-title {
            font-size: 48px;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 20px;
            line-height: 1.3;
        }

        .hero-subtitle {
            font-size: 16px;
            color: #666;
            line-height: 1.6;
            margin-bottom: 30px;
            max-width: 500px;
        }

        .hero-buttons {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn-custom {
            padding: 12px 30px;
            font-weight: 600;
            border-radius: 5px;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary-custom {
            background-color: #e74c3c;
            color: white;
            border: 2px solid #e74c3c;
        }

        .btn-primary-custom:hover {
            background-color: #c0392b;
            border-color: #c0392b;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(231, 76, 60, 0.3);
        }

        .btn-secondary-custom {
            background-color: transparent;
            color: #2c3e50;
            border: 2px solid #2c3e50;
        }

        .btn-secondary-custom:hover {
            background-color: #2c3e50;
            color: white;
            transform: translateY(-2px);
        }

        .hero-image {
            text-align: center;
        }

        .hero-image img {
            max-width: 100%;
            height: auto;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        /* SVG Animations */
        .books-stack {
            animation: stackBounce 2s ease-in-out infinite;
            transform-origin: 140px 360px;
        }

        .book-1 {
            animation: book1Float 3s ease-in-out infinite;
        }

        .book-2 {
            animation: book2Float 3.5s ease-in-out infinite;
        }

        .book-3 {
            animation: book3Float 4s ease-in-out infinite;
        }

        .graduation-cap {
            animation: capRotate 4s ease-in-out infinite;
            transform-origin: 300px 120px;
        }

        .student-figure {
            animation: studentBounce 2.5s ease-in-out infinite;
            transform-origin: 320px 140px;
        }

        .laptop {
            animation: laptopTilt 3s ease-in-out infinite;
            transform-origin: 250px 260px;
        }

        .documents {
            animation: documentSlide 3.5s ease-in-out infinite;
            transform-origin: 380px 340px;
        }

        .person-left {
            animation: personWave 2.8s ease-in-out infinite;
            transform-origin: 150py 200px;
        }

        /* Keyframe Animations */
        @keyframes stackBounce {

            0%,
            100% {
                transform: translateY(0px);
            }

            25% {
                transform: translateY(-8px);
            }

            50% {
                transform: translateY(0px);
            }

            75% {
                transform: translateY(-5px);
            }
        }

        @keyframes book1Float {

            0%,
            100% {
                transform: translateY(0px) rotateZ(0deg);
            }

            50% {
                transform: translateY(-15px) rotateZ(2deg);
            }
        }

        @keyframes book2Float {

            0%,
            100% {
                transform: translateY(0px) rotateZ(0deg);
            }

            50% {
                transform: translateY(-12px) rotateZ(-2deg);
            }
        }

        @keyframes book3Float {

            0%,
            100% {
                transform: translateY(0px) rotateZ(0deg);
            }

            50% {
                transform: translateY(-18px) rotateZ(1.5deg);
            }
        }

        @keyframes capRotate {

            0%,
            100% {
                transform: rotateZ(0deg) rotateX(0deg);
            }

            25% {
                transform: rotateZ(3deg) rotateX(5deg);
            }

            50% {
                transform: rotateZ(-2deg) rotateX(-3deg);
            }

            75% {
                transform: rotateZ(2deg) rotateX(4deg);
            }
        }

        @keyframes studentBounce {

            0%,
            100% {
                transform: translateY(0px) scale(1);
            }

            25% {
                transform: translateY(-10px) scale(1.02);
            }

            50% {
                transform: translateY(0px) scale(1);
            }

            75% {
                transform: translateY(-8px) scale(1.01);
            }
        }

        @keyframes laptopTilt {

            0%,
            100% {
                transform: rotateZ(0deg) translateX(0px);
            }

            25% {
                transform: rotateZ(-2deg) translateX(-5px);
            }

            50% {
                transform: rotateZ(0deg) translateX(0px);
            }

            75% {
                transform: rotateZ(2deg) translateX(5px);
            }
        }

        @keyframes documentSlide {

            0%,
            100% {
                transform: translateX(0px) rotateZ(0deg);
            }

            25% {
                transform: translateX(8px) rotateZ(1deg);
            }

            50% {
                transform: translateX(0px) rotateZ(0deg);
            }

            75% {
                transform: translateX(-8px) rotateZ(-1deg);
            }
        }

        @keyframes personWave {

            0%,
            100% {
                transform: translateX(0px) rotateZ(0deg);
            }

            25% {
                transform: translateX(8px) rotateZ(3deg);
            }

            50% {
                transform: translateX(0px) rotateZ(0deg);
            }

            75% {
                transform: translateX(-8px) rotateZ(-3deg);
            }
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.7;
            }
        }

        .pulse-element {
            animation: pulse 2s ease-in-out infinite;
        }

        /* ===== FOOTER ===== */
        footer {
            background-color: #f8f9fa;
            padding: 60px 0 20px;
            border-top: 1px solid #e0e0e0;
            margin-top: 100px;
        }

        .footer-column h5 {
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 25px;
            font-size: 16px;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
        }

        .footer-logo-circle {
            width: 50px;
            height: 50px;
            background-color: #e74c3c;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            font-weight: bold;
        }

        .footer-logo-text {
            line-height: 1.3;
        }

        .footer-logo-text strong {
            display: block;
            font-size: 16px;
            color: #2c3e50;
        }

        .footer-logo-text small {
            color: #e74c3c;
            font-weight: 600;
        }

        .footer-description {
            color: #666;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-links a {
            color: #666;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .footer-links a::before {
            content: "›";
            font-weight: bold;
            color: #e74c3c;
        }

        .footer-links a:hover {
            color: #e74c3c;
            padding-left: 5px;
        }

        .social-links {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            background-color: #2c3e50;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 16px;
        }

        .social-icon:hover {
            background-color: #e74c3c;
            transform: translateY(-3px);
        }

        .social-text {
            color: #666;
            font-size: 13px;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .footer-bottom {
            border-top: 1px solid #e0e0e0;
            padding-top: 30px;
            text-align: center;
            margin-top: 30px;
        }

        .footer-bottom p {
            color: #666;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .payment-icons {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .payment-icon {
            width: 40px;
            height: 40px;
            background-color: white;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            transition: all 0.3s ease;
        }

        .payment-icon:hover {
            border-color: #e74c3c;
            box-shadow: 0 2px 8px rgba(231, 76, 60, 0.2);
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 32px;
            }

            .hero-section {
                padding: 50px 0;
                min-height: auto;
            }

            .hero-buttons {
                flex-direction: column;
            }

            .btn-custom {
                text-align: center;
                width: 100%;
            }

            .footer-column {
                margin-bottom: 40px;
            }

            .navbar-brand-text {
                font-size: 16px;
            }

            .nav-link {
                margin: 5px 0;
            }
        }
    </style>
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container-lg">
            <a class="navbar-brand" href="#home">
                <div style="background-color: #e74c3c; padding: 8px 12px; border-radius: 5px; display: flex; align-items: center; gap: 5px;">
                    <i class="fas fa-circle-notch" style="color: white; font-size: 20px;"></i>
                </div>
                <div class="navbar-brand-text">
                    Online Exam
                    <small>Management System</small>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#packages">Our Packages</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Pages
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Privacy Policy</a></li>
                            <li><a class="dropdown-item" href="#">about</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact Us</a>
                    </li>
                  
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('registration')}}">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ===== HERO SECTION ===== -->
    <section class="hero-section" id="home">
        <div class="container-lg">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content">
                    <h1 class="hero-title  ">Online Exam Management</h1>
                    <p class="hero-subtitle">
                        Test your skills with our online exam management system. An easy to use solution for Teachers and Students.
                    </p>
                    <div class="hero-buttons">
                        <a href="" class="btn-custom btn-primary-custom animate__animated animate__headShake">Get Started</a>
                        <a href="#" class="btn-custom btn-secondary-custom animate__animated  animate__hinge animate__delay-1s">Learn More</a>
                    </div>
                </div>

                <div class="col-lg-6 hero-image  ">
                    <svg viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg" style="max-width: 100%; height: auto;">
                        <!-- Books Stack -->
                        <g class="books-stack  btn-secondary-custom animate__animated  animate__hinge animate__delay-1s">
                            <g class="book-1">
                                <rect x="100" y="350" width="80" height="20" fill="#5B4B8A" />
                            </g>
                            <g class="book-2">
                                <rect x="100" y="320" width="80" height="20" fill="#6B5BA0" />
                            </g>
                            <g class="book-3">
                                <rect x="100" y="290" width="80" height="20" fill="#8B7BC4" />
                            </g>
                        </g>

                        <!-- Graduation Cap -->
                        <g class="graduation-cap">
                            <circle cx="300" cy="120" r="30" fill="#2C3E7F" />
                            <polygon points="270,120 330,120 350,150 250,150" fill="#2C3E7F" />
                            <line x1="300" y1="150" x2="300" y2="200" stroke="#2C3E7F" stroke-width="3" />
                        </g>

                        <!-- Student Figure -->
                        <g class="student-figure">
                            <circle cx="320" cy="140" r="20" fill="#4ECDC4" />
                            <rect x="310" y="160" width="20" height="40" fill="#5B4B8A" />
                            <rect x="305" y="200" width="10" height="30" fill="#FFB3BA" />
                            <rect x="325" y="200" width="10" height="30" fill="#FFB3BA" />
                        </g>

                        <!-- Laptop -->
                        <g class="laptop">
                            <rect x="200" y="230" width="100" height="60" fill="#3498DB" rx="5" />
                            <rect x="195" y="290" width="110" height="10" fill="#34495E" />
                        </g>

                        <g class="documents">
                            <rect x="350" y="300" width="60" height="80" fill="#ECF0F1" stroke="#34495E" stroke-width="2" />
                            <line x1="360" y1="320" x2="400" y2="320" stroke="#34495E" stroke-width="1" />
                            <line x1="360" y1="335" x2="400" y2="335" stroke="#34495E" stroke-width="1" />
                            <line x1="360" y1="350" x2="400" y2="350" stroke="#34495E" stroke-width="1" />
                        </g>

                        <g class="person-left">
                            <circle cx="150" cy="200" r="15" fill="#F39C12" />
                            <rect x="140" y="215" width="20" height="35" fill="#9B59B6" />
                            <rect x="135" y="250" width="8" height="25" fill="#FFB3BA" />
                            <rect x="157" y="250" width="8" height="25" fill="#FFB3BA" />
                        </g>
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <!-- end section -->

    <section class="exam-series-section">
        <div class="container section-container">
            <div class="text-center mb-5">
                <h2 class="section-title animate__animated animate__fadeInDown">
                    Our Exam Series
                </h2>
            </div>

            <div class="row g-4 justify-content-center">

                <!-- Card 1 -->
                <div class="col-lg-4 col-md-6 card-wrapper">
                    <div class="glass-card">
                        <div class="exam-icon-wrapper">
                            <i class="fas fa-landmark"></i>
                        </div>

                        <h3 class="exam-title">UPSC Mock Test</h3>

                        <p class="exam-desc">
                            Master the UPSC Civil Services exam with comprehensive mock tests and detailed analysis for both Prelims and Mains.
                        </p>

                        <div class="include-title">Include :</div>
                        <ul class="include-list">
                            <li>Prelims Practice Tests</li>
                            <li>Mains Test Series</li>
                            <li>Interview Guidance</li>
                        </ul>

                        <div class="price-row">
                            <div class="price">₹2000</div>
                            <a href="#" class="btn btn-buy"><span>Buy Now</span></a>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-lg-4 col-md-6 card-wrapper">
                    <div class="glass-card">
                        <div class="exam-icon-wrapper">
                            <i class="fas fa-briefcase"></i>
                        </div>

                        <h3 class="exam-title">SSC Mock Test</h3>

                        <p class="exam-desc">
                            Prepare for SSC CHSL and other SSC exams with our complete test series and latest exam pattern.
                        </p>

                        <div class="include-title">Include :</div>
                        <ul class="include-list">
                            <li>SSC CHSL Full Tests</li>
                            <li>Current Affairs Pack</li>
                            <li>Previous Year Papers</li>
                        </ul>

                        <div class="price-row">
                            <div class="price">₹1000</div>
                            <a href="#" class="btn btn-buy"><span>Buy Now</span></a>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6 card-wrapper">
                    <div class="glass-card">
                        <div class="exam-icon-wrapper">
                            <i class="fas fa-piggy-bank"></i>
                        </div>

                        <h3 class="exam-title">SBI Mock Test</h3>

                        <p class="exam-desc">
                            Ace the SBI PO and Clerk exams with our expert-curated mock tests and performance analytics.
                        </p>

                        <div class="include-title">Include :</div>
                        <ul class="include-list">
                            <li>Current Affairs Tests</li>
                            <li>Reasoning Basics</li>
                            <li>Full Mock Tests</li>
                        </ul>

                        <div class="price-row">
                            <div class="price free">₹0 <small style="font-size: 0.5em;">FREE</small></div>
                            <a href="#" class="btn btn-buy"><span>Start Now</span></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>





    <style>
        .exam-series-section * {
            box-sizing: border-box;
        }

        .exam-series-section {
            background: linear-gradient(135deg, #0f0c29 0%, #302b63 50%, #24243e 100%);
            padding: 80px 0;
            position: relative;
            overflow: hidden;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        /* Animated background blobs */
        .exam-series-section::before {
            content: '';
            position: absolute;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(99, 102, 241, 0.15) 0%, transparent 70%);
            top: -200px;
            left: -150px;
            border-radius: 50%;
            animation: float 15s infinite ease-in-out;
            z-index: 0;
        }

        .exam-series-section::after {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(236, 72, 153, 0.1) 0%, transparent 70%);
            bottom: -150px;
            right: -100px;
            border-radius: 50%;
            animation: float 20s infinite ease-in-out reverse;
            z-index: 0;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) translateX(0px);
            }

            25% {
                transform: translateY(-30px) translateX(20px);
            }

            50% {
                transform: translateY(-50px) translateX(-10px);
            }

            75% {
                transform: translateY(-30px) translateX(30px);
            }
        }

        .exam-series-section .section-container {
            position: relative;
            z-index: 1;
        }

        .exam-series-section .section-title {
            color: #ffffff;
            font-weight: 800;
            font-size: 2.8rem;
            position: relative;
            display: inline-block;
            margin-bottom: 60px;
            letter-spacing: -1px;
        }

        .exam-series-section .section-title::after {
            content: '';
            position: absolute;
            width: 120px;
            height: 5px;
            background: linear-gradient(90deg, #6366f1, #a855f7, #ec4899);
            bottom: -15px;
            left: 0;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(99, 102, 241, 0.5);
        }

        .exam-series-section .glass-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 20px;
            padding: 24px;
            height: 100%;
            transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        }

        /* Gradient overlay on card */
        .exam-series-section .glass-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
            pointer-events: none;
            transition: left 0.6s ease;
        }

        .exam-series-section .glass-card:hover::before {
            left: 100%;
        }

        /* Border glow effect on hover */
        .exam-series-section .glass-card::after {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 20px;
            padding: 1px;
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.4), rgba(236, 72, 153, 0.2));
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0;
            transition: opacity 0.4s ease;
            pointer-events: none;
        }

        .exam-series-section .glass-card:hover::after {
            opacity: 1;
        }

        .exam-series-section .glass-card:hover {
            transform: translateY(-12px) scale(1.03);
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.25);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.4),
                0 0 40px rgba(99, 102, 241, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.2);
        }

        .exam-series-section .exam-icon-wrapper {
            width: 100%;
            height: 120px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 18px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.4s ease;
            position: relative;
        }

        .exam-series-section .exam-icon-wrapper::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at center, rgba(255, 255, 255, 0.1), transparent);
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .exam-series-section .glass-card:hover .exam-icon-wrapper {
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 255, 255, 0.2);
            box-shadow: 0 0 20px rgba(99, 102, 241, 0.2);
        }

        .exam-series-section .glass-card:hover .exam-icon-wrapper::before {
            opacity: 1;
        }

        .exam-series-section .exam-icon-wrapper i {
            font-size: 3.5rem;
            color: #a5b4fc;
            transition: all 0.4s ease;
            filter: drop-shadow(0 0 10px rgba(165, 180, 252, 0.3));
        }

        .exam-series-section .glass-card:hover .exam-icon-wrapper i {
            color: #ec4899;
            font-size: 3.8rem;
            filter: drop-shadow(0 0 15px rgba(236, 72, 153, 0.5));
            transform: scale(1.1) rotate(5deg);
        }

        .exam-series-section .exam-title {
            color: #ffffff;
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 10px;
            letter-spacing: -0.5px;
        }

        .exam-series-section .exam-desc {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.85rem;
            line-height: 1.5;
            margin-bottom: 16px;
            min-height: 70px;
            flex-grow: 1;
        }

        .exam-series-section .include-title {
            color: #a5b4fc;
            font-weight: 600;
            font-size: 0.85rem;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .exam-series-section .include-list {
            list-style: none;
            padding: 0;
            margin: 0 0 16px 0;
            color: rgba(255, 255, 255, 0.75);
            font-size: 0.8rem;
        }

        .exam-series-section .include-list li {
            margin-bottom: 6px;
            position: relative;
            padding-left: 16px;
            transition: all 0.3s ease;
        }

        .exam-series-section .include-list li::before {
            content: "✓";
            position: absolute;
            left: 0;
            color: #4ade80;
            font-weight: bold;
            font-size: 0.9rem;
        }

        .exam-series-section .glass-card:hover .include-list li {
            transform: translateX(4px);
            color: rgba(255, 255, 255, 0.9);
        }

        .exam-series-section .price-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto;
            padding-top: 16px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            gap: 12px;
        }

        .exam-series-section .price {
            color: #ffffff;
            font-size: 1.4rem;
            font-weight: 700;
            background: linear-gradient(135deg, #6366f1, #a855f7);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .exam-series-section .price.free {
            background: linear-gradient(135deg, #4ade80, #22c55e);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }


        .exam-series-section .btn-buy {
            background: linear-gradient(135deg, #2563EB 0%, #4F46E5 50%, #7C3AED 100%);
            border: none;
            color: #fff;
            padding: 9px 20px;
            border-radius: 50px;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 0.8rem;
            letter-spacing: 0.2px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 16px rgba(79, 70, 229, 0.28);
            white-space: nowrap;
            text-decoration: none;
            display: inline-block;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .exam-series-section .btn-buy::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, #7C3AED 0%, #8B5CF6 50%, #EC4899 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: -1;
        }

        .exam-series-section .btn-buy:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 22px rgba(79, 70, 229, 0.4);
        }

        .exam-series-section .btn-buy:hover::before {
            opacity: 1;
        }

        .exam-series-section .btn-buy:active {
            transform: translateY(0);
        }

        .exam-series-section .btn-buy span {
            position: relative;
            z-index: 2;
        }


        /* Stagger animation */
        .exam-series-section .card-wrapper {
            animation: fadeInUp 0.8s ease forwards;
            opacity: 0;
        }

        .exam-series-section .card-wrapper:nth-child(1) {
            animation-delay: 0.1s;
        }

        .exam-series-section .card-wrapper:nth-child(2) {
            animation-delay: 0.3s;
        }

        .exam-series-section .card-wrapper:nth-child(3) {
            animation-delay: 0.5s;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .exam-series-section .section-title {
                font-size: 2rem;
            }

            .exam-series-section {
                padding: 60px 0;
            }

            .exam-series-section .glass-card {
                padding: 20px;
            }

            .exam-series-section .exam-icon-wrapper {
                height: 100px;
            }

            .exam-series-section .exam-icon-wrapper i {
                font-size: 3rem;
            }

            .exam-series-section .exam-title {
                font-size: 1.1rem;
            }

            .exam-series-section .price {
                font-size: 1.2rem;
            }
        }
    </style>



    <!-- security -->

    <style>
        .security-section {
            background: #0b1c3d;
            padding: 80px 0 90px;
            color: #ffffff;
        }

        .security-title {
            font-size: 1.9rem;
            font-weight: 600;
            text-align: center;
            margin-bottom: 50px;
            line-height: 1.4;
        }

        .feature-card {
            background: #ffffff;
            border-radius: 12px;
            padding: 22px 18px;
            height: 100%;
            position: relative;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.22);
        }

        .check-icon {
            position: absolute;
            top: -14px;
            left: 18px;
            width: 28px;
            height: 28px;
            background: #00c853;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 14px;
            font-weight: bold;
        }

        .feature-text {
            color: #1a2b4a;
            font-size: 0.95rem;
            font-weight: 500;
            line-height: 1.45;
            margin-top: 10px;
            margin-bottom: 0;
        }

        .cert-card {
            background: #ffffff;
            border-radius: 12px;
            padding: 20px 16px;
            height: 100%;
            display: flex;
            align-items: center;
            gap: 14px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
        }

        .cert-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.22);
        }

        .cert-logo {
            width: 60px;
            height: 60px;
            object-fit: contain;
            flex-shrink: 0;
        }

        .cert-text {
            color: #1a2b4a;
            font-size: 0.92rem;
            font-weight: 600;
            margin: 0;
            line-height: 1.3;
        }

        .explore-btn {
            background: #00c853;
            color: white;
            border: none;
            padding: 14px 32px;
            font-size: 0.95rem;
            font-weight: 600;
            border-radius: 6px;
            letter-spacing: 0.4px;
            transition: all 0.3s ease;
            margin-top: 50px;
        }

        .explore-btn:hover {
            background: #00b34a;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 200, 83, 0.35);
        }
    </style>

    <!-- security end  -->


    <!-- security staretd  -->
    <section class="security-section">
        <div class="container">
            <h2 class="security-title animate__animated animate__fadeInDown">
                We offer impeccable data security standards with our online proctoring suite
            </h2>

            <div class="row g-4 mb-4">
                <div class="col-lg col-md-4 col-sm-6 animate__animated animate__fadeInUp" style="animation-delay: 0.1s;">
                    <div class="feature-card">
                        <div class="check-icon">✓</div>
                        <p class="feature-text">Mercer | Mettl is GDPR Ready</p>
                    </div>
                </div>

                <div class="col-lg col-md-4 col-sm-6 animate__animated animate__fadeInUp" style="animation-delay: 0.2s;">
                    <div class="feature-card">
                        <div class="check-icon">✓</div>
                        <p class="feature-text">We are ISO 27001 Certified and ISO9001 Certified</p>
                    </div>
                </div>

                <div class="col-lg col-md-4 col-sm-6 animate__animated animate__fadeInUp" style="animation-delay: 0.3s;">
                    <div class="feature-card">
                        <div class="check-icon">✓</div>
                        <p class="feature-text">Localized data hosting in Europe, India & China</p>
                    </div>
                </div>

                <div class="col-lg col-md-4 col-sm-6 animate__animated animate__fadeInUp" style="animation-delay: 0.4s;">
                    <div class="feature-card">
                        <div class="check-icon">✓</div>
                        <p class="feature-text">Secure data hosting on Amazon Web Services</p>
                    </div>
                </div>

                <div class="col-lg col-md-4 col-sm-6 animate__animated animate__fadeInUp" style="animation-delay: 0.5s;">
                    <div class="feature-card">
                        <div class="check-icon">✓</div>
                        <p class="feature-text">We follow an Annual Vulnerability and Penetration Testing</p>
                    </div>
                </div>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-lg-3 col-md-6 animate__animated animate__fadeInUp" style="animation-delay: 0.15s;">
                    <div class="cert-card">
                        <img src="https://thumbs.dreamstime.com/b/iso-certified-golden-label-vector-illustration-51941869.jpg?w=576"
                            alt="ISO 9001" class="cert-logo">
                        <p class="cert-text">ISO 9001 CERTIFIED</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 animate__animated animate__fadeInUp" style="animation-delay: 0.25s;">
                    <div class="cert-card">
                        <img src="https://zeotap.com/wp-content/uploads/2025/11/ISO_27001_Final-Logo.jpg"
                            alt="ISO 27001" class="cert-logo">
                        <p class="cert-text">ISO 27001 CERTIFIED</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 animate__animated animate__fadeInUp" style="animation-delay: 0.35s;">
                    <div class="cert-card">
                        <img src="https://www.digitalcheck.com/wp-content/uploads/2023/05/AICPA-SOC2-Type2-logo-375px.jpg"
                            alt="SOC 2" class="cert-logo">
                        <p class="cert-text">SOC2 Type 2</p>
                    </div>
                </div>

            </div>
        </div>

        <div class="text-center">
            <button class="explore-btn animate__animated animate__fadeInUp" style="animation-delay: 0.5s;">
                EXPLORE OUR INFORMATION SECURITY FEATURES
            </button>
        </div>
        </div>
    </section>


    <!-- contact us  -->
    <section class="contact-section text-white " id="contact">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold display-6 animate__animated animate__fadeInDown">Contact Us</h2>
                <p class="text-white-50 animate__animated animate__fadeInUp">
                    Have any questions? We would love to hear from you.
                </p>
            </div>

            <div class="row g-4 mb-5">
                <div class="col-md-4 animate__animated animate__fadeInUp" style="animation-delay: 0.1s;">
                    <div class="contact-card rounded-4 p-4 h-100 text-center">
                        <div class="contact-icon rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3">
                            <i class="fas fa-map-marker-alt text-white fs-5"></i>
                        </div>
                        <h5 class="fw-semibold mb-2">Our Location</h5>
                        <p class="text-white-50 mb-0">
                            123 Business Park, Sector 62<br>
                            Noida, Uttar Pradesh 201301
                        </p>
                    </div>
                </div>

                <div class="col-md-4 animate__animated animate__fadeInUp" style="animation-delay: 0.2s;">
                    <div class="contact-card rounded-4 p-4 h-100 text-center">
                        <div class="contact-icon rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3">
                            <i class="fas fa-phone-alt text-white fs-5"></i>
                        </div>
                        <h5 class="fw-semibold mb-2">Call Us</h5>
                        <p class="text-white-50 mb-0">
                            +91 98765 43210<br>
                            +91 98765 43211
                        </p>
                    </div>
                </div>

                <div class="col-md-4 animate__animated animate__fadeInUp" style="animation-delay: 0.3s;">
                    <div class="contact-card rounded-4 p-4 h-100 text-center">
                        <div class="contact-icon rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3">
                            <i class="fas fa-envelope text-white fs-5"></i>
                        </div>
                        <h5 class="fw-semibold mb-2">Email Us</h5>
                        <p class="text-white-50 mb-0">
                            support@onlineexam.com<br>
                            info@onlineexam.com
                        </p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8 animate__animated animate__fadeInUp" style="animation-delay: 0.25s;">
                    <div class="form-card rounded-4 p-4 p-md-5">

                        <form action="{{ route('contact') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label text-white-50">Full Name</label>
                                    <input type="text" name="name" class="form-control form-control-lg" placeholder="Enter your name">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-white-50">Email Address</label>
                                    <input type="email" name="email" class="form-control form-control-lg" placeholder="Enter your email">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-white-50">Phone Number</label>
                                    <input type="tel" name="phone" class="form-control form-control-lg" placeholder="Enter your phone">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-white-50">Subject</label>
                                    <input type="text" name="subject" class="form-control form-control-lg" placeholder="Subject">
                                </div>
                                <div class="col-12">
                                    <label class="form-label text-white-50">Message</label>
                                    <textarea class="form-control form-control-lg" name="message" rows="5" placeholder="Write your message here..."></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-submit btn-lg w-100 text-white fw-semibold py-3">
                                        Send Message
                                    </button>
                                    @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                    @endif

                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- contact us css  -->


    <style>
        .contact-section {
            background: linear-gradient(135deg, #0b1c3d, #122b57);
            padding: 90px 0;
        }

        .contact-card {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(12px);
            transition: all 0.3s ease;
        }

        .contact-card:hover {
            transform: translateY(-8px);
            background: rgba(255, 255, 255, 0.12);
        }

        .contact-icon {
            width: 55px;
            height: 55px;
            background: linear-gradient(135deg, #00c853, #00e676);
        }

        .form-card {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(12px);
        }

        .form-control {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: #fff;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.12);
            border-color: #00c853;
            box-shadow: 0 0 0 0.2rem rgba(0, 200, 83, 0.25);
            color: #fff;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.45);
        }

        .btn-submit {
            background: linear-gradient(135deg, #00c853, #00e676);
            border: none;
        }

        .btn-submit:hover {
            background: linear-gradient(135deg, #00b34a, #00c853);
            transform: translateY(-2px);
        }
    </style>
    <!-- contact us end  -->


    <footer>
        <div class="container-lg">
            <div class="row">
                <!-- Column 1: About -->
                <div class="col-lg-3 col-md-6 footer-column">
                    <div class="footer-logo">
                        <div class="footer-logo-circle">
                            <i class="fas fa-circle-notch"></i>
                        </div>
                        <div class="footer-logo-text">
                            <strong>Online Exam</strong>
                            <small>Management System</small>
                        </div>
                    </div>
                    <p class="footer-description">
                        Test your skills with our online exam management system. An easy to use solution for Teachers and Students.
                    </p>
                </div>

                <!-- Column 2: Useful Links -->
                <div class="col-lg-3 col-md-6 footer-column">
                    <h5>Useful Links</h5>
                    <ul class="footer-links">
                        <li><a href="#terms">Terms & Conditions</a></li>
                        <li><a href="#privacy">Privacy Policy</a></li>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#contact">Contact Us</a></li>
                        <li><a href="#faq">FAQ</a></li>
                    </ul>
                </div>

                <!-- Column 3: Our Exam Services & Social Networks -->
                <div class="col-lg-3 col-md-6 footer-column">
                    <h5>Our Exam Services</h5>
                    <ul class="footer-links">
                        <li><a href="#practice">Practice Exams</a></li>
                        <li><a href="#fixed">Fixed Time Exams</a></li>
                        <li><a href="#manual">Manual Exams</a></li>
                        <li><a href="#packages">Exam Packages</a></li>
                        <li><a href="#bank">Question Bank</a></li>
                    </ul>
                </div>

                <!-- Column 4: Social Networks -->
                <div class="col-lg-3 col-md-6 footer-column">
                    <h5>Our Social Networks</h5>
                    <p class="social-text">
                        Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies
                    </p>
                    <div class="social-links">
                        <a href="#" class="social-icon" title="YouTube">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="#" class="social-icon" title="Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon" title="Facebook">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#" class="social-icon" title="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="social-icon" title="Skype">
                            <i class="fab fa-skype"></i>
                        </a>
                        <a href="#" class="social-icon" title="LinkedIn">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <p>&copy; Copyright ExamPanel. All Rights Reserved</p>
                <div class="payment-icons">
                    <span class="payment-icon" title="PayPal">
                        <i class="fab fa-paypal"></i>
                    </span>
                    <span class="payment-icon" title="Stripe">
                        <i class="fab fa-stripe"></i>
                    </span>
                    <span class="payment-icon" title="Credit Card">
                        <i class="fas fa-credit-card"></i>
                    </span>
                    <span class="payment-icon" title="Bank Transfer">
                        <i class="fas fa-university"></i>
                    </span>
                    <span class="payment-icon" title="Crypto">
                        <i class="fab fa-bitcoin"></i>
                    </span>
                    <span class="payment-icon" title="More">
                        <i class="fas fa-ellipsis-h"></i>
                    </span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <script>
        // Smooth scroll effect
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>







</body>

</html>