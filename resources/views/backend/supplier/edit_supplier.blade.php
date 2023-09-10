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
                            <li class="breadcrumb-item active">Edit Supplier</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Supplier</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('update.supplier') }}" enctype="multipart/form-data">
                            @csrf
                            <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Edit Supplier <a
                                    href="{{ route('all.supplier') }}" class="btn btn-success float-right"
                                    style="float: right">View Supplier</a></h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <input type="hidden" name="id" value="{{ $supplierData->id }}">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" value="{{ $supplierData->name }}" class="form-control @error('name') is-invalid @enderror" id="name"
                                            value="" placeholder="Enter Name">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" value="{{ $supplierData->email }}" class="form-control @error('email') is-invalid @enderror" id="email"
                                            value="" placeholder="Enter Email">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Phone</label>
                                        <input type="text" name="phone" value="{{ $supplierData->phone }}" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                            placeholder="Enter Phone">
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" name="address" value="{{ $supplierData->address }}" class="form-control @error('address') is-invalid @enderror" id="address"
                                            placeholder="Enter Address">
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="type" class="form-label">Supplier Type</label>
                                        <select name="type" id="type" class="form-select @error('type') is-invalid @enderror">
                                            <option value="">Select Type</option>
                                            <option value="Distributor" {{ ($supplierData->type=="Distributor")?'Selected':'' }}>Distributor</option>
                                            <option value="Whole Seller" {{ ($supplierData->type=="Whole Seller")?'Selected':'' }}>Whole Seller</option>
                                        </select>
                                        @error('type')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="shopname" class="form-label">Shopname</label>
                                        <input type="text" name="shopname" value="{{ $supplierData->shopname }}" class="form-control @error('shopname') is-invalid @enderror" id="shopname"
                                            placeholder="Enter Shopname">
                                        @error('shopname')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                 <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="account_holder" class="form-label">Account Holder</label>
                                        <input type="text" name="account_holder" value="{{ $supplierData->account_holder }}" class="form-control @error('account_holder') is-invalid @enderror" id="account_holder"
                                            placeholder="Enter Account Holder">
                                        @error('account_holder')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="account_number" class="form-label">Account Number</label>
                                        <input type="text" name="account_number" value="{{ $supplierData->account_number }}" class="form-control @error('account_number') is-invalid @enderror" id="account_number"
                                            placeholder="Enter Account Number">
                                        @error('account_number')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="bank_name" class="form-label">Bank Name</label>
                                        <input type="text" name="bank_name" value="{{ $supplierData->bank_name }}" class="form-control @error('bank_name') is-invalid @enderror" id="bank_name"
                                            placeholder="Enter Account Name">
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="bank_branch" class="form-label">Branch Name</label>
                                        <input type="text" name="bank_branch" value="{{ $supplierData->bank_branch }}" class="form-control @error('bank_branch') is-invalid @enderror" id="bank_branch"
                                            placeholder="Enter Branch Name">
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="city" class="form-label">City</label>
                                        <input type="text" name="city" value="{{ $supplierData->city }}" class="form-control @error('city') is-invalid @enderror" id="city"
                                            placeholder="Enter City">
                                        @error('city')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="supplierImg" class="form-label">Profile Image</label>
                                        <input type="file" id="supplierImg" name="supplierImg" class="form-control @error('supplierImg') is-invalid @enderror">
                                        @error('supplierImg')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-md-6">
                                    <img id="showImg" src="{{ ($supplierData->image!='')? url($supplierData->image) : url('upload/no-image.png') }}"
                                        class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                    @error('oldPass')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> <!-- end row -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i
                                        class="mdi mdi-content-save"></i> Update</button>
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
