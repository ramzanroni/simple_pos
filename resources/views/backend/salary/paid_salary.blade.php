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
                        <form method="POST" action="{{ route('store.employee.salary') }}" enctype="multipart/form-data">
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
                                        <input type="hidden" name="employee_id" value="{{ $paySalary->id }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="month" class="form-label">Month: </label>
                                        <strong>{{ date('F', strtotime('-1 month')) }}</strong>
                                        <input type="hidden" name="salary_month" value="{{ date('F', strtotime('-1 month')) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="year" class="form-label">Year: </label>
                                        <strong>{{ date('Y') }}</strong>
                                        <input type="hidden" name="salary_year" id="salary_year" value="{{ date('Y') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="advance_salary" class="form-label">Salary: </label>
                                        <strong>{{ $paySalary->salary }}</strong>
                                        <input type="hidden" name="paid_amount" id="paid_amount" value="{{ $paySalary->salary }}"> 
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
                                        <input type="hidden" name="advance_salary" id="advance_salary" value="{{ $paySalary->advance->advance_salary }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="advance_salary" class="form-label">Due Salary: </label>
                                        <strong>{{ $paySalary->salary - $paySalary->advance->advance_salary }}</strong>
                                        <input type="hidden" name="due_salary" id="due_salary" value="{{ $paySalary->salary - $paySalary->advance->advance_salary }}">
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
