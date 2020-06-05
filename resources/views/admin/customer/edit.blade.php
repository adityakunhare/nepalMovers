@section('title','Customer Edit')
@extends('admin.layouts.app')
@section('content')
<!-- Content Header (Page header) -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-pencil-alt"></i> Edit - {{$data->name}} </h3>
                    </div>
                    <!-- /.card-header -->

                    <!-- form start -->
                    <form role="form" action="{{route('admin.customer.update',$data->id)}}" enctype="multipart/form-data" method="post">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="user_name">User Name</label>
                                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" placeholder="Enter Name" name="name" id="user_name" value="{{old('name',$data->name)}}">
                                <b class="text-red">{{$errors->first('name') }}</b>
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" placeholder="Enter email" id="email" name="email" value="{{old('email',$data->email)}}">
                                <b class="text-red">{{$errors->first('email') }}</b>
                            </div>
                            <div class="form-group">
                                <label for="mobile">Mobile</label>
                                <input type="number" class="form-control {{ $errors->has('phone') ? 'is-invalid' : ''}}" placeholder="Enter phone no" id="phone" name="phone" value="{{old('phone',$data->phone)}}">
                                <b class="text-red">{{$errors->first('phone') }}</b>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary ">Update</button>
                            <a href="{{route('admin.customer.index')}}" class="btn btn-danger ">Back</a>
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
