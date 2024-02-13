
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
                    <h4 class="page-title">My Projects list</h4>
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
                                            <td>{{ Str::limit(optional($project->project)->title, 50, '...') }}</td>
                                            <td>{{ Str::limit(optional($project->project)->description, 50, '...') }}</td>
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
                                                <a href="{{ route('projects.show', $project->id) }}" class="btn btn-sm btn-info">View Details</a>
                                            </td>
                                        </tr>

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

