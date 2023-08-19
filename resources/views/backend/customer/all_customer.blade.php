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
                            <a href="{{ route('add.customer') }}" class="btn btn-success">Add Customer</a>
                        </ol>
                    </div>
                    <h4 class="page-title">Customera</h4>
                    
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Customer</h4>

                        <table id="key-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        
                            <tbody>
                                @php
                                    $sl=1;
                                @endphp
                                @foreach ($customers as $key=> $customer)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->phone }}</td>
                                        <td><img src="{{ asset($customer->image) }}" style="width: 50px; height: 40px;" alt=""></td>
                                        <td>
                                            {{-- <a href="{{ route('edit.employee', $employee->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ route('delete.employee', $employee->id) }}" class="btn btn-danger" id="delete">Delete</a> --}}
                                            <a href="#" class="btn btn-info">Edit</a>
                                            <a href="#" class="btn btn-danger" id="delete">Delete</a>
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