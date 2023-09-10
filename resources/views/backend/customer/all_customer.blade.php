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
                    <h4 class="page-title">Customer</h4>
                    
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Customer</h4>

                        <table id="key-datatable" class="table w-100">
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
                                            <a href="{{ route('edit.customer', $customer->id) }}" class="btn btn-info" title="Edit Customer"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="{{ route('delete.customer', $customer->id) }}" title="Delete Customer" class="btn btn-danger btn-sm" id="delete"><i class="fa-solid fa-trash"></i></a>
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