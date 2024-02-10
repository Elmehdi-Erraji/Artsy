
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
                        <h4 class="header-title">Edit user</h4>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form action="{{ route('users.update', $user->id) }}" method="POST" id="updateUserForm">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label for="" class="">Status</label>
                                        <select class="form-select" id="" name="status">
                                            <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Pending</option>
                                            <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Active</option>
                                            <option value="2" {{ $user->status == 2 ? 'selected' : '' }}>Banned</option>
                                        </select>
                                    </div>


                                    <div class="mb-3">
                                        <label for="role" class="form-label">User Role</label>
                                        <select class="form-select @error('role') is-invalid @enderror" id="role" name="role">
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}" @if($user->roles->contains($role->id)) selected @endif>{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('role')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" id="submitButton" class="btn btn-primary" name="updateUser">Submit</button>
                                        <a href="{{ route('users.index') }}" class="btn btn-secondary">Go Back</a>
                                    </div>
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

