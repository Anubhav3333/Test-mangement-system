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
    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- AOS - Animate On Scroll -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-color: #e74c3c;
            --primary-dark: #c0392b;
            --secondary-color: #2c3e50;
            --accent-color: #00c853;
            --text-light: #666;
            --border-light: #e0e0e0;
            --transition-smooth: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }

        /* ===== NAVIGATION BAR ===== */
        .navbar {
            background-color: #f8f9fa;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
            padding: 1rem 0;
            backdrop-filter: blur(10px);
            position: relative;
            z-index: 1000;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: bold;
            color: var(--secondary-color) !important;
            transition: var(--transition-smooth);
        }

        .navbar-brand:hover {
            transform: translateY(-2px);
        }

        .navbar-brand img {
            height: 50px;
            width: auto;
        }

        .navbar-brand-icon {
            background: linear-gradient(135deg, var(--primary-color), #d63031);
            padding: 10px 14px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
        }

        .navbar-brand-text {
            font-size: 18px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .navbar-brand-text small {
            display: block;
            font-size: 11px;
            color: var(--primary-color);
            font-weight: 600;
            margin-top: -5px;
        }

        .nav-link {
            color: var(--secondary-color) !important;
            font-weight: 500;
            margin: 0 12px;
            transition: var(--transition-smooth);
            position: relative;
            padding-bottom: 2px;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .nav-link:hover {
            color: var(--primary-color) !important;
        }

        .nav-link.active {
            color: var(--primary-color) !important;
        }

        .nav-link.active::after {
            width: 100%;
        }

        /* ===== HERO SECTION ===== */
        .hero-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            padding: 100px 0;
            min-height: 700px;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            right: -10%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(231, 76, 60, 0.08) 0%, transparent 70%);
            border-radius: 50%;
            animation: floatBg 8s ease-in-out infinite;
        }

        @keyframes floatBg {
            0%, 100% { transform: translate(0, 0); }
            50% { transform: translate(-30px, -30px); }
        }

        .hero-content {
            padding: 40px 0;
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: 56px;
            font-weight: 800;
            color: var(--secondary-color);
            margin-bottom: 24px;
            line-height: 1.2;
            letter-spacing: -1.5px;
        }

        .hero-title .highlight {
            background: linear-gradient(135deg, var(--primary-color), #d63031);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-subtitle {
            font-size: 18px;
            color: var(--text-light);
            line-height: 1.7;
            margin-bottom: 40px;
            max-width: 550px;
            font-weight: 400;
        }

        .hero-buttons {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .btn-custom {
            padding: 14px 40px;
            font-weight: 600;
            border-radius: 8px;
            transition: var(--transition-smooth);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
            font-size: 16px;
        }

        .btn-custom::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: inherit;
            transition: left 0.5s ease;
            z-index: -1;
        }

        .btn-custom:hover::before {
            left: 0;
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, var(--primary-color), #d63031);
            color: white;
            box-shadow: 0 8px 20px rgba(231, 76, 60, 0.2);
        }

        .btn-primary-custom:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(231, 76, 60, 0.4);
            color: white;
        }

        .btn-secondary-custom {
            background: white;
            color: var(--secondary-color);
            border: 2px solid var(--secondary-color);
            box-shadow: 0 4px 15px rgba(44, 62, 80, 0.1);
        }

        .btn-secondary-custom:hover {
            background: var(--secondary-color);
            color: white;
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(44, 62, 80, 0.3);
        }

        .hero-image {
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .hero-image img {
            max-width: 100%;
            height: auto;
        }

        .hero-svg-wrapper {
            position: relative;
            display: inline-block;
        }

        .hero-svg-wrapper svg {
            filter: drop-shadow(0 20px 40px rgba(0, 0, 0, 0.1));
        }

        /* ===== EXAM SERIES SECTION ===== */
        .exam-series-section {
            background: linear-gradient(135deg, #0f0c29 0%, #302b63 50%, #24243e 100%);
            padding: 100px 0;
            position: relative;
            overflow: hidden;
            min-height: auto;
        }

        .exam-series-section::before,
        .exam-series-section::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            animation: floatBg 20s infinite ease-in-out;
            z-index: 0;
        }

        .exam-series-section::before {
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(99, 102, 241, 0.1) 0%, transparent 70%);
            top: -200px;
            left: -150px;
        }

        .exam-series-section::after {
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(236, 72, 153, 0.08) 0%, transparent 70%);
            bottom: -150px;
            right: -100px;
            animation-direction: reverse;
        }

        .exam-series-section .section-container {
            position: relative;
            z-index: 1;
        }

        .section-title {
            font-size: 48px;
            font-weight: 800;
            text-align: center;
            color: white;
            margin-bottom: 70px;
            position: relative;
            letter-spacing: -1px;
        }

        .section-title::after {
            content: '';
            position: absolute;
            width: 140px;
            height: 6px;
            background: linear-gradient(90deg, #6366f1, #a855f7, #ec4899);
            bottom: -20px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 10px;
            box-shadow: 0 0 25px rgba(99, 102, 241, 0.6);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 24px;
            padding: 32px;
            height: 100%;
            transition: var(--transition-smooth);
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        }

        .glass-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.15) 0%, transparent 50%);
            pointer-events: none;
            transition: left 0.7s ease;
        }

        .glass-card:hover::before {
            left: 100%;
        }

        .glass-card::after {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 24px;
            padding: 1px;
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.5), rgba(236, 72, 153, 0.3));
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0;
            transition: opacity 0.4s ease;
            pointer-events: none;
        }

        .glass-card:hover::after {
            opacity: 1;
        }

        .glass-card:hover {
            transform: translateY(-16px) scale(1.02);
            background: rgba(255, 255, 255, 0.12);
            border-color: rgba(255, 255, 255, 0.3);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.5),
                0 0 50px rgba(99, 102, 241, 0.4),
                inset 0 1px 0 rgba(255, 255, 255, 0.3);
        }

        .exam-icon-wrapper {
            width: 120px;
            height: 120px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 24px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.15);
            transition: var(--transition-smooth);
            position: relative;
        }

        .exam-icon-wrapper::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at center, rgba(255, 255, 255, 0.15), transparent);
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .glass-card:hover .exam-icon-wrapper {
            background: rgba(255, 255, 255, 0.12);
            border-color: rgba(255, 255, 255, 0.3);
            box-shadow: 0 0 30px rgba(99, 102, 241, 0.3);
            transform: scale(1.1);
        }

        .glass-card:hover .exam-icon-wrapper::before {
            opacity: 1;
        }

        .exam-icon-wrapper i {
            font-size: 3.8rem;
            color: #a5b4fc;
            transition: var(--transition-smooth);
            filter: drop-shadow(0 0 12px rgba(165, 180, 252, 0.4));
        }

        .glass-card:hover .exam-icon-wrapper i {
            color: #ec4899;
            font-size: 4.2rem;
            filter: drop-shadow(0 0 20px rgba(236, 72, 153, 0.6));
            transform: scale(1.15) rotate(8deg);
        }

        .exam-title {
            color: white;
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 14px;
            letter-spacing: -0.5px;
        }

        .exam-desc {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 20px;
            min-height: 80px;
            flex-grow: 1;
        }

        .include-title {
            color: #a5b4fc;
            font-weight: 700;
            font-size: 0.85rem;
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .include-list {
            list-style: none;
            padding: 0;
            margin: 0 0 20px 0;
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9rem;
        }

        .include-list li {
            margin-bottom: 8px;
            position: relative;
            padding-left: 24px;
            transition: var(--transition-smooth);
        }

        .include-list li::before {
            content: "✓";
            position: absolute;
            left: 0;
            color: #4ade80;
            font-weight: bold;
            font-size: 1.1rem;
        }

        .glass-card:hover .include-list li {
            transform: translateX(6px);
            color: rgba(255, 255, 255, 0.95);
        }

        .price-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.15);
            gap: 16px;
        }

        .price {
            color: white;
            font-size: 1.6rem;
            font-weight: 800;
            background: linear-gradient(135deg, #6366f1, #a855f7);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .price.free {
            background: linear-gradient(135deg, #4ade80, #22c55e);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .btn-buy {
            background: linear-gradient(135deg, #2563EB 0%, #4F46E5 50%, #7C3AED 100%);
            border: none;
            color: white;
            padding: 12px 28px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.9rem;
            letter-spacing: 0.3px;
            transition: var(--transition-smooth);
            box-shadow: 0 6px 18px rgba(79, 70, 229, 0.35);
            white-space: nowrap;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .btn-buy::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, #7C3AED 0%, #8B5CF6 50%, #EC4899 100%);
            opacity: 0;
            transition: opacity 0.4s ease;
            z-index: -1;
        }

        .btn-buy:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 28px rgba(79, 70, 229, 0.5);
            color: white;
        }

        .btn-buy:hover::before {
            opacity: 1;
        }

        .btn-buy:active {
            transform: translateY(-1px);
        }

        .btn-buy span {
            position: relative;
            z-index: 2;
        }

        .card-wrapper {
            animation: fadeInUp 0.8s ease forwards;
            opacity: 0;
        }

        .card-wrapper:nth-child(1) {
            animation-delay: 0.15s;
        }

        .card-wrapper:nth-child(2) {
            animation-delay: 0.3s;
        }

        .card-wrapper:nth-child(3) {
            animation-delay: 0.45s;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ===== SECURITY SECTION ===== */
        .security-section {
            background: linear-gradient(135deg, #0b1c3d 0%, #0f2849 100%);
            padding: 100px 0 120px;
            color: white;
            position: relative;
        }

        .security-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        }

        .security-title {
            font-size: 2.2rem;
            font-weight: 800;
            text-align: center;
            margin-bottom: 60px;
            line-height: 1.4;
            letter-spacing: -1px;
        }

        .feature-card {
            background: white;
            border-radius: 16px;
            padding: 28px 24px;
            height: 100%;
            position: relative;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            transition: var(--transition-smooth);
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 200, 131, 0.1), transparent);
            transition: left 0.6s ease;
            pointer-events: none;
        }

        .feature-card:hover::before {
            left: 100%;
        }

        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.25);
        }

        .check-icon {
            position: absolute;
            top: -16px;
            left: 24px;
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, var(--accent-color), #00b34a);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 18px;
            font-weight: bold;
            box-shadow: 0 6px 16px rgba(0, 200, 83, 0.3);
        }

        .feature-text {
            color: #1a2b4a;
            font-size: 1rem;
            font-weight: 600;
            line-height: 1.5;
            margin-top: 12px;
            margin-bottom: 0;
        }

        .cert-card {
            background: white;
            border-radius: 16px;
            padding: 24px;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 18px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            transition: var(--transition-smooth);
        }

        .cert-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.25);
        }

        .cert-logo {
            width: 70px;
            height: 70px;
            object-fit: contain;
            flex-shrink: 0;
        }

        .cert-text {
            color: #1a2b4a;
            font-size: 0.95rem;
            font-weight: 700;
            margin: 0;
            line-height: 1.3;
            letter-spacing: 0.3px;
        }

        .explore-btn {
            background: linear-gradient(135deg, var(--accent-color), #00b34a);
            color: white;
            border: none;
            padding: 16px 40px;
            font-size: 1rem;
            font-weight: 700;
            border-radius: 8px;
            letter-spacing: 0.5px;
            transition: var(--transition-smooth);
            margin-top: 60px;
            display: inline-block;
            box-shadow: 0 8px 20px rgba(0, 200, 83, 0.3);
        }

        .explore-btn:hover {
            background: linear-gradient(135deg, #00b34a, #008c36);
            color: white;
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(0, 200, 83, 0.45);
            text-decoration: none;
        }

        /* ===== CONTACT SECTION ===== */
        .contact-section {
            background: linear-gradient(135deg, #0b1c3d, #122b57);
            padding: 100px 0 120px;
            color: white;
        }

        .contact-card {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(15px);
            transition: var(--transition-smooth);
            border-radius: 20px;
            padding: 40px 30px;
            position: relative;
            overflow: hidden;
        }

        .contact-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(0, 200, 83, 0.1), transparent);
            border-radius: 50%;
            transition: all 0.6s ease;
        }

        .contact-card:hover::before {
            top: -25%;
            right: -25%;
        }

        .contact-card:hover {
            transform: translateY(-12px);
            background: rgba(255, 255, 255, 0.12);
            border-color: rgba(255, 255, 255, 0.25);
        }

        .contact-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--accent-color), #00b34a);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            margin: 0 auto 20px;
            box-shadow: 0 8px 20px rgba(0, 200, 83, 0.3);
        }

        .contact-card h5 {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 14px;
            letter-spacing: -0.3px;
        }

        .contact-card p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.95rem;
            margin: 0;
            line-height: 1.6;
        }

        .form-card {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 50px;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: white;
            border-radius: 10px;
            padding: 14px 18px;
            transition: var(--transition-smooth);
            font-size: 0.95rem;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.12);
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.2rem rgba(0, 200, 83, 0.25);
            color: white;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.45);
        }

        .form-label {
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 8px;
            color: rgba(255, 255, 255, 0.7) !important;
        }

        .btn-submit {
            background: linear-gradient(135deg, var(--accent-color), #00b34a);
            border: none;
            color: white;
            font-weight: 700;
            border-radius: 10px;
            padding: 16px;
            font-size: 1rem;
            letter-spacing: 0.5px;
            transition: var(--transition-smooth);
            box-shadow: 0 8px 20px rgba(0, 200, 83, 0.3);
        }

        .btn-submit:hover {
            background: linear-gradient(135deg, #00b34a, #008c36);
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(0, 200, 83, 0.45);
            color: white;
        }

        .btn-submit:active {
            transform: translateY(-1px);
        }

        /* ===== FOOTER ===== */
        footer {
            background: linear-gradient(135deg, #0a0e27, #0f1a3c);
            padding: 80px 0 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            color: white;
            position: relative;
        }

        .footer-column h5 {
            font-weight: 800;
            color: white;
            margin-bottom: 28px;
            font-size: 1.1rem;
            letter-spacing: -0.3px;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 20px;
        }

        .footer-logo-circle {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary-color), #d63031);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            font-weight: bold;
            flex-shrink: 0;
        }

        .footer-logo-text {
            line-height: 1.3;
        }

        .footer-logo-text strong {
            display: block;
            font-size: 16px;
            color: white;
            font-weight: 700;
        }

        .footer-logo-text small {
            color: var(--primary-color);
            font-weight: 600;
            font-size: 11px;
        }

        .footer-description {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
            line-height: 1.7;
            margin-bottom: 24px;
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 14px;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            font-size: 0.9rem;
            transition: var(--transition-smooth);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .footer-links a::before {
            content: "›";
            font-weight: bold;
            color: var(--primary-color);
            font-size: 1.2rem;
        }

        .footer-links a:hover {
            color: var(--primary-color);
            padding-left: 6px;
        }

        .social-links {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 24px;
        }

        .social-icon {
            width: 42px;
            height: 42px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: var(--transition-smooth);
            font-size: 16px;
            border: 1px solid rgba(255, 255, 255, 0.15);
        }

        .social-icon:hover {
            background: linear-gradient(135deg, var(--primary-color), #d63031);
            border-color: transparent;
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(231, 76, 60, 0.3);
        }

        .social-text {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.85rem;
            line-height: 1.7;
            margin-bottom: 18px;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            padding-top: 40px;
            text-align: center;
            margin-top: 40px;
        }

        .footer-bottom p {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.9rem;
            margin-bottom: 20px;
        }

        .payment-icons {
            display: flex;
            justify-content: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .payment-icon {
            width: 44px;
            height: 44px;
            background: white;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            transition: var(--transition-smooth);
            color: var(--secondary-color);
        }

        .payment-icon:hover {
            border-color: var(--primary-color);
            box-shadow: 0 4px 12px rgba(231, 76, 60, 0.2);
            transform: translateY(-2px);
            color: var(--primary-color);
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 992px) {
            .hero-title {
                font-size: 42px;
            }

            .hero-section {
                padding: 80px 0;
                min-height: auto;
            }

            .section-title {
                font-size: 36px;
            }

            .hero-buttons {
                flex-direction: column;
            }

            .btn-custom {
                width: 100%;
                justify-content: center;
            }

            .form-card {
                padding: 30px;
            }
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 36px;
                margin-bottom: 16px;
            }

            .hero-subtitle {
                font-size: 16px;
                margin-bottom: 24px;
            }

            .section-title {
                font-size: 28px;
                margin-bottom: 40px;
            }

            .section-title::after {
                width: 100px;
                height: 4px;
                bottom: -15px;
            }

            .glass-card {
                padding: 24px;
            }

            .exam-icon-wrapper {
                width: 100px;
                height: 100px;
            }

            .exam-icon-wrapper i {
                font-size: 3rem;
            }

            .exam-title {
                font-size: 1.2rem;
            }

            .price {
                font-size: 1.4rem;
            }

            .navbar-brand-text {
                font-size: 16px;
            }

            .nav-link {
                margin: 8px 0;
                font-size: 0.95rem;
            }

            .security-title {
                font-size: 1.8rem;
                margin-bottom: 40px;
            }

            .security-section {
                padding: 60px 0 80px;
            }

            .contact-section {
                padding: 60px 0 80px;
            }

            .form-card {
                padding: 24px;
            }

            .contact-card {
                padding: 28px 20px;
            }

            footer {
                padding: 60px 0 20px;
            }

            .footer-column {
                margin-bottom: 40px;
            }
        }

        /* Reduce animations on mobile */
        @media (prefers-reduced-motion: reduce) {
            * {
                animation: none !important;
                transition: none !important;
            }
        }
    </style>
</head>

<body>

    <!-- ===== NAVIGATION BAR ===== -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container-lg">
            <a class="navbar-brand" href="#home">
                <div class="navbar-brand-icon">
                    <i class="fas fa-circle-notch"></i>
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
                            <li><a class="dropdown-item" href="#">About Us</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#register">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ===== HERO SECTION ===== -->
    <section class="hero-section" id="home">
        <div class="container-lg">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 hero-content">
                    <h1 class="hero-title" data-aos="fade-up" data-aos-delay="100">
                        Online Exam <span class="highlight">Management</span>
                    </h1>
                    <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="200">
                        Test your skills with our online exam management system. An easy to use solution for Teachers and Students.
                    </p>
                    <div class="hero-buttons" data-aos="fade-up" data-aos-delay="300">
                        <a href="#" class="btn-custom btn-primary-custom">
                            <i class="fas fa-rocket"></i>
                            Get Started
                        </a>
                        <a href="#packages" class="btn-custom btn-secondary-custom">
                            <i class="fas fa-arrow-right"></i>
                            Learn More
                        </a>
                    </div>
                </div>

                <div class="col-lg-6 hero-image" data-aos="fade-left" data-aos-delay="200">
                    <div class="hero-svg-wrapper">
                        <svg viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg" style="max-width: 100%; height: auto;">
                            <!-- Books Stack -->
                            <g class="books-stack">
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
        </div>
    </section>

    <!-- ===== EXAM SERIES SECTION ===== -->
    <section class="exam-series-section" id="packages">
        <div class="container-lg section-container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">Our Exam Series</h2>
            </div>

            <div class="row g-4 justify-content-center">
                <!-- Card 1 -->
                <div class="col-lg-4 col-md-6 card-wrapper" data-aos="fade-up" data-aos-delay="100">
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
                <div class="col-lg-4 col-md-6 card-wrapper" data-aos="fade-up" data-aos-delay="200">
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

                <!-- Card 3 -->
                <div class="col-lg-4 col-md-6 card-wrapper" data-aos="fade-up" data-aos-delay="300">
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

    <!-- ===== SECURITY SECTION ===== -->
    <section class="security-section">
        <div class="container-lg">
            <h2 class="security-title" data-aos="fade-up">
                We offer impeccable data security standards with our online proctoring suite
            </h2>

            <div class="row g-4 mb-5">
                <div class="col-lg col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card">
                        <div class="check-icon">✓</div>
                        <p class="feature-text">GDPR Ready Compliance</p>
                    </div>
                </div>

                <div class="col-lg col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="150">
                    <div class="feature-card">
                        <div class="check-icon">✓</div>
                        <p class="feature-text">ISO 27001 & ISO9001 Certified</p>
                    </div>
                </div>

                <div class="col-lg col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card">
                        <div class="check-icon">✓</div>
                        <p class="feature-text">Localized Data Hosting Worldwide</p>
                    </div>
                </div>

                <div class="col-lg col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="250">
                    <div class="feature-card">
                        <div class="check-icon">✓</div>
                        <p class="feature-text">Secure AWS Hosting Infrastructure</p>
                    </div>
                </div>

                <div class="col-lg col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-card">
                        <div class="check-icon">✓</div>
                        <p class="feature-text">Annual Security & Penetration Testing</p>
                    </div>
                </div>
            </div>

            <div class="row g-4 justify-content-center mb-5">
                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="150">
                    <div class="cert-card">
                        <img src="https://thumbs.dreamstime.com/b/iso-certified-golden-label-vector-illustration-51941869.jpg?w=576"
                            alt="ISO 9001" class="cert-logo">
                        <p class="cert-text">ISO 9001</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="250">
                    <div class="cert-card">
                        <img src="https://zeotap.com/wp-content/uploads/2025/11/ISO_27001_Final-Logo.jpg"
                            alt="ISO 27001" class="cert-logo">
                        <p class="cert-text">ISO 27001</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="350">
                    <div class="cert-card">
                        <img src="https://www.digitalcheck.com/wp-content/uploads/2023/05/AICPA-SOC2-Type2-logo-375px.jpg"
                            alt="SOC 2" class="cert-logo">
                        <p class="cert-text">SOC2 Type 2</p>
                    </div>
                </div>
            </div>

            <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                <button class="explore-btn">
                    <i class="fas fa-shield-alt"></i>
                    EXPLORE SECURITY FEATURES
                </button>
            </div>
        </div>
    </section>

    <!-- ===== CONTACT SECTION ===== -->
    <section class="contact-section" id="contact">
        <div class="container-lg">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="section-title" style="color: white; margin-bottom: 20px;">Contact Us</h2>
                <p style="color: rgba(255, 255, 255, 0.8); font-size: 1.05rem;">
                    Have any questions? We would love to hear from you.
                </p>
            </div>

            <div class="row g-4 mb-5">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="contact-card text-center">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h5>Our Location</h5>
                        <p>
                            123 Business Park, Sector 62<br>
                            Noida, Uttar Pradesh 201301
                        </p>
                    </div>
                </div>

                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="contact-card text-center">
                        <div class="contact-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <h5>Call Us</h5>
                        <p>
                            +91 98765 43210<br>
                            +91 98765 43211
                        </p>
                    </div>
                </div>

                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="contact-card text-center">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h5>Email Us</h5>
                        <p>
                            support@onlineexam.com<br>
                            info@onlineexam.com
                        </p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                    <div class="form-card">
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" class="form-control" placeholder="Enter your name">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email Address</label>
                                    <input type="email" class="form-control" placeholder="Enter your email">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" placeholder="Enter your phone">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Subject</label>
                                    <input type="text" class="form-control" placeholder="Subject">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Message</label>
                                    <textarea class="form-control" rows="5" placeholder="Write your message here..."></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-submit btn-lg w-100">
                                        <i class="fas fa-paper-plane"></i>
                                        Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== FOOTER ===== -->
    <footer>
        <div class="container-lg">
            <div class="row">
                <!-- Column 1: About -->
                <div class="col-lg-3 col-md-6 footer-column" data-aos="fade-up" data-aos-delay="50">
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
                <div class="col-lg-3 col-md-6 footer-column" data-aos="fade-up" data-aos-delay="100">
                    <h5>Useful Links</h5>
                    <ul class="footer-links">
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>

                <!-- Column 3: Our Exam Services -->
                <div class="col-lg-3 col-md-6 footer-column" data-aos="fade-up" data-aos-delay="150">
                    <h5>Our Exam Services</h5>
                    <ul class="footer-links">
                        <li><a href="#">Practice Exams</a></li>
                        <li><a href="#">Fixed Time Exams</a></li>
                        <li><a href="#">Manual Exams</a></li>
                        <li><a href="#">Exam Packages</a></li>
                        <li><a href="#">Question Bank</a></li>
                    </ul>
                </div>

                <!-- Column 4: Social Networks -->
                <div class="col-lg-3 col-md-6 footer-column" data-aos="fade-up" data-aos-delay="200">
                    <h5>Our Social Networks</h5>
                    <p class="social-text">
                        Connect with us on social media for updates, tips, and exam resources.
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
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    
    <!-- GSAP Animation Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    
    <!-- AOS - Animate On Scroll -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

    <script>
        // Initialize AOS (Animate On Scroll)
        AOS.init({
            duration: 800,
            easing: 'ease-in-out-cubic',
            once: false,
            offset: 50
        });

        // Register ScrollTrigger
        gsap.registerPlugin(ScrollTrigger);

        // Hero Section Animations
        gsap.from('.hero-title', {
            duration: 1,
            y: 30,
            opacity: 0,
            delay: 0.2
        });

        gsap.from('.hero-subtitle', {
            duration: 1,
            y: 20,
            opacity: 0,
            delay: 0.4
        });

        gsap.from('.hero-buttons', {
            duration: 1,
            y: 20,
            opacity: 0,
            delay: 0.6
        });

        // SVG Elements Animation
        const svgElements = [
            { selector: '.books-stack', duration: 3, yoyo: true },
            { selector: '.graduation-cap', duration: 4, yoyo: true },
            { selector: '.student-figure', duration: 2.5, yoyo: true },
            { selector: '.laptop', duration: 3, yoyo: true },
            { selector: '.documents', duration: 3.5, yoyo: true },
            { selector: '.person-left', duration: 2.8, yoyo: true }
        ];

        svgElements.forEach(element => {
            gsap.from(element.selector, {
                duration: element.duration,
                y: -15,
                repeat: -1,
                yoyo: true,
                ease: 'sine.inOut',
                delay: Math.random() * 0.5
            });
        });

        // Section Title Animation
        gsap.utils.toArray('.section-title').forEach(title => {
            gsap.from(title, {
                scrollTrigger: {
                    trigger: title,
                    start: 'top 80%'
                },
                duration: 1,
                y: 30,
                opacity: 0
            });
        });

        // Card Stagger Animation
        gsap.from('.glass-card', {
            scrollTrigger: {
                trigger: '.exam-series-section',
                start: 'top 70%'
            },
            duration: 0.8,
            y: 40,
            opacity: 0,
            stagger: 0.15
        });

        // Feature Cards Animation
        gsap.from('.feature-card', {
            scrollTrigger: {
                trigger: '.security-section',
                start: 'top 70%'
            },
            duration: 0.8,
            y: 30,
            opacity: 0,
            stagger: 0.1
        });

        // Contact Cards Animation
        gsap.from('.contact-card', {
            scrollTrigger: {
                trigger: '.contact-section',
                start: 'top 70%'
            },
            duration: 0.8,
            y: 30,
            opacity: 0,
            stagger: 0.15
        });

        // Navbar Link Hover Effect with GSAP
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('mouseenter', function() {
                gsap.to(this, { duration: 0.3, color: 'var(--primary-color)' });
            });
            link.addEventListener('mouseleave', function() {
                if (!this.classList.contains('active')) {
                    gsap.to(this, { duration: 0.3, color: 'var(--secondary-color)' });
                }
            });
        });

        // Button Hover Effects
        document.querySelectorAll('.btn-custom').forEach(btn => {
            btn.addEventListener('mouseenter', function() {
                gsap.to(this, { duration: 0.3, scale: 1.05, ease: 'back.out' });
            });
            btn.addEventListener('mouseleave', function() {
                gsap.to(this, { duration: 0.3, scale: 1 });
            });
        });

        // Smooth Scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    gsap.to(window, {
                        duration: 0.8,
                        scrollTo: target,
                        ease: 'power3.inOut'
                    });
                }
            });
        });

        // Floating Background Animation
        gsap.to('.hero-section::before', {
            duration: 8,
            y: -30,
            repeat: -1,
            yoyo: true,
            ease: 'sine.inOut'
        });

        // Form Input Focus Animation
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('focus', function() {
                gsap.to(this, {
                    duration: 0.3,
                    scale: 1.02,
                    boxShadow: '0 0 0 0.2rem rgba(0, 200, 83, 0.25)'
                });
            });
            input.addEventListener('blur', function() {
                gsap.to(this, { duration: 0.3, scale: 1 });
            });
        });

        // Footer Links Animation
        document.querySelectorAll('.footer-links a').forEach(link => {
            link.addEventListener('mouseenter', function() {
                gsap.to(this, { duration: 0.3, x: 8, color: 'var(--primary-color)' });
            });
            link.addEventListener('mouseleave', function() {
                gsap.to(this, { duration: 0.3, x: 0, color: 'rgba(255, 255, 255, 0.7)' });
            });
        });

        // Social Icons Animation
        document.querySelectorAll('.social-icon').forEach(icon => {
            icon.addEventListener('mouseenter', function() {
                gsap.to(this, {
                    duration: 0.3,
                    y: -6,
                    scale: 1.1,
                    backgroundColor: 'var(--primary-color)'
                });
            });
            icon.addEventListener('mouseleave', function() {
                gsap.to(this, {
                    duration: 0.3,
                    y: 0,
                    scale: 1,
                    backgroundColor: 'rgba(255, 255, 255, 0.1)'
                });
            });
        });

        // Payment Icons Animation
        document.querySelectorAll('.payment-icon').forEach(icon => {
            icon.addEventListener('mouseenter', function() {
                gsap.to(this, {
                    duration: 0.3,
                    y: -4,
                    borderColor: 'var(--primary-color)',
                    color: 'var(--primary-color)'
                });
            });
            icon.addEventListener('mouseleave', function() {
                gsap.to(this, {
                    duration: 0.3,
                    y: 0,
                    borderColor: 'rgba(0, 0, 0, 0.1)',
                    color: 'var(--secondary-color)'
                });
            });
        });

        // Refresh AOS on page load
        window.addEventListener('load', function() {
            AOS.refresh();
        });
    </script>
</body>

</html>