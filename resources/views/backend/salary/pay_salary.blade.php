@extends('admin.admin_master')
@section('admin')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <a href="{{ route('advance.salary') }}" class="btn btn-success">Pay Salary</a>
                            </ol>
                        </div>
                        <h4 class="page-title">Pay Salary</h4>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">{{ date('F Y') }}</h4>

                            <table id="key-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Month</th>
                                        <th>Year</th>
                                        <th>Salary</th>
                                        <th>Advance Salary</th>
                                        <th>Due Salary</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                        $sl = 1;
                                    @endphp
                                    @foreach ($employees as $key => $employee)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td><img src="{{ asset($employee->image) }}" style="width: 50px; height: 40px;"
                                                    alt=""></td>
                                            <td>{{ $employee->name }}</td>
                                            <td>
                                                <span class="badge bg-info">{{ date('F', strtotime('-1 month')) }}</span>
                                            </td>
                                            <td>{{ $employee->advance->year }}</td>
                                            <td>{{ $employee->salary }}</td>
                                            <td>
                                                @if ($employee->advance->advance_salary == null)
                                                    <p>No Advance</p>
                                                @else
                                                    {{ $employee->advance->advance_salary }}
                                                @endif
                                            </td>
                                            <td>
                                                <strong class="text-dark">{{  $employee->salary - $employee->advance->advance_salary }}</strong>
                                            </td>
                                            <td>
                                                <a href="{{ route('pay.now.salary', $employee->id) }}" title="Pay Salary" class="btn btn-info btn-sm">Pay</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->

        </div> <!-- container -->

    </div> <!-- content -->
@endsection
