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
                            <li class="breadcrumb-item active">Edit Advance Salary</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Advance Salary</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('update.advance.salary') }}" enctype="multipart/form-data">
                            @csrf
                            <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Edit Advance Salary
                                <a href="{{ route('all.advance.salary') }}" class="btn btn-success float-right"
                                    style="float: right">View All Advance Salary</a>
                            </h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <input type="hidden" name="id" id="id" value="{{ $advanceSalary->id }}">
                                        <label for="employee_id" class="form-label">Employee Name</label>
                                        <select name="employee_id" id="employee_id"
                                            class="form-select @error('employee_id') is-invalid @enderror">
                                            <option value="" selected disabled>Select Employee</option>
                                            @foreach ($employees as $employee)
                                                <option value="{{ $employee->id }}" {{ ($employee->id==$advanceSalary->employee_id)?'Selected':'' }}>{{ $employee->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('employee_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="month" class="form-label">Month</label>
                                        <select name="month" id="month"
                                            class="form-select @error('month') is-invalid @enderror">
                                            <option value="" selected disabled>Select Month</option>
                                            <option value="January"  {{ ($advanceSalary->month=='January')?'Selected':'' }}>January</option>
                                            <option value="February"  {{ ($advanceSalary->month=='February')?'Selected':'' }}>February</option>
                                            <option value="March"  {{ ($advanceSalary->month=='March')?'Selected':'' }}>March</option>
                                            <option value="April"  {{ ($advanceSalary->month=='April')?'Selected':'' }}>April</option>
                                            <option value="May"  {{ ($advanceSalary->month=='May')?'Selected':'' }}>May</option>
                                            <option value="June"  {{ ($advanceSalary->month=='June')?'Selected':'' }}>June</option>
                                            <option value="July"  {{ ($advanceSalary->month=='July')?'Selected':'' }}>July</option>
                                            <option value="August"  {{ ($advanceSalary->month=='August')?'Selected':'' }}>August</option>
                                            <option value="September"  {{ ($advanceSalary->month=='September')?'Selected':'' }}>September</option>
                                            <option value="October"  {{ ($advanceSalary->month=='October')?'Selected':'' }}>October</option>
                                            <option value="November"  {{ ($advanceSalary->month=='November')?'Selected':'' }}>November</option>
                                            <option value="December"  {{ ($advanceSalary->month=='December')?'Selected':'' }}>December</option>
                                        </select>
                                        @error('month')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="year" class="form-label">Year</label>
                                        <select name="year" id="year"
                                            class="form-select @error('year') is-invalid @enderror">
                                            <option value="" selected disabled>Select Year</option>
                                            <option value="2022" {{ ($advanceSalary->year=='2022')?'Selected':'' }}>2022</option>
                                            <option value="2023" {{ ($advanceSalary->year=='2023')?'Selected':'' }}>2023</option>
                                            <option value="2024" {{ ($advanceSalary->year=='2024')?'Selected':'' }}>2024</option>
                                            <option value="2025" {{ ($advanceSalary->year=='2025')?'Selected':'' }}>2025</option>
                                            <option value="2026" {{ ($advanceSalary->year=='2026')?'Selected':'' }}>2026</option>
                                            <option value="2027" {{ ($advanceSalary->year=='2027')?'Selected':'' }}>2027</option>
                                            <option value="2028" {{ ($advanceSalary->year=='2028')?'Selected':'' }}>2028</option>
                                            <option value="2029" {{ ($advanceSalary->year=='2029')?'Selected':'' }}>2029</option>
                                            <option value="2030" {{ ($advanceSalary->year=='2030')?'Selected':'' }}>2030</option>
                                        </select>
                                        @error('year')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="advance_salary" class="form-label">Advance Salary</label>
                                        <input type="number" name="advance_salary"
                                            class="form-control @error('advance_salary') is-invalid @enderror" id="advance_salary"
                                            value="{{ $advanceSalary->advance_salary }}" placeholder="Enter Advance Salary">
                                        @error('advance_salary')
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
