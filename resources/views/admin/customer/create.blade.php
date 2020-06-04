@section('title','General Form')
@extends('admin.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
{{-- <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>General Form</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">General Form</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section> --}}

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fa fa-plus"></i> Create New </h3>
                    </div>
                    <!-- /.card-header -->

                    <!-- form start -->
                    <form role="form" action="{{route('admin.user.store')}}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="user_name">User Name</label>
                                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" placeholder="Enter Name" name="name" id="user_name" value="{{old('name')}}">
                                <b class="text-red">{{$errors->first('name') }}</b>
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" placeholder="Enter email" id="email" name="email" value="{{old('email')}}">
                                <b class="text-red">{{$errors->first('email') }}</b>
                            </div>
                            <div class="form-group">
                                <label for="mobile">Mobile</label>
                                <input type="number" class="form-control {{ $errors->has('mobile') ? 'is-invalid' : ''}}" placeholder="Enter mobile no" id="mobile" name="mobile" value="{{old('mobile')}}">
                                <b class="text-red">{{$errors->first('mobile') }}</b>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" id="password" placeholder="Password" name="password">
                                <b class="text-red">{{$errors->first('password') }}</b>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Image</label>
                                <div class="custom-file">
                                    <input type="file" class="form-control {{ $errors->has('image') ? 'is-invalid' : ''}}" id="exampleInputFile" name="image">
                                </div>
                                <b class="text-red">{{$errors->first('image') }}</b>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary ">Submit</button>
                            <a href="{{route('admin.user.index')}}" class="btn btn-danger ">Back</a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
