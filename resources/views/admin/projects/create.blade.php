
@extends('layouts.main')

@section('content')

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
                    <h4 class="page-title">Welcome!</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->



        <!-- end row -->

        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title">Add a new partner</h4>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form action="{{ route('projects.store') }}" method="POST" id="addProjectForm" enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="title" class="form-label">Project Title</label>
                                        <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Project Title">
                                        @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Description"></textarea>
                                        @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="start_date" class="form-label">Starting Date</label>
                                            <input type="date" id="start_date" name="start_date" class="form-control @error('start_date') is-invalid @enderror">
                                            @error('start_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="deadline" class="form-label">Ending Date</label>
                                            <input type="date" id="end_date" name="deadline" class="form-control @error('deadline') is-invalid @enderror">
                                            @error('deadline')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="budget" class="form-label">Budget</label>
                                        <input type="number" id="budget" name="budget" class="form-control @error('budget') is-invalid @enderror" placeholder="Budget">
                                        @error('budget')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select id="" name="status" class="form-select @error('status') is-invalid @enderror">
                                            <option value="0">Pending</option>
                                            <option value="1">Ongoing</option>
                                            <option value="2">Completed</option>
                                        </select>
                                        @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="partners" class="form-label">Partners</label>
                                        <select id="partners" name="partners[]" class="form-select @error('partners') is-invalid @enderror" multiple>
                                            @foreach($partners as $partner)
                                                <option value="{{ $partner->id }}">{{ $partner->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('partners')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="mb-3">
                                        <label for="project" class="form-label">Project Picture</label>
                                        <input type="file" class="form-control @error('project') is-invalid @enderror" id="" name="project">
                                        @error('project')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <button type="submit" id="submitButton" class="btn btn-primary" name="addProject">Submit</button>
                                </form>



                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- end col-->
    </div>


@endsection

