@extends('layouts.main')

@section('content')



    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="profile-bg-picture" style="background-image:url('{{ asset('assets/images/bg-profile.jpg') }}')">
                    <span class="picture-bg-overlay"></span>
                    <!-- overlay -->
                </div>
                <!-- meta -->
                <div class="profile-user-box">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="profile-user-img">
                                <img src="" alt="" class="avatar-lg rounded-circle">
                            </div>
                            <div class="">
                                <h4 class="mt-4 fs-17 ellipsis"></h4>

                                <p class="font-13"><span class="badge bg-primary">Admin</span></p>


                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex justify-content-end align-items-center gap-2">
                                <button id="editProfileButton" type="button" class="btn btn-soft-danger">
                                    <i class="ri-settings-2-line align-text-bottom me-1 fs-16 lh-1"></i>
                                    Edit Profile
                                </button>

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
                                    <a id="editProfileLink" class="nav-link active" data-bs-toggle="tab" data-bs-target="#edit-profile" role="tab" aria-controls="home" aria-selected="true" href="#edit-profile">Settings</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#projects" type="button" role="tab" aria-controls="home" aria-selected="true" href="#projects">properties</a>
                                </li>
                            </ul>
                            <div class="tab-content m-0 p-4">
                                <!-- settings -->
                                <div id="edit-profile" class="tab-pane active">
                                    <div class="user-profile-content">
                                        <form action="updateProfile" method="POST" id="userForm" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="user_id" value="">
                                            <div class="row row-cols-sm-2 row-cols-1">
                                                <div class="mb-2">
                                                    <label class="form-label" for="FullName">Username</label>
                                                    <input type="text" name="username" value="" id="FullName" class="form-control">
                                                    <span id="fullNameError" class="error-message"></span>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="Email">Email</label>
                                                    <input type="email" name="email" value="" id="Email" class="form-control">
                                                    <span id="emailError" class="error-message"></span>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="Password">Password</label>
                                                    <input type="password" name="password" placeholder="6 - 15 Characters" id="Password" class="form-control">
                                                    <span id="passwordError" class="error-message"></span>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="RePassword">Re-Password</label>
                                                    <input type="password" placeholder="6 - 15 Characters" id="RePassword" class="form-control">
                                                    <span id="rePasswordError" class="error-message"></span>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="phone">Phone number</label>
                                                    <input type="tel" name="phone" value="" placeholder="Enter phone number" id="phone" class="form-control">
                                                    <span id="phoneError" class="error-message"></span>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="file" class="form-label">Upload Image</label>
                                                    <input type="file" id="file" name="user_image" class="form-control" accept="image/jpeg, image/png, image/jpg">
                                                    <span id="imageError" class="error-message"></span>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary" type="submit" name="updateProfile">
                                                <i class="ri-save-line me-1 fs-16 lh-1"></i>
                                                Save
                                            </button>
                                        </form>

                                    </div>
                                </div>
                                <!-- properties -->
                                <div id="projects" class="tab-pane">
                                    <div class="row m-t-10">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered mb-0">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Project Name</th>
                                                        <th>Start Date</th>
                                                        <th>Due Date</th>
                                                        <th>Status</th>
                                                        <th>Assign</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Velonic Admin</td>
                                                        <td>01/01/2015</td>
                                                        <td>07/05/2015</td>
                                                        <td><span class="badge bg-info">Work in Progress</span></td>
                                                        <td>rent</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>property one</td>
                                                        <td>01/01/2015</td>
                                                        <td>07/05/2015</td>
                                                        <td><span class="badge bg-success">Pending</span></td>
                                                        <td>rent</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Velonic Admin</td>
                                                        <td>01/01/2015</td>
                                                        <td>07/05/2015</td>
                                                        <td><span class="badge bg-pink">Done</span></td>
                                                        <td>rent</td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>property one</td>
                                                        <td>01/01/2015</td>
                                                        <td>07/05/2015</td>
                                                        <td><span class="badge bg-purple">Work in Progress</span></td>
                                                        <td>rent</td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>Velonic Admin</td>
                                                        <td>01/01/2015</td>
                                                        <td>07/05/2015</td>
                                                        <td><span class="badge bg-warning">Coming soon</span></td>
                                                        <td>rent</td>
                                                    </tr>
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


@endsection


