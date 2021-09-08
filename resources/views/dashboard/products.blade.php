@extends('layouts.dashboard')
@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Products</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Products</li>
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
                                        <h3 class="card-title">All Products</h3>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="button" class="btn-primary btn-sm float-right" data-toggle="modal"
                                                data-target="#add-customer">Add Product
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Created By</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->description}}</td>
                                            <td>{{$product->status}}</td>
                                            <td>{{$customer->user->name}}</td>
                                            <td>
                                                <a href="{{route('product',['product'=>$product])}}" style="color: black">
                                                    <button type="button" class="btn btn-primary btn-block btn-flat" style="color: white;font-size: 16px">View</button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>


    {{--add new customer--}}
    <div class="modal fade" id="add-product">
        <div class="modal-dialog modal-lg">
            <form method="POST" action="{{ route('save-product') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Product</h5>
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
                                               name="name" value="{{old('name')}}" placeholder="Enter Name" required>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{$errors->first('name')}}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="" cols="30" rows="2"
                                                  class="form-control form-control-sm @error('description') is-invalid @enderror"
                                                  placeholder="Enter Description"
                                                  required>{{old('description')}}</textarea>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{$errors->first('description')}}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="dob">Date of Birth</label>
                                        <input type="date"
                                               class="form-control form-control-sm @error('date_of_birth') is-invalid @enderror"
                                               name="date_of_birth" value="{{old('date_of_birth')}}"
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
                                           name="village" value="{{old('village')}}" placeholder="Enter Village" >
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
                                           name="district" value="{{old('district')}}" placeholder="Enter District" >
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
                                           name="street" value="{{old('street')}}" placeholder="Enter Street" >
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
                                           name="nationality" value="{{old('nationality')}}" placeholder="Enter Nationality" >
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
                                           name="nin" value="{{old('nin')}}" placeholder="Enter NIN" >
                                    @error('nin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$errors->first('nin')}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="btn-group">
                                <button type="reset" class="btn btn-warning">Clear Form</button>
                                <button type="submit" class="btn btn-primary">Save Customer</button>
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



@push('scripts')

    <!-- DataTables  & Plugins -->
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <!-- Page specific script -->
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

    <script>
        window.addEventListener("load", function () {
            @if(Session::has('errors'))
            $('#add-customer').modal({show: true})
            @endif
        });
    </script>

@endpush
