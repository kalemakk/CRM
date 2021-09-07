@extends('layouts.dashboard')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Customer</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Customers</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h3 class="card-title">{{$customer->name}}</h3>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="button" class="btn-primary btn-sm float-right" data-toggle="modal"
                                                data-target="#edit-customer">Edit Customer
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">
                                        <div class="row">
                                            <div class="col-12 col-sm-3">
                                                <div class="info-box bg-light">
                                                    <div class="info-box-content">
                                                        <span class="info-box-text text-center text-muted">Total Products Purchased</span>
                                                        <span
                                                            class="info-box-number text-center text-muted mb-0">2300</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="info-box bg-light">
                                                    <div class="info-box-content">
                                                        <span class="info-box-text text-center text-muted">Total amount Paid</span>
                                                        <span
                                                            class="info-box-number text-center text-muted mb-0">2000</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="info-box bg-light">
                                                    <div class="info-box-content">
                                                        <span class="info-box-text text-center text-muted">Invoices Received</span>
                                                        <span
                                                            class="info-box-number text-center text-muted mb-0">20</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="info-box bg-light">
                                                    <div class="info-box-content">
                                                        <span class="info-box-text text-center text-muted">Total Orders</span>
                                                        <span
                                                            class="info-box-number text-center text-muted mb-0">20</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
{{--                                                <h4>More About {{$customer->name}}</h4>--}}
                                                <div class="post">

                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <h5>Email: <span style="font-size: large">{{$customer->email}}</span></h5>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <h5>Age: <span style="font-size: large">{{$customer->getAge($customer->date_of_birth)}}</span></h5>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <h5>NIN: <span style="font-size: large">{{$customer->nin}}</span></h5>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="post">

                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <h5>Nationality: <span style="font-size: large">{{$customer->nationality}}</span></h5>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <h5>District: <span style="font-size: large">{{$customer->district}}</span></h5>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <h5>Village: <span style="font-size: large">{{$customer->village}}</span></h5>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <h5>Street: <span style="font-size: large">{{$customer->street}}</span></h5>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="post">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <h5>Created On: <span style="font-size: large">{{\Carbon\Carbon::parse($customer->created_at)->isoFormat('MMM Do YYYY')}}</span></h5>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <h5>Created By: <span style="font-size: large">{{$customer->user->name}}</span></h5>
                                                        </div>
                                                    </div>
                                                </div>


                                                </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->


                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>


    {{--add new customer--}}
    <div class="modal fade" id="edit-customer">
        <div class="modal-dialog modal-lg">
            <form method="POST" action="{{ route('update-customer',['customer',$customer]) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Customer's Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text"
                                               class="form-control form-control-sm @error('name') is-invalid @enderror"
                                               name="name" value="{{$customer->name}}" placeholder="Enter Name" required>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{$errors->first('name')}}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email"
                                               class="form-control form-control-sm @error('email') is-invalid @enderror"
                                               name="email" value="{{$customer->email}}" placeholder="Enter Email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{$errors->first('email')}}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="dob">Date of Birth</label>
                                        <input type="date"
                                               class="form-control form-control-sm @error('date_of_birth') is-invalid @enderror"
                                               name="date_of_birth" value="{{$customer->date_of_birth}}"
                                               placeholder="Enter Date of Birth">
                                        @error('date_of_birth')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$errors->first('date_of_birth')}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="village">Village</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('village') is-invalid @enderror"
                                           name="village" value="{{$customer->village}}" placeholder="Enter Village">
                                    @error('village')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$errors->first('village')}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="district">District</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('district') is-invalid @enderror"
                                           name="district" value="{{$customer->district}}" placeholder="Enter District">
                                    @error('district')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$errors->first('district')}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="district">Street</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('street') is-invalid @enderror"
                                           name="street" value="{{$customer->street}}" placeholder="Enter Street">
                                    @error('street')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$errors->first('street')}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="nationality">Nationality</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('nationality') is-invalid @enderror"
                                           name="nationality" value="{{$customer->nationality}}"
                                           placeholder="Enter Nationality">
                                    @error('nationality')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$errors->first('nationality')}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="nationality">NIN</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('nin') is-invalid @enderror"
                                           name="nin" value="{{$customer->nin}}" placeholder="Enter NIN">
                                    @error('nin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$errors->first('nin')}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="btn-group">
                                <button type="reset" class="btn btn-warning">Clear Form</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </form>
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection
