
@extends('layouts.main')

@section('content')


    @extends('layouts.main')

    @section('content')
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="profile-bg-picture" style="background-image:url({{ asset('assets/images/bg-profile.jpg') }})">
                        <span class="picture-bg-overlay"></span>
                        <!-- overlay -->
                    </div>
                    <!-- meta -->
                    <div class="profile-user-box">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="profile-user-img">

                                    @if($user->getFirstMedia('avatars'))
                                    <img src="{{ $user->getFirstMedia('avatars')->getUrl() }}" alt="" class="avatar-lg rounded-circle">
                                    @else
                                            <i class="ri-account-circle-line fs-24 align-middle me-1">No Profile </i>
                                        @endif
                                </div>
                                <div class="">
                                    <h4 class="mt-4 fs-17 ellipsis">{{ $user->name }}</h4>
                                    <p class="font-13">{{ $user->profession }}</p>
                                    <p class="text-muted mb-0"><small>{{ $user->location }}</small></p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--/ meta -->
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card p-0">
                        <div class="card-body p-0">
                            <div class="profile-content">
                                <ul class="nav nav-underline nav-justified gap-0">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#aboutme" type="button" role="tab" aria-controls="home" aria-selected="true" href="#aboutme">About</a>
                                    </li>
                                </ul>

                                <div class="tab-content m-0 p-4">
                                    <div class="tab-pane active" id="aboutme" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                        <div class="profile-desk">
                                            <h5 class="text-uppercase fs-17 text-dark">{{ $user->name }}</h5>
                                            <div class="designation mb-4">{{ $user->profession }}</div>
                                            <h3>About Me</h3>
                                            <p class="text-muted fs-16">
                                                {{ $user->description }}
                                            </p>

                                            <h5 class="mt-4 fs-17 text-dark">Contact Information</h5>
                                            <table class="table table-condensed mb-0 border-top">
                                                <tbody>
                                                <tr>
                                                    <th scope="row">Email</th>
                                                    <td>
                                                        <a href="mailto:{{ $user->email }}" class="ng-binding">
                                                            {{ $user->email }}
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Phone</th>
                                                    <td class="ng-binding">{{ $user->phone }}</td>
                                                </tr>


                                                </tbody>
                                            </table>
                                        </div> <!-- end profile-desk -->
                                    </div> <!-- about-me -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection



@endsection

