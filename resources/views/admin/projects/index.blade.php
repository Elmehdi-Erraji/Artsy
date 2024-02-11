
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
                    <h4 class="page-title">Projects list</h4>
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

                        <div id="yearly-sales-collapse" class="collapse show">
                            <div class="table-responsive">
                                <table class="table table-nowrap table-hover mb-0">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Project Title</th>
                                        <th>Description</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Budget</th>
                                        <th>Status</th>
                                        <th>Partners</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tableBody">
                                    @foreach ($projects as $project)
                                        <tr>
                                            <td>{{ $project->id }}</td>
                                            <td>
                                                @if ($project->getFirstMedia('projects'))
                                                    <img src="{{ $project->getFirstMedia('projects')->getUrl() }}" class="rounded-circle" alt="Avatar" width="50">
                                                @else
                                                    No image
                                                @endif
                                            </td>
                                            <td>{{ $project->title }}</td>
                                            <td>{{ $project->description }}</td>
                                            <td>{{ $project->start_date }}</td>
                                            <td>{{ $project->deadline }}</td>
                                            <td>{{ $project->budget }}K MAD</td>
                                            <td>
                                                @if ($project->status === 0)
                                                    <span class=" badge bg-pink-subtle text-pink">Pending</span>
                                                @elseif ($project->status === 1)
                                                    <span class="badge bg-warning-subtle text-warning">Ongoing</span>
                                                @elseif ($project->status === 2)
                                                    <span class="badge bg-info-subtle text-info">Done</span>
                                                @else
                                                    <span class="badge bg-warning">Unknown Status</span>
                                                @endif
                                            </td>
                                            <td>
                                                <table>
                                                    @foreach ($project->partners as $partner)
                                                        <tr>
                                                            <td class="align-middle">
                                                                @if ($partner->getFirstMedia('partners'))
                                                                    <div class="rounded-circle overflow-hidden" style="width: 45px; height: 45px;">
                                                                        <img src="{{ $partner->getFirstMedia('partners')->getUrl() }}" class="img-fluid" alt="Avatar">
                                                                    </div>
                                                                @else
                                                                    No image
                                                                @endif
                                                            </td>
                                                            <td>{{ $partner->name }}</td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </td>
                                            <td>
                                                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $project->id }}">Assign To</button>
                                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger delete-btn">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <!-- Modal for Assign To -->
                                        <div class="modal fade" id="exampleModal{{ $project->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Assign Users to Project</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('requests.store') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="project_id" value="{{ $project->id }}">
                                                            <input type="hidden" name="request_status" value="3">
                                                            <div id="userList">
                                                                <ul class="list-group">
                                                                    @foreach($users as $user)
                                                                        <li class="list-group-item">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" name="selected_users[]" value="{{ $user->id }}" id="user_{{ $user->id }}" {{ $user->projects->contains($project->id) ? 'checked' : '' }}>
                                                                                <label class="form-check-label" for="user_{{ $user->id }}">
                                                                                    @if ($user->getFirstMedia('avatars'))
                                                                                        <img src="{{ $user->getFirstMedia('avatars')->getUrl() }}" class="rounded-circle" alt="Avatar" width="50">
                                                                                    @else
                                                                                        No image
                                                                                    @endif
                                                                                    {{ $user->name }}
                                                                                </label>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Assign Users</button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </tbody>
                                </table>


                                <!-- Modal -->



                            @if (Session::has('success'))
                                    <script>
                                        console.log("SweetAlert initialization script executed!");
                                        Swal.fire("Success", "{{ Session::get('success') }}", 'success');
                                    </script>
                                @endif


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

