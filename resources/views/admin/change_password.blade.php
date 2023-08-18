@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Chnage Password</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Chnage Password</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-8 col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <x-auth-validation-errors class="mb-4 mt-4 alert alert-danger" :errors="$errors" />
                        <form method="POST" action="{{ route('admin.update-password') }}">
                            @csrf
                            <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Change Password</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Old Password</label>
                                        <input type="text" name="oldPass" class="form-control @error('oldPass') is-invalid @enderror" id="oldPass"
                                            placeholder="Enter Old Password">
                                            @error('oldPass')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="newPass" class="form-label">New Password</label>
                                        <input type="text" name="newPass" class="form-control @error('newPass') is-invalid @enderror" id="newPass"
                                            placeholder="Enter New Password">
                                            @error('newPass')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="confirmPass" class="form-label">Confirm Password</label>
                                        <input type="text" name="confirmPass" class="form-control @error('confirmPass') is-invalid @enderror" id="confirmPass"
                                            placeholder="Enter Confirm Password">
                                            @error('confirmPass')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>
                               
                            </div> <!-- end row -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i
                                        class="mdi mdi-content-save"></i> Update</button>
                            </div>
                        </form>
                        <!-- end settings content-->
                    </div>
                </div> <!-- end card-->

            </div> <!-- end col -->
        </div>
        <!-- end row-->

    </div> <!-- container -->
@endsection
