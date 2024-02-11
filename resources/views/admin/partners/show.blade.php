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
                                    <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#aboutme" type="button" role="tab" aria-controls="home" aria-selected="true" href="#aboutme">About This Partner</a>
                                </li>
                            </ul>

                            <div class="tab-content m-0 p-4">
                                <div class="tab-pane active" id="aboutme" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                    <div class="profile-desk">
                                        <h5 class="text-uppercase fs-17 text-dark">{{ $partner->name }}</h5>
                                        <div class="designation mb-4">{{ $partner->profession }}</div>
                                        <h3>About This Partner</h3>
                                        <p class="text-muted fs-16">
                                            {{ $partner->description }}
                                        </p>

                                        <h5 class="mt-4 fs-17 text-dark">Contact Information</h5>
                                        <table class="table table-condensed mb-0 border-top">
                                            <tbody>
                                            <tr>
                                                <th scope="row">Email</th>
                                                <td>
                                                    <a href="mailto:{{ $partner->email }}" class="ng-binding">
                                                        {{ $partner->email }}
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Phone</th>
                                                <td class="ng-binding">{{ $partner->phone }}</td>
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
