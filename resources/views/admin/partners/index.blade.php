
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
                    <h4 class="page-title">Partners list</h4>
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
                            <div class="row">
                                <div class="col-lg-6">
                                    <a href="{{ route('partners.create') }}" class="btn btn-primary" id="addButton" style="width: 30%">Add A Partner</a>
                                </div>

                            </div>
                        </div>

                        <div id="yearly-sales-collapse" class="collapse show">
                            <div class="table-responsive">
                                <table class="table table-nowrap table-hover mb-0">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Logo</th>
                                        <th>name</th>
                                        <th>Description</th>
                                        <th>E-mail</th>
                                        <th>Phone</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tableBody">
                                    @foreach ($partners as $partner)
                                        <tr>
                                            <td>{{ $partner->id }}</td>
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
                                            <td>{{ \Illuminate\Support\Str::limit($partner->description, 50) }}</td>
                                            <td>{{ $partner->email }}</td>
                                            <td>{{ $partner->phone }}</td>




                                            <td>
                                                <a href="{{ route('partners.edit', $partner->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                <form action="{{ route('partners.destroy', $partner->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger  delete-btn">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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

