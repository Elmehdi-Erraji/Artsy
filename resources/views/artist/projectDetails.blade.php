@extends('layouts.main')

@section('content')

    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="profile-bg-picture" style="background-image:url({{asset('assets/images/test.jpg') }})">
                    <span class="picture-bg-overlay"></span>

                </div>

            </div>
        </div>
        <!-- end row -->
        <br>

        <div class="row">
            <div class="col-sm-12">
                <div class="card p-0">
                    <div class="card-body p-0">
                        <div class="profile-content">
                            <ul class="nav nav-underline nav-justified gap-0">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#aboutme" type="button" role="tab" aria-controls="home" aria-selected="true" href="#aboutme">About Project</a>
                                </li>
                            </ul>

                            <div class="tab-content m-0 p-4">
                                <div class="tab-pane active" id="aboutme" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                    <div class="profile-desk">
                                        <h5 class="text-uppercase fs-17 text-dark">Project Description</h5>
                                        <div class="designation mb-4">{{ $project->description }}</div>
                                        <h3>Partners</h3>
                                        <table class="table table-centered mb-0">
                                            <thead>
                                            <tr>
                                                <th>Img</th>
                                                <th>Partner Name</th>
                                                <th>email</th>
                                                <th>Details</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($partners as $partner)
                                                <tr>
                                                    <td>
                                                        @if ($partner->getFirstMedia('partners'))
                                                            <img src="{{ $partner->getFirstMedia('partners')->getUrl() }}" class="rounded-circle" alt="Partner Image" width="50">
                                                        @else
                                                            No image
                                                        @endif
                                                    </td>
                                                    <td>{{ $partner->name }}</td>
                                                    <td>{{ $partner->email }}</td>
                                                    <td>
                                                        <a href="{{ route('partners.show', $partner->id) }}" class="btn btn-sm btn-info">View Profile</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <br>
                                        <br>
                                        <h3>Artists</h3>
                                        <table class="table table-centered mb-0">
                                            <thead>
                                            <tr>
                                                <th>Img</th>
                                                <th>Artist Name</th>
                                                <th>Speciality</th>

                                                <th>Profile</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($users as $user)
                                                <tr>
                                                    <td>

                                                        @if ($user->getFirstMedia('avatars'))
                                                            <img src="{{ $user->getFirstMedia('avatars')->getUrl() }}" class="rounded-circle" alt="User Image" width="50">
                                                        @else
                                                            No image
                                                        @endif

                                                    </td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->profession }}</td>
                                                    <td>
                                                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-info">View Profile</a>
                                                    </td>

                                                </tr>
                                            @endforeach
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
