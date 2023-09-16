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
                    <h4 class="page-title">Monthly Salary</h4>
                    
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Monthly Salary</h4>

                        <table id="key-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Month</th>
                                    <th>Year</th>
                                    <th>Salary</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        
                            <tbody>
                                @php
                                    $sl=1;
                                @endphp
                                @foreach ($paidSalary as $key=> $salary)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td><img src="{{ asset($salary->employee->image) }}" style="width: 50px; height: 40px;" alt=""></td>
                                        <td>{{ $salary->employee->name }}</td>
                                        <td>{{ $salary->salary_month }}</td>
                                        <td>{{ $salary->salary_year }}</td>
                                        <td>{{ $salary->employee->salary }}</td>
                                        <td>
                                           <span class="badge bg-success">Full Paid</span>                                   
                                         </td>
                                        <td>
                                            <a href="{{ route('pay.history.salary', $salary->id) }}" title="Edit Advance Salary" class="btn btn-info btn-sm">History</a>
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