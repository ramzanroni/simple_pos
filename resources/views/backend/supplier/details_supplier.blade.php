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
                            <li class="breadcrumb-item active">Supplier Details</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Supplier Details</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                            <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Supplier Details<a
                                    href="{{ route('all.supplier') }}" class="btn btn-success float-right"
                                    style="float: right">View Supplier</a></h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <input type="hidden" name="id" value="{{ $supplierData->id }}">
                                        <label for="name" class="form-label">Name</label>
                                        <p class="text-danger">{{ $supplierData->name }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <p class="text-danger">{{ $supplierData->email }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Phone</label>
                                        <p class="text-danger">{{ $supplierData->phone }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <p class="text-danger">{{ $supplierData->address }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="type" class="form-label">Type</label>
                                        <p class="text-danger">{{ $supplierData->type }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="shopname" class="form-label">Supplier Shopname</label>
                                        <p class="text-danger">{{ $supplierData->shopname }}</p>
                                    </div>
                                </div>
                                 <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="account_holder" class="form-label">Account Holder</label>
                                        <p class="text-danger">{{ $supplierData->account_holder }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="account_number" class="form-label">Account Number</label>
                                        <p class="text-danger">{{ $supplierData->account_number }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="bank_name" class="form-label">Bank Name</label>
                                        <p class="text-danger">{{ $supplierData->bank_name }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="bank_branch" class="form-label">Branch Name</label>
                                        <p class="text-danger">{{ $supplierData->bank_branch }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="city" class="form-label">City</label>
                                        <p class="text-danger">{{ $supplierData->city }}</p>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <img id="showImg" src="{{ ($supplierData->image!='')? url($supplierData->image) : url('upload/no-image.png') }}"
                                        class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                </div>
                            </div> <!-- end row -->
                           
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
            $('#supplierImg').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#showImg").attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
