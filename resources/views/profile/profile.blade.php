@extends('layouts.main')

@section('content')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="profile-bg-picture" style="background-image:url('assets/images/bg-profile.jpg')">
                    <span class="picture-bg-overlay"></span>
                    <!-- overlay -->
                </div>
                <!-- meta -->
                <div class="profile-user-box">
                    <div class="row">
                        <div class="col-sm-6">
                            @if (Auth::user()->getFirstMedia('avatars'))
                                <div class="profile-user-img"><img src="{{ Auth::user()->getFirstMedia('avatars')->getUrl() }}" alt="" class="avatar-lg rounded-circle"></div>
                            @else
                                <i class="ri-account-circle-line fs-18 align-middle me-1"></i>
                            @endif

                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex justify-content-end align-items-center gap-2">
                                <button type="button" class="btn btn-info" id="edit-profile-button">
                                    <i class="ri-settings-2-line align-text-bottom me-1 fs-16 lh-1"></i>
                                    Edit Profile
                                </button>
                                <button type="button" class="btn btn-soft-danger" id="delete-account-button" data-bs-toggle="modal" data-bs-target="#login-modal">
                                    <i class="ri-delete-bin-line align-text-bottom me-1 fs-16 lh-1"></i>
                                    Delete Account
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ meta -->
            </div>
        </div>



        <div id="login-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">


                        <form id="delete-account-form" action="{{ route('profile.destroy',Auth::user()->id) }}" method="POST" class="ps-3 pe-3">
                            @csrf
                            @method('DELETE')
                            <div class="mb-3">
                                <label for="password1" class="form-label">Password</label>
                                <input class="form-control" type="password" required id="password1" name="password" placeholder="Enter your password">
                            </div>
                            <div class="mb-3 text-center">
                                <button class="btn rounded-pill btn-primary" type="submit">Delete account</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card p-0">
                    <div class="card-body p-0">
                        <div class="profile-content">
                            <ul class="nav nav-underline nav-justified gap-0">
                                <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" data-bs-target="#aboutme" type="button" role="tab" aria-controls="home" aria-selected="true" href="#aboutme">About</a></li>
                                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" data-bs-target="#edit-profile" type="button" role="tab" aria-controls="home" aria-selected="true" href="#edit-profile">Settings</a></li>
                                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" data-bs-target="#user-activities" type="button" role="tab" aria-controls="home" aria-selected="true" href="#user-activities">My Requests</a></li>
                                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" data-bs-target="#projects" type="button" role="tab" aria-controls="home" aria-selected="true" href="#projects">Offers</a></li>
                            </ul>

                            <div class="tab-content m-0 p-4">
                                <div class="tab-pane active" id="aboutme" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                    <div class="profile-desk">
                                        <h5 class="text-uppercase fs-17 text-dark">{{ Auth::user()->name }}</h5>
                                        <div class="designation mb-4">{{ Auth::user()->profession }}</div>
                                        <p class="text-muted fs-16">
                                            {{ Auth::user()->description }}
                                        </p>

                                        <h5 class="mt-4 fs-17 text-dark">Contact Information</h5>
                                        <table class="table table-condensed mb-0 border-top">
                                            <tbody>
                                            <tr>
                                                <th scope="row">Email</th>
                                                <td>
                                                    <a href="mailto:{{ Auth::user()->email }}">{{ Auth::user()->email }}</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Phone</th>
                                                <td>{{ Auth::user()->phone }}</td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- end profile-desk -->
                                </div>

                                <div id="edit-profile" class="tab-pane">
                                    <div id="edit-profile" class="tab-pane">
                                        <div class="user-profile-content">
                                            <form action="{{ route('profile.update',Auth::user()->id) }}" method="POST" id="" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="row row-cols-sm-2 row-cols-1">
                                                    <div class="mb-2">
                                                        <label class="form-label" for="username">Username</label>
                                                        <input type="text" value="{{ Auth::user()->name }}" id="username" name="name" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="email">Email</label>
                                                        <input type="email" value="{{ Auth::user()->email }}" id="email" name="email" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="phone">Phone</label>
                                                        <input type="tel" value="{{ Auth::user()->phone }}" id="phone" name="phone" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="profession">Profession</label>
                                                        <input type="text" value="{{ Auth::user()->profession }}" id="profession" name="profession" class="form-control">
                                                    </div>

                                                    <div class="col-sm-12 mb-3">
                                                        <label class="form-label" for="aboutMe">About Me</label>
                                                        <textarea style="height: 125px;" id="aboutMe" name="description" class="form-control">{{ Auth::user()->description }}</textarea>
                                                    </div>
                                                    <div class="col-sm-12 mb-3">
                                                        <label class="form-label" for="profileImage">Profile Image</label>
                                                        <input type="file" id="profileImage" name="avatar" class="form-control">
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary" type="submit"><i class="ri-save-line me-1 fs-16 lh-1"></i> Save</button>
                                            </form>



                                        </div>
                                    </div>
                                </div>

                                <div id="user-activities" class="tab-pane">
                                    <div class="row m-t-10">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered mb-0">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Project Title</th>
                                                        <th>Description</th>
                                                        <th>Budget</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                     @foreach($myRequests as $request)
                                                        <tr>
                                                            <td>{{ $request->project->id }}</td>
                                                            <td>{{ $request->project->title }}</td>
                                                            <td>{{ $request->project->description }}</td>
                                                            <td>{{ $request->project->budget }}K MAD</td>
                                                            <td>
                                                                @if($request->request_status === 0)
                                                                    <span class="badge bg-info">Pending</span>
                                                                @elseif($request->request_status === 1)
                                                                    <span class="badge bg-success">Approved</span>
                                                                @elseif($request->request_status === 2)
                                                                    <span class="badge bg-danger">Rejected</span>
                                                                @endif
                                                            </td>
                                                            <td>

                                                                <button class="btn btn-danger">Delete</button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    <!-- Add more rows for other requests -->
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="projects" class="tab-pane">
                                    <!-- Content for the "Projects" tab -->
                                    <div class="row m-t-10">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered mb-0">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Project Title</th>
                                                        <th>Description</th>
                                                        <th>Budget</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    @foreach($assignedProjects as $assigned)
                                                        <tr>
                                                            <td>{{ $assigned->project->id }}</td>
                                                            <td>{{ Str::limit(optional($assigned->project)->title, 50, '...') }}</td>
                                                            <td>{{ Str::limit(optional($assigned->project)->description, 50, '...') }}</td>
                                                            <td>{{ $assigned->project->budget }}K MAD</td>
                                                            <td>
                                                                <div style="display: flex; gap: 5px;">
                                                                    <a href="{{ route('approval.status', ['project' => $assigned->id]) }}" class="btn btn btn-info">View Details</a>

                                                                    <form id="approvalForm" action="{{ route('approval.status') }}" method="POST">
                                                                        @csrf
                                                                        @method('POST')
                                                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                                        <input type="hidden" name="project_id" value="{{ $assigned->project->id }}">
                                                                        <button type="submit" name="approval_status" value="1" class="btn btn-success">Accept</button>
                                                                        <button type="submit" name="approval_status" value="2" class="btn btn-danger">Deny</button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
    </div>
    @if (Session::has('success'))
        <script>
            console.log("SweetAlert initialization script executed!");
            Swal.fire("Success", "{{ Session::get('success') }}", 'success');
        </script>
    @endif
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("edit-profile-button").addEventListener("click", function() {
                document.querySelector('a[href="#edit-profile"]').click();
            });
        });
    </script>
@endsection
