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
                            <a href="{{ route('add.emplpyee.attendance') }}" class="btn btn-success">Add Attendance</a>
                        </ol>
                    </div>
                    <h4 class="page-title">Attendance</h4>
                    
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Attendance</h4>

                        <table id="key-datatable" class="table w-100">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        
                            <tbody>
                                @php
                                    $sl=1;
                                @endphp
                                @foreach ($attendances as $key=> $attendance)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ date('Y-m-d', strtotime($attendance->date)) }}</td>
                                        <td>
                                            <a href="{{ route('edit.supplier', $supplier->id) }}" title="Edit Supplier" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
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