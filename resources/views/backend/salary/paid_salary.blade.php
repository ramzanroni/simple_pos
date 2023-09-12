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
                            <li class="breadcrumb-item active">Paid Salary</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Paid Salary</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('store.advance.salary') }}" enctype="multipart/form-data">
                            @csrf
                            <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Paid Salary
                                <a href="{{ route('all.advance.salary') }}" class="btn btn-success float-right"
                                    style="float: right">View All Advance Salary</a>
                            </h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="employee_id" class="form-label">Employee Name: </label>
                                        <strong>{{ $paySalary->name }}</strong>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="month" class="form-label">Month: </label>
                                        <strong>{{ date('F', strtotime('-1 month')) }}</strong>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="year" class="form-label">Year: </label>
                                        <strong>{{ date('Y') }}</strong>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="advance_salary" class="form-label">Salary: </label>
                                        <strong>{{ $paySalary->salary }}</strong>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="advance_salary" class="form-label">Advance Salary: </label>
                                        <strong class="badge bg-warning">
                                            @if ( $paySalary->advance->advance_salary==NULL)
                                                <p>No Advance</p>
                                            @else
                                                {{  $paySalary->advance->advance_salary }}
                                            @endif 
                                        </strong>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="advance_salary" class="form-label">Due Salary: </label>
                                        <strong>{{ $paySalary->salary - $paySalary->advance->advance_salary }}</strong>
                                    </div>
                                </div>

                            </div> <!-- end row -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i
                                        class="mdi mdi-content-save"></i> Paid Salary</button>
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
