<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') | School Management</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&display=swap");

        :root {
            --header-height: 3.5rem;
            --nav-width: 72px;
            --nav-expanded: 240px;
            --sidebar-bg: #0f172a;
            --sidebar-hover: #1e293b;
            --sidebar-active: #3b82f6;
            --sidebar-text: #94a3b8;
            --sidebar-text-active: #ffffff;
            --header-bg: #ffffff;
            --body-bg: #f1f5f9;
            --accent: #3b82f6;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: "Nunito", sans-serif;
            font-size: 0.95rem;
            background: var(--body-bg);
            color: #334155;
            min-height: 100vh;
            padding-top: var(--header-height);
            padding-left: var(--nav-width);
            transition: padding-left 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body.sidebar-expanded {
            padding-left: var(--nav-expanded);
        }

        a {
            text-decoration: none;
        }

        /* Header */
        .header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: var(--header-height);
            background: var(--header-bg);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1.5rem;
            z-index: 1050;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
            transition: padding-left 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body.sidebar-expanded .header {
            padding-left: calc(var(--nav-expanded) + 1.5rem);
        }

        .header_toggle {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            cursor: pointer;
            color: #475569;
            font-size: 1.5rem;
            transition: all 0.2s;
        }

        .header_toggle:hover {
            background: #f1f5f9;
            color: var(--accent);
        }

        .header_toggle i {
            transition: transform 0.3s;
        }

        body.sidebar-expanded .header_toggle i {
            transform: rotate(180deg);
        }

        .header_profile .dropdown-toggle {
            background: transparent;
            border: none;
            padding: 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
        }

        .header_profile .dropdown-toggle::after {
            display: none;
        }

        .header_profile img {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #e2e8f0;
        }

        .header_profile .dropdown-menu {
            border: none;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.12);
            border-radius: 12px;
            padding: 0.5rem;
            min-width: 180px;
            margin-top: 0.5rem !important;
        }

        .header_profile .dropdown-item {
            padding: 0.6rem 1rem;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 0.6rem;
            color: #475569;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.2s;
        }

        .header_profile .dropdown-item:hover {
            background: #f1f5f9;
            color: var(--accent);
        }

        .header_profile .dropdown-item i {
            font-size: 1.1rem;
        }

        .header_profile .dropdown-divider {
            margin: 0.4rem 0.5rem;
        }

        /* Sidebar */
        .l-navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--nav-width);
            height: 100vh;
            background: var(--sidebar-bg);
            padding: 1rem 0.75rem 1rem 0;
            z-index: 1040;
            transition: width 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
        }

        body.sidebar-expanded .l-navbar {
            width: var(--nav-expanded);
        }

        .nav {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .nav_logo {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.5rem 0 1.5rem 1.25rem;
            margin-bottom: 1rem;
            white-space: nowrap;
        }

        .nav_logo-icon {
            font-size: 1.5rem;
            color: var(--accent);
            min-width: 24px;
            text-align: center;
        }

        .nav_logo-name {
            color: var(--sidebar-text-active);
            font-weight: 800;
            font-size: 1.05rem;
            opacity: 0;
            transition: opacity 0.3s;
        }

        body.sidebar-expanded .nav_logo-name {
            opacity: 1;
        }

        .nav_list {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }

        .nav_link {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.75rem 1.25rem;
            color: var(--sidebar-text);
            border-radius: 0 12px 12px 0;
            white-space: nowrap;
            transition: all 0.25s;
            position: relative;
        }

        .nav_link:hover {
            color: var(--sidebar-text-active);
            background: var(--sidebar-hover);
        }

        .nav_link.active {
            color: var(--sidebar-text-active);
            background: rgba(59, 130, 246, 0.15);
        }

        .nav_link.active::before {
            content: "";
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 3px;
            height: 24px;
            background: var(--accent);
            border-radius: 0 4px 4px 0;
        }

        .nav_icon {
            font-size: 1.3rem;
            min-width: 24px;
            text-align: center;
        }

        .nav_name {
            font-weight: 600;
            font-size: 0.9rem;
            opacity: 0;
            transition: opacity 0.3s;
        }

        body.sidebar-expanded .nav_name {
            opacity: 1;
        }

        .nav_bottom {
            margin-top: auto;
            padding-top: 1rem;
        }

        /* Main Content */


        /* Modal */
        .modal-content {
            border: none;
            border-radius: 16px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .modal-header {
            border-bottom: 1px solid #f1f5f9;
            padding: 1.25rem 1.5rem;
        }

        .modal-body {
            padding: 1.5rem;
        }

        .modal-footer {
            border-top: 1px solid #f1f5f9;
            padding: 1rem 1.5rem;
        }

        /* Carousel styles preserved */
        .mainslider .item {
            height: 100vh;
            position: relative;
        }

        .mainslider .item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .mainslider .item .cover {
            padding: 75px 0;
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.6);
            display: flex;
            align-items: center;
        }

        .mainslider .item .cover .mainslider-content {
            position: relative;
            padding: 56px;
            overflow: hidden;
        }

        .mainslider .item .cover .mainslider-content .line {
            content: "";
            display: inline-block;
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
            position: absolute;
            border: 9px solid #fff;
            clip-path: polygon(0 0, 60% 0, 36% 100%, 0 100%);
        }

        .mainslider .item .cover .mainslider-content h2 {
            font-weight: 300;
            font-size: 35px;
            color: #fff;
        }

        .mainslider .item .cover .mainslider-content h1 {
            font-size: 56px;
            font-weight: 600;
            margin: 5px 0 20px;
            word-spacing: 3px;
            color: #fff;
        }

        .mainslider .item .cover .mainslider-content h4 {
            font-size: 24px;
            font-weight: 300;
            line-height: 36px;
            color: #fff;
        }

        .mainslider .owl-item.active h1,
        .mainslider .owl-item.active h2 {
            animation: fadeInDown 1s both 0.3s;
        }

        .mainslider .owl-item.active h4 {
            animation: fadeInUp 1s both 0.3s;
        }

        .mainslider .owl-item.active .line {
            animation: fadeInLeft 1s both 0.3s;
        }

        .mainslider .owl-nav .owl-prev,
        .mainslider .owl-nav .owl-next {
            position: absolute;
            top: 43%;
            width: 40px;
            height: 40px;
            background: rgba(0, 0, 0, 0.5) !important;
            cursor: pointer;
            z-index: 1000;
            opacity: 0;
            transition: all 0.4s ease-out;
        }

        .mainslider .owl-nav .owl-prev {
            left: 15px;
        }

        .mainslider .owl-nav .owl-next {
            right: 15px;
        }

        .mainslider .owl-nav .owl-prev span,
        .mainslider .owl-nav .owl-next span {
            font-size: 1.6875rem;
            color: #fff;
        }

        .mainslider .owl-nav .owl-prev:hover,
        .mainslider .owl-nav .owl-next:hover {
            background: #000 !important;
        }

        .mainslider:hover .owl-prev {
            left: 0;
            opacity: 1;
        }

        .mainslider:hover .owl-next {
            right: 0;
            opacity: 1;
        }

        footer {
            background: #e2e8f0;
            padding: 1.25rem;
            text-align: center;
            color: #64748b;
            font-size: 0.85rem;
        }
    </style>

    @stack('styles')
</head>

<body id="body-pd">

    <!-- Header -->
<header class="header" id="header">
    <div class="header_toggle" id="header-toggle">
        <i class='bx bx-menu'></i>
    </div>

    <div class="header_profile">
       
        <div class="dropdown">
            <button type="button" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://res.cloudinary.com/dpjpz26qm/image/upload/v1674890312/codepen/avatar/man_1_cpqkhl.png" alt="Profile">
                <i class='bx bx-chevron-down text-secondary d-none d-sm-inline'></i>
            </button>

            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                 <span class="me-3 text-secondary">
                Wellcome  to {{ $test->teacher?->name ?? 'Teacher not found' }}
        </span>
     </a>
                </li>

                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <a class="dropdown-item text-danger" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                        <i class='bx bx-log-out'></i> Sign Out
                    </a>
                </li>
            </ul>
        </div>
    </div>
</header>
    <!-- Sidebar -->
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="{{ route('welcome') }}" class="nav_logo">
                    <i class='bx bx-layer nav_logo-icon'></i>
                    <span class="nav_logo-name">School Management</span>
                </a>

                <div class="nav_list">
                    @if(auth()->check() && auth()->user()->role === 'STUDENT')
                    <a href="{{ route('student.Question') }}" class="nav_link">
                        <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">Student Dashboard</span>
                    </a>
                    @endif
                    @if(auth()->check() && auth()->user()->role === 'TEACHER')

                    <a href="{{ route('test') }}" class="nav_link">
                        <i class='bx bx-chalkboard nav_icon'></i>
                        <span class="nav_name">Teacher</span>
                    </a>
                        <a href="{{ route('attempts') }}" class="nav_link">
                        <i class='bi bi-book nav_icon'></i>
                        <span class="nav_name">Student Attempts</span>
                    </a>
                    @endif


                    <a href="/Landing" class="nav_link">
                        <i class='bx bx-folder nav_icon'></i>
                        <span class="nav_name">Home page</span>
                    </a>

                    <!-- <a href="#" class="nav_link">
                        <i class='bx bx-bar-chart-alt-2 nav_icon'></i>
                        <span class="nav_name">Student</span>
                    </a> -->
                </div>
            </div>

            <div class="nav_bottom">
                <a href="#" class="nav_link" data-bs-toggle="modal" data-bs-target="#logoutModal">
                    <i class='bx bx-log-out nav_icon'></i>
                    <span class="nav_name">Sign Out</span>
                </a>
            </div>
        </nav>
    </div>

    <!-- Main Content -->
    <main class="main-content">
        @yield('content')
    </main>

    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">
                        <i class='bx bx-log-out-circle text-danger me-2'></i>Sign Out
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center py-4">
                    <div class="mb-3">
                        <div class="bg-danger-subtle rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                            <i class='bx bx-question-mark text-danger fs-3'></i>
                        </div>
                    </div>
                    <p class="mb-0 text-secondary">Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer justify-content-center border-0 pb-4">
                    <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger rounded-pill px-4">Yes, Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const toggle = document.getElementById("header-toggle");
            const nav = document.getElementById("nav-bar");
            const body = document.getElementById("body-pd");

            if (toggle && nav && body) {
                toggle.addEventListener("click", function() {
                    body.classList.toggle("sidebar-expanded");
                });
            }

            const links = document.querySelectorAll(".nav_link");
            const currentPath = window.location.pathname;

            links.forEach(function(link) {
                const href = link.getAttribute("href");
                if (href && href !== "#") {
                    try {
                        const linkPath = new URL(href, window.location.origin).pathname;
                        if (linkPath === currentPath) {
                            link.classList.add("active");
                        }
                    } catch (e) {}
                }
            });
        });
    </script>

    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            dots: false,
            nav: true,
            autoplay: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });
    </script>
    @stack('scripts')

</body>

</html>