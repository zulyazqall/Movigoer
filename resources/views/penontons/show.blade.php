@extends('adminlte::page')


@section('title', 'e-ljp')

@section('content_header')
    <h1>Jumlah Penonton</h1>
    
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
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method='post' action='{{ route('banks.store') }}' class="form-horizontal">
            @csrf
              
              <div class="box-body">

              <input type="hidden" class="form-control" name="id" value="{{$penonton->id}}">
              <input type="hidden" class="form-control" name="id_bioskop" value="{{$penonton->id_bioskop}}">
              <input type="hidden" class="form-control" name="user" value="{{$penonton->user}}">
              <input type="hidden" class="form-control" name="kategori" value="{{$penonton->kategori}}">
              <input type="hidden" class="form-control" name="judul_film" value="{{$penonton->film}}">
              <input type="hidden" class="form-control" name="jml_penonton" value="{{$penonton->jml_penonton}}">
                
                <!-- <div class="form-group">
                  <label for="kategori" class="col-sm-2 control-label">Kategori</label>

                  <div class="col-sm-10">
                    <input data-provide="typeahead" class="typeahead form-control" type="text" name="kategori" value="{{$penonton->kategori}}">
                  </div>
                </div>                
                <div class="form-group">
                  <label for="judul_film" class="col-sm-2 control-label">Judul Film</label>

                  <div class="col-sm-10">
                    <input type="text" class="typeahead2 form-control" name="judul_film" value="{{$penonton->film}}">
                  </div>
                </div>  
                <div class="form-group">
                  <label for="jml_penonton" class="col-sm-2 control-label">Jumlah Penonton</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="jml_penonton" value="{{$penonton->jml_penonton}}">
                  </div>
                </div>
                <div> -->
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-warning"></i> Peringatan!</h4>
                  Apakah Anda yakin dengan data yang akan dikirim?
                </div>
                </div>
              <div class="box-footer">
                <!-- <button type="submit" class="btn btn-default">Cancel</button> -->
                <button type="submit" class="btn btn-success pull-right">Ya, Kirim</button>
                <a href="{{route('penontons.index')}}" class="btn bg-navy pull-left">Kembali</a>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
@stop

@section('adminlte_js')
@stop