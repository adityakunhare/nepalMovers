@section('title','Data Table')
@push('stylesheet')
<!-- dataTables -->
<link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
@endpush


@extends('admin.layouts.app')
@section('content')

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('admin.user.create')}}" class="btn btn-primary btn-sm float-right"><i
                            class="fa fa-plus"></i> Add</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="data_table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Mobile No.</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Mobile No.</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
@endsection
@push('script')
<script src="{{asset('js/jquery.dataTables.js')}}"></script>
<script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
<script type="text/javascript">
    $(function () {

        var table = $('#data_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.user.index') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'mobile', name: 'mobile'},
                {data: 'image', name: 'image',orderable: false, searchable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false,width:'15%'},

            ]
        });
  });
</script>
@endpush
