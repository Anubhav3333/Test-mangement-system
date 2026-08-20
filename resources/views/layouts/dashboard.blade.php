<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Menu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="carousel.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="btn-group" style="width: 60px">
            <button type="button" class=" dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://res.cloudinary.com/dpjpz26qm/image/upload/v1674890312/codepen/avatar/man_1_cpqkhl.png" class="img-fluid" alt="" style="width: 35px;">
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#"><i class='bx bx-user-circle'></i> Account</a></li>
                <li><a class="dropdown-item" href="#"><i class='bx bxs-widget'></i> Settings</a></li>
                <li><a class="dropdown-item" href="#"><i class='bx bx-exit'></i> Logout</a></li>
            </ul>
        </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i>
                    <span class="nav_logo-name">AtechSeva</span> </a>
                <div class="nav_list"> <a href="#" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">Dashboard</span> </a>
                    <a href="{{ route('test')}}" class="nav_link"> <i class='bx bx-user nav_icon'></i>
                        <span class="nav_name">Users</span> </a>
                    <a href="#" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">Messages</span> </a> <a href="#" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Bookmark</span> </a> <a href="#" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Files</span> </a>
                    <a href="#" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Stats</span> </a>
                </div>
            </div> <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon'></i>
                <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>

    <!--Container Main start-->



    <!--Container Main end-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
    <script src="main.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
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
    </script

</body>

</html>


<style>
    @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");

    :root {
        --header-height: 3rem;
        --nav-width: 68px;
        --first-color: #031530;
        --first-color-light: #afa5d9;
        --white-color: #f7f6fb;
        --body-font: "Nunito", sans-serif;
        --normal-font-size: 1rem;
        --z-fixed: 100;
    }

    *,
    ::before,
    ::after {
        box-sizing: border-box;
    }

    body {
        position: relative;
        margin: var(--header-height) 0 0 0;
        padding: 0 1rem;
        font-family: var(--body-font);
        font-size: var(--normal-font-size);
        transition: 0.5s;
        background: #f8f9fa;
    }

    a {
        text-decoration: none;
    }

    .header {
        width: 100%;
        height: var(--header-height);
        position: fixed;
        top: 0;
        left: 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 1rem;
        background-color: var(--white-color);

        z-index: var(--z-fixed);
        transition: 0.5s;
        box-shadow: 1px 1px 17px -4px rgb(0 0 0 / 16%);
        -webkit-box-shadow: 1px 1px 17px -4px rgb(0 0 0 / 16%);
        -moz-box-shadow: 1px 1px 17px -4px rgb(0 0 0 / 16%);
    }

    .dropdown-menu {
        box-shadow: 1px 1px 17px -4px rgb(0 0 0 / 24%);
        -webkit-box-shadow: 1px 1px 17px -4px rgb(0 0 0 / 24%);
        -moz-box-shadow: 1px 1px 17px -4px rgb(0 0 0 / 24%);
        border-radius: 10px;
        margin: 0;
        padding: 0;
    }

    .dropdown-item {
        padding: 7px 15px;
    }

    .dropdown-item:hover {
        background-color: #03153056;
        color: var(--white-color);
        border-radius: 10px;
    }

    .header_toggle {
        color: var(--first-color);
        font-size: 1.5rem;
        cursor: pointer;
    }

    .header_img {
        width: 35px;
        height: 35px;
        display: flex;
        justify-content: center;
        border-radius: 50%;
        overflow: hidden;
    }

    .header_img img {
        width: 40px;
    }

    .l-navbar {
        position: fixed;
        top: 0;
        left: -30%;
        width: var(--nav-width);
        height: 100vh;
        background-color: var(--first-color);
        padding: 0.5rem 1rem 0 0;
        transition: 0.5s;
        z-index: var(--z-fixed);
    }

    .nav {
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        overflow: hidden;
    }

    .nav_logo,
    .nav_link {
        display: grid;
        grid-template-columns: max-content max-content;
        align-items: center;
        column-gap: 1rem;
        padding: 0.5rem 0 0.5rem 1.5rem;
    }

    .nav_logo {
        margin-bottom: 2rem;
    }

    .nav_logo-icon {
        font-size: 1.25rem;
        color: var(--white-color);
    }

    .nav_logo-name {
        color: var(--white-color);
        font-weight: 700;
    }

    .nav_link {
        position: relative;
        color: var(--first-color-light);
        margin-bottom: 1.5rem;
        transition: 0.3s;
    }

    .nav_link:hover {
        color: var(--white-color);
    }

    .nav_icon {
        font-size: 1.25rem;
    }

    .sidebarshow {
        left: 0;
    }

    .body-pd {
        padding-left: calc(var(--nav-width) + 1rem);
    }

    .active {
        color: var(--white-color);
    }

    .active::before {
        content: "";
        position: absolute;
        left: 0;
        width: 2px;
        height: 32px;
        background-color: var(--white-color);
    }

    .height-100 {
        height: 100vh;
        padding-top: 25px;
    }

    .btn-group button {
        outline: none;
        box-shadow: none;
        border: none;
        background: transparent;
    }

    .dropdown-toggle::after {
        display: none;
    }

    @media screen and (min-width: 768px) {
        body {
            margin: calc(var(--header-height) + 1rem) 0 0 0;
            padding-left: calc(var(--nav-width) + 1.5rem);
        }

        .header {
            height: calc(var(--header-height) + 1rem);
            padding: 0 2rem 0 calc(var(--nav-width) + 2rem);
        }

        .header_img {
            width: 40px;
            height: 40px;
        }

        .header_img img {
            width: 45px;
        }

        .l-navbar {
            left: 0;
            padding: 1rem 1rem 0 0;
        }

        .sidebarshow {
            width: calc(var(--nav-width) + 156px);
        }

        .body-pd {
            padding-left: calc(var(--nav-width) + 188px);
        }
    }

    footer {
        background: #dcdcdd;
    }

    footer p {
        padding: 20px 0;
        text-align: center;
    }

    /* // carousel.css */
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
        -webkit-clip-path: polygon(0 0, 60% 0, 36% 100%, 0 100%);
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

    .mainslider .owl-item.active h1 {
        -webkit-animation-duration: 1s;
        animation-duration: 1s;
        -webkit-animation-fill-mode: both;
        animation-fill-mode: both;
        animation-name: fadeInDown;
        animation-delay: 0.3s;
    }

    .mainslider .owl-item.active h2 {
        -webkit-animation-duration: 1s;
        animation-duration: 1s;
        -webkit-animation-fill-mode: both;
        animation-fill-mode: both;
        animation-name: fadeInDown;
        animation-delay: 0.3s;
    }

    .mainslider .owl-item.active h4 {
        -webkit-animation-duration: 1s;
        animation-duration: 1s;
        -webkit-animation-fill-mode: both;
        animation-fill-mode: both;
        animation-name: fadeInUp;
        animation-delay: 0.3s;
    }

    .mainslider .owl-item.active .line {
        -webkit-animation-duration: 1s;
        animation-duration: 1s;
        -webkit-animation-fill-mode: both;
        animation-fill-mode: both;
        animation-name: fadeInLeft;
        animation-delay: 0.3s;
    }

    .mainslider .owl-nav .owl-prev {
        position: absolute;
        left: 15px;
        top: 43%;
        opacity: 0;
        -webkit-transition: all 0.4s ease-out;
        transition: all 0.4s ease-out;
        background: rgba(0, 0, 0, 0.5) !important;
        width: 40px;
        cursor: pointer;
        height: 40px;
        position: absolute;
        display: block;
        z-index: 1000;
        border-radius: 0;
    }

    .mainslider .owl-nav .owl-prev span {
        font-size: 1.6875rem;
        color: #fff;
    }

    .mainslider .owl-nav .owl-prev:focus {
        outline: 0;
    }

    .mainslider .owl-nav .owl-prev:hover {
        background: #000 !important;
    }

    .mainslider .owl-nav .owl-next {
        position: absolute;
        right: 15px;
        top: 43%;
        opacity: 0;
        -webkit-transition: all 0.4s ease-out;
        transition: all 0.4s ease-out;
        background: rgba(0, 0, 0, 0.5) !important;
        width: 40px;
        cursor: pointer;
        height: 40px;
        position: absolute;
        display: block;
        z-index: 1000;
        border-radius: 0;
    }

    .mainslider .owl-nav .owl-next span {
        font-size: 1.6875rem;
        color: #fff;
    }

    .mainslider .owl-nav .owl-next:focus {
        outline: 0;
    }

    .mainslider .owl-nav .owl-next:hover {
        background: #000 !important;
    }

    .mainslider:hover .owl-prev {
        left: 0px;
        opacity: 1;
    }

    .mainslider:hover .owl-next {
        right: 0px;
        opacity: 1;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        const showNavbar = (toggleId, navId, bodyId, headerId) => {
            const toggle = document.getElementById(toggleId),
                nav = document.getElementById(navId),
                bodypd = document.getElementById(bodyId),
                headerpd = document.getElementById(headerId);
            // Validate that all variables exist
            if (toggle && nav && bodypd && headerpd) {
                toggle.addEventListener("click", () => {
                    // show navbar
                    nav.classList.toggle("sidebarshow");
                    // change icon
                    toggle.classList.toggle("bx-x");
                    // add padding to body
                    bodypd.classList.toggle("body-pd");
                    // add padding to header
                    headerpd.classList.toggle("body-pd");
                });
            }
        };
        showNavbar("header-toggle", "nav-bar", "body-pd", "header");
        /*===== LINK ACTIVE =====*/
        const linkColor = document.querySelectorAll(".nav_link");

        function colorLink() {
            if (linkColor) {
                linkColor.forEach((l) => l.classList.remove("active"));
                this.classList.add("active");
            }
        }
        linkColor.forEach((l) => l.addEventListener("click", colorLink));
        // Your code to run since DOM is loaded and ready
    });
</script>