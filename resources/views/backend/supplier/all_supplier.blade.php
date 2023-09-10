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
                            <a href="{{ route('add.supplier') }}" class="btn btn-success">Add Supplier</a>
                        </ol>
                    </div>
                    <h4 class="page-title">Supplier</h4>
                    
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Supplier</h4>

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
                                @foreach ($suppliers as $key=> $supplier)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $supplier->name }}</td>
                                        <td>{{ $supplier->email }}</td>
                                        <td>{{ $supplier->phone }}</td>
                                        <td><img src="{{ asset($supplier->image) }}" style="width: 50px; height: 40px;" alt=""></td>
                                        <td>
                                            <a href="{{ route('edit.supplier', $supplier->id) }}" title="Edit Supplier" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="{{ route('delete.supplier', $supplier->id) }}" title="Delete Supplier" class="btn btn-danger btn-sm" id="delete"><i class="fa-solid fa-trash"></i></a>  
                                            <a href="{{ route('details.supplier', $supplier->id) }}" title="Supplier Details" class="btn btn-success btn-sm"><i class="fa-solid fa-circle-info"></i></a>
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
 <!-- End Section-->