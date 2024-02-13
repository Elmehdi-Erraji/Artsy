<div class="leftside-menu">
    <!-- Brand Logo Light -->
    <a href="#" class="logo logo-light">
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="logo">
            </span>
        <span class="logo-sm">
                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="small logo">
            </span>
    </a>

    <!-- Brand Logo Dark -->
    <a href="#" class="logo logo-dark">
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="dark logo">
            </span>
        <span class="logo-sm">
                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="small logo">
            </span>
    </a>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!-- Sidemenu -->
        <ul class="side-nav">
            <li class="side-nav-title">Main</li>

            @if (auth()->user()->roles()->first()->name == 'admin')

            <li class="side-nav-item">
                <a href="{{route('users.index')}}" class="side-nav-link">
                    <i class="ri-dashboard-3-line"></i>
                    <span> Dashboard </span>
                </a>
            </li>

                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarUsers" aria-expanded="false" aria-controls="sidebarUsers" class="side-nav-link">
                        <i class="ri-group-2-line"></i>
                        <span> Artists </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarUsers">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="{{ route('users.create') }}">Add artists</a>
                            </li>
                            <li>
                                <a href="{{ route('users.index') }}">Artists List</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPartners" aria-expanded="false" aria-controls="sidebarUsers" class="side-nav-link">
                    <i class="ri-building-2-line"></i>
                    <span> Partners </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPartners">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('partners.create')}}">Add a partner </a>
                        </li>
                        <li>
                            <a href="{{route('partners.index')}}">Partners List</a>
                        </li>
                    </ul>
                </div>
            </li>


            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarFAQ" aria-expanded="false" aria-controls="sidebarFAQ" class="side-nav-link">
                    <i class="ri-folder-line"></i>
                    <span> Projects </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarFAQ">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('projects.create')}}">Add projects</a>
                        </li>
                        <li>
                            <a href="{{route('projects.index')}}">Projects List</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarServices" aria-expanded="false" aria-controls="sidebarServices" class="side-nav-link">
                    <i class="ri-flag-2-line"></i>
                    <span> Requests </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarServices">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('requests.index')}}">Requests List</a>
                        </li>
                    </ul>
                </div>
            </li>
                <li class="side-nav-item">
                    <a href="{{route('home')}}" class="side-nav-link">
                        <i class="ri-home-3-line"></i>
                        <span> Back Home </span>
                    </a>
                </li>

            @endif


            @if (auth()->user()->roles()->first()->name == 'artist')
            <li class="side-nav-item">
                <a href="{{route('home')}}" class="side-nav-link">
                    <i class="ri-home-3-line"></i>
                    <span> Back Home </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarFAQ" aria-expanded="false" aria-controls="sidebarFAQ" class="side-nav-link">
                    <i class="ri-folder-line"></i>
                    <span> Projects </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarFAQ">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('artist.index')}}">My projects</a>
                        </li>
                    </ul>
                </div>
            </li>
            @endif



        </ul>
        <!-- End Sidemenu -->
    </div>

    <div class="clearfix"></div>
</div>
