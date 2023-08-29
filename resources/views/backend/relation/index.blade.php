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
                            <a href="{{ route('add.employee') }}" class="btn btn-success">Add Employee</a>
                        </ol>
                    </div>
                    <h4 class="page-title">Relation</h4>
                    
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Employees</h4>

                        {{-- <table id="key-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                </tr>
                            </thead>
                        
                            <tbody>
                                @php
                                    $sl=0;

                                @endphp
                                @foreach ($user as $data)
                                    <tr>
                                        <td>{{ ++$sl }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->phoneTbl->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table> --}}
                        <table id="key-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Title</th>
                                    <th>Comments</th>
                                </tr>
                            </thead>
                        
                            <tbody>
                                @php
                                    $sl=0;

                                @endphp
                                @foreach ($post as $data)
                                    <tr>
                                        <td>{{ ++$sl }}</td>
                                        <td>{{ $data->title }}</td>
                                        <td>
                                            @foreach ($data->comments as $comment)
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td>
                                                        {{ $comment->message }}
                                                    </td>
                                                </tr>
                                            </table>
                                            @endforeach
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