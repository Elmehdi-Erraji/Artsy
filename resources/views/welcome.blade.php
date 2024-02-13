<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Artsy</title>
    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/img/apple-touch-icon.png') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">


    <!-- App css -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Icons css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>

<body class="blog-page" data-bs-spy="scroll" data-bs-target="#navmenu">

<!-- ======= Header ======= -->
<header id="header" class="header sticky-top d-flex align-items-center">
    <div class="container-fluid d-flex align-items-center justify-content-between">
        <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto me-xl-0">
            <h1>Artsy</h1>
            <span>.</span>
        </a>

        <!-- Nav Menu -->
        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ url('/#hero') }}">Home</a></li>
                <li><a href="{{ url('/#about') }}">About</a></li>
                <li><a href="{{ url('/#services') }}">Services</a></li>
                <li><a href="{{ url('/#portfolio') }}">Portfolio</a></li>
                <li><a href="{{ url('/#team') }}">Team</a></li>
                <li><a href="{{ url('/blog') }}" class="{{ Request::is('blog') ? 'active' : '' }}">Blog</a></li>
                <li><a href="{{ url('/#contact') }}">Contact</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav><!-- End Nav Menu -->

        @guest
            <div>
                <a class="btn btn-outline-primary me-2" href="{{ route('login') }}">Login</a>
                <a class="btn btn-primary" href="{{ route('register') }}">Register</a>
            </div>
        @else
            <div class="dropdown">
                <a class="nav-link dropdown-toggle arrow-none nav-user" href="#" role="button"
                   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="account-user-avatar">
                        @if (Auth::user()->getFirstMedia('avatars'))
                            <img src="{{ Auth::user()->getFirstMedia('avatars')->getUrl() }}" class="rounded-circle" alt="Avatar" width="50">
                        @else
                            <i class="ri-account-circle-line fs-18 align-middle me-1"></i>
                        @endif
                    </span>
                    <span class="d-lg-block d-none">
                        <h5 class="my-0 fw-normal">{{ Auth::user()->name }} <i
                                class="ri-arrow-down-s-line d-none d-sm-inline-block align-middle"></i></h5>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
                    <!-- item-->
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <!-- item-->
                    <a href="{{ route('profile.index') }}" class="dropdown-item">
                        <i class="ri-account-circle-line fs-18 align-middle me-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="#" class="dropdown-item">
                        <i class="ri-customer-service-2-line fs-18 align-middle me-1"></i>
                        <span>Support</span>
                    </a>

                    <!-- item-->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="#" class="dropdown-item"
                           onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="ri-logout-box-line fs-18 align-middle me-1"></i>
                            <span>Logout</span>
                        </a>
                    </form>
                </div>
            </div>
        @endguest
    </div>
</header><!-- End Header -->

<main id="main">

    <!-- Blog Page Title & Breadcrumbs -->
    <div data-aos="fade" class="page-title" style="background-image: url({{ asset('assets/images/test.jpg') }}); background-size: cover; background-position: center; position: relative; overflow: hidden;">
        <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(255, 255, 255, 0);"></div>
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1 style="color: #000; font-size: 3em; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Welcome To Artsy</h1>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
    </div><!-- End Page Title -->

    <!-- Blog Section - Blog Page -->
    <section id="blog" class="blog">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4 posts-list">

                @foreach($projects as $project)
                    <div class="col-xl-4 col-lg-6">
                        <article>
                            <div class="post-img">
                                <img src="{{$project->getFirstMedia('projects')->getUrl() }}" alt="" class="img-fluid">
                            </div>

                            <p class="post-category">{{ $project->category }}</p>

                            <h2 class="title">
                                <a href="#">{{ Str::limit($project->title, 50) }}</a>
                            </h2>

                            <div class="d-flex align-items-center">
                                <div class="post-meta">
                                    <p class="post-date">
                                        <strong>Start Date : </strong> {{ $project->start_date }}
                                    </p>
                                    <p class="post-date">
                                        <strong>Deadline :</strong> {{ $project->deadline }}
                                    </p>
                                </div>
                            </div>
                            <br>

                            @guest
                                <a href="{{ route('login') }}" class="btn btn-secondary">Participate</a>
                                <a href="{{ route('login') }}" class="btn btn-info">See More Details</a>
                            @else
                                <div class="mt-2">
                                    <form id="approvalForm" action="{{ route('request.status') }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="project_id" value="{{ $project->id }}">
                                        <button type="submit" name="request_status" value="0" class="btn btn-primary">Send Request</button>

                                    </form>

                                    <a href="{{ route('projects.show', $project->id) }}" class="btn btn-soft-warning" style="display: inline-block;">See Details</a>
                                </div>
                            @endguest
                        </article>
                    </div>
                @endforeach
                    {{ $projects->links() }}

            </div>


        </div>

    </section><!-- End Blog Section -->

</main>

<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

    <div class="container copyright text-center mt-4">
        <p>&copy; <span>Copyright</span> <strong class="px-1">Artsy</strong> <span>All Rights Reserved</span></p>
        <div class="credits">
            Designed by <a href="https://www.linkedin.com/in/mehdi-erraji/">Mehdi</a>
        </div>
    </div>

</footer>

@if (Session::has('success'))
    <script>
        console.log("SweetAlert initialization script executed!");
        Swal.fire("Success", "{{ Session::get('success') }}", 'success');
    </script>
@endif
<!-- Template Main JS File -->
<script src="{{ asset('assets/js/vendor.min.js') }}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>
</body>



</html>
