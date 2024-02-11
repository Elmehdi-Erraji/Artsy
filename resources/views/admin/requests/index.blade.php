
@extends('layouts.main')

@section('content')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);"> </a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                            <li class="breadcrumb-item active">Welcome!</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Requests list</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">



        </div>


        <div class="row">
            <div class="col-12">
                <!-- Todo-->
                <div class="card">
                    <div class="card-body p-0">
                        <div class="p-3">
                            <div class="app-search d-none d-lg-block">
                                <form id="searchForm" style="width: 40%;">
                                    <div class="input-group">
                                        <input type="search" class="form-control" placeholder="Search..." id="searchInput">
                                        <span class="ri-search-line search-icon text-muted"></span>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="header-title">Incoming Requests</h4>
                                        <p class="text-muted mb-0">
                                            Requests from other users to participate in projects.
                                        </p>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive-sm">
                                            <table class="table table-centered mb-0">
                                                <thead>
                                                <tr>
                                                    <th>User</th>
                                                    <th>Project Title</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($incomingRequests as $request)
                                                    <tr>
                                                        <td>
                                                            @if ($request->user)
                                                                @if ($request->user->getFirstMedia('avatars'))
                                                                    <img src="{{ $request->user->getFirstMedia('avatars')->getUrl() }}" class="rounded-circle" alt="User Image" width="50">
                                                                @else
                                                                    No image
                                                                @endif

                                                            @else
                                                                User not found
                                                            @endif
                                                        </td>
                                                        <td>{{ $request->project->title }}</td>
                                                        <td>{{ $request->request_status }}</td>
                                                        <td>
                                                            <button class="btn btn-primary">Accept</button>
                                                            <button class="btn btn-danger">Reject</button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div> <!-- end table-responsive-->
                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div>

                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="header-title">Assigned Projects</h4>
                                        <p class="text-muted mb-0">
                                            Projects assigned to users.
                                        </p>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive-sm">
                                            <table class="table table-centered mb-0">
                                                <thead>
                                                <tr>
                                                    <th>Img</th>
                                                    <th>Artist Name</th>
                                                    <th>Project Title</th>
                                                    <th>Status</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($assignedProjects as $assignment)
                                                    <tr>
                                                        <td>
                                                            @if ($assignment->user)
                                                                @if ($assignment->user->getFirstMedia('avatars'))
                                                                    <img src="{{ $assignment->user->getFirstMedia('avatars')->getUrl() }}" class="rounded-circle" alt="User Image" width="50">
                                                                @else
                                                                    No image
                                                                @endif

                                                            @else
                                                                User not found
                                                            @endif
                                                        </td>
                                                        <td>{{ $assignment->user->name }}</td>
                                                        <td>{{ $assignment->project->title }}</td>
                                                        <td>
                                                            @if ($assignment->approval_status === 0)
                                                                <span class="badge bg-info-subtle text-info">Pending</span>
                                                            @elseif ($assignment->approval_status === 1)
                                                                <span class="badge bg-warning-subtle text-warning">Approved</span>
                                                            @elseif ($assignment->approval_status === 2)
                                                                <span class="badge bg-pink-subtle text-pink">Rejected</span>
                                                            @else
                                                                <span class="badge bg-warning">Unknown Status</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div> <!-- end table-responsive-->
                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

