@extends('adminlte::page')


@section('title', 'e-ljp')

@section('content_header')
    <h1>Kategori</h1>
    
@stop

@section('content')
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

          <!-- Horizontal Form -->
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Kategori Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method='post' action='{{ route('kategoris.store') }}' class="form-horizontal">
            @csrf
              
              <div class="box-body">
                
                <div class="form-group">
                  <label for="kategori" class="col-sm-2 control-label">Kategori</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="kategori">
                  </div>
                </div>                
              <!-- /.box-body -->
              <div class="box-footer">
                <!-- <button type="submit" class="btn btn-default">Cancel</button> -->
                <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                <a href="{{route('kategoris.index')}}" class="btn bg-navy pull-left">Kembali</a>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
@stop