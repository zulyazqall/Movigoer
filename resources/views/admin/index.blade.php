{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Selamat datang di dashboard e-Laporan Jumlah Penonton</p>

    <section class="content">
      <div class="row">
        <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">10 Film Indonesia peringkat teratas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Judul Film</th>
                  <th style="width: 40px">Penonton</th>
                </tr>
                @foreach($indos as $indo)
                <tr>
                  <td>{{++$i}}.</td>
                  <td>{{$indo->judul_film}}</td>
                  <td><span class="badge bg-red">{{$indo->jml_penonton}}</span></td>
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">10 Film Asing peringkat teratas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Judul Film</th>
                  <th style="width: 40px">Penonton</th>
                </tr>
                @foreach($barats as $barat)
                <tr>
                  <td>{{++$j}}.</td>
                  <td>{{$barat->judul_film}}</td>
                  <td><span class="badge bg-blue">{{$barat->jml_penonton}}</span></td>
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </div>


          <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Data Pengiriman Jumlah Penonton</h3>
              <div class="pull-right">
                  <a class="btn btn-success" href="{{ route('kexport') }}"> Export to XLSX</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>User</th>
                  <th>Kategori</th>
                  <th>Judul Film</th>
                  <th>Jumlah Penonton</th>
                  <th>Tanggal Kirim</th>
                </tr>
                </thead>
                <tbody>
                @foreach($banks as $bank)
                <tr>
                  <td>{{$bank->user}}</td>
                  <td>{{$bank->kategori}}</td>
                  <td>{{$bank->judul_film}}</td>
                  <td>{{$bank->jml_penonton}}</td>
                  <td>{{$bank->created_at}}</td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </div>
    </section>

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