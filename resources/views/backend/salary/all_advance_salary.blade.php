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
                            <a href="{{ route('advance.salary') }}" class="btn btn-success">Add Advance Salary</a>
                        </ol>
                    </div>
                    <h4 class="page-title">Advance Salary</h4>
                    
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Advance Salary</h4>

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
                                    <th>Action</th>
                                </tr>
                            </thead>
                        
                            <tbody>
                                @php
                                    $sl=1;
                                @endphp
                                @foreach ($advance_salary as $key=> $advance_salary_data)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td><img src="{{ asset($advance_salary_data->employee->image) }}" style="width: 50px; height: 40px;" alt=""></td>
                                        <td>{{ $advance_salary_data->employee->name }}</td>
                                        <td>{{ $advance_salary_data->month }}</td>
                                        <td>{{ $advance_salary_data->year }}</td>
                                        <td>{{ $advance_salary_data->employee->salary }}</td>
                                        <td>
                                            @if ($advance_salary_data->advance_salary==NULL)
                                                <p>No Advance</p>
                                            @else
                                                {{ $advance_salary_data->advance_salary }}
                                            @endif                                        
                                         </td>
                                        <td>
                                            <a href="{{ route('edit.advance.salary', $advance_salary_data->id) }}" title="Edit Advance Salary" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="{{ route('delete.supplier', $advance_salary_data->id) }}" title="Delete Supplier" class="btn btn-danger btn-sm" id="delete"><i class="fa-solid fa-trash"></i></a>  
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