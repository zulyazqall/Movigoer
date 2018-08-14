{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Log')

@section('content_header')
    <h1>Log Activity</h1>
    <div class="pull-right">
        <a class="btn btn-success" href="{{ route('export') }}"> Export to XLSX</a>
    </div></br>
@stop

@section('content')
          <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Log Activity</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID User</th>
                  <th>Deskripsi</th>
                  <th>Subjek</th>
                  <th>Properties</th>
                  <th>Tanggal/waktu</th>
                </tr>
                </thead>
                <tbody>
                @foreach($logs as $log)
                <tr>
                  <td>{{$log->causer_id}}</td>
                  <td>{{$log->description}}</td>
                  <td>{{$log->subject_type}}</td>
                  <td>{{$log->properties}}</td>
                  <td>{{$log->created_at}}</td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('adminlte_js')
    <!-- <script src="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->
    <script> console.log('Hi!'); </script>
    <script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
        })
    })
    </script>
@stop