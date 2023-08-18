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
                            <li class="breadcrumb-item active">Edit Employee</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Employee</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('update.employee') }}" enctype="multipart/form-data">
                            @csrf
                            <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Edit Employee <a
                                    href="{{ route('all.employee') }}" class="btn btn-success float-right"
                                    style="float: right">View Employee</a></h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" name="id" value="{{ $employeeData->id }}">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" value="{{ $employeeData->name }}" class="form-control @error('name') is-invalid @enderror" id="name"
                                            value="" placeholder="Enter Name">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" value="{{ $employeeData->email }}" class="form-control @error('email') is-invalid @enderror" id="email"
                                            value="" placeholder="Enter Email">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Phone</label>
                                        <input type="text" name="phone" value="{{ $employeeData->phone }}" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                            placeholder="Enter Phone">
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" name="address" value="{{ $employeeData->address }}" class="form-control @error('address') is-invalid @enderror" id="address"
                                            placeholder="Enter Address">
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exprience" class="form-label">Exprience</label>
                                        <select name="exprience" id="exprience" class="form-select @error('exprience') is-invalid @enderror">
                                            <option value="">Select Exprience</option>
                                            <option value="1 Year" {{ ($employeeData->exprience=="1 Year")?'Selected':'' }}>1 Year</option>
                                            <option value="2 Year" {{ ($employeeData->exprience=="2 Year")?'Selected':'' }}>2 Year</option>
                                            <option value="3 Year" {{ ($employeeData->exprience=="3 Year")?'Selected':'' }}>3 Year</option>
                                            <option value="4 Year" {{ ($employeeData->exprience=="4 Year")?'Selected':'' }}>4 Year</option>
                                            <option value="5 Year" {{ ($employeeData->exprience=="5 Year")?'Selected':'' }}>5 Year</option>
                                        </select>
                                        @error('exprience')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="salary" class="form-label">Salary</label>
                                        <input type="number" name="salary" value="{{ $employeeData->salary }}"  class="form-control @error('salary') is-invalid @enderror" id="salary"
                                            placeholder="Enter Salary">
                                        @error('salary')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="vacation" class="form-label">Vacation</label>
                                        <input type="text" name="vacation" value="{{ $employeeData->vacation }}"  class="form-control @error('vacation') is-invalid @enderror" id="vacation"
                                            placeholder="Enter Vacation">
                                        @error('vacation')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="city" class="form-label">City</label>
                                        <input type="text" name="city" value="{{ $employeeData->city }}"  class="form-control @error('city') is-invalid @enderror" id="city"
                                            placeholder="Enter City">
                                        @error('city')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="empImg" class="form-label">Profile Image</label>
                                        <input type="file" id="empImg" name="empImg" class="form-control @error('empImg') is-invalid @enderror">
                                        @error('empImg')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-md-6">
                                    <img id="showImg" src="{{ ($employeeData->image!='')? url($employeeData->image) : url('upload/no-image.png') }}"
                                        class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                    @error('oldPass')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
    <script>
        $(document).ready(function() {
            $('#empImg').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#showImg").attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
