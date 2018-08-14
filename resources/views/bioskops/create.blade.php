@extends('adminlte::page')
@section('title', 'e-ljp')

@section('content_header')
    <h1>Profil Bioskop</h1>
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
            <form method="POST" action="{{ route('bioskops.store') }}" enctype="multipart/form-data" class="form-horizontal">
            @csrf
              <div class="box-body">
                
                    <input type="hidden" class="form-control" id="id_akun" name="id_akun" value="{{Auth::user()->id}}">
                  
                <div class="form-group">
                  <label for="nama" class="col-sm-2 control-label">Nama Bioskop</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama">
                  </div>
                </div>
                <div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="telp" class="col-sm-2 control-label">Telp Office</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="telp" name="telp">
                  </div>
                </div>
                <div class="form-group">
                  <label for="namacp" class="col-sm-2 control-label">Nama CP</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="namacp" name="namacp">
                  </div>
                </div>
                <div class="form-group">
                  <label for="telpcp" class="col-sm-2 control-label">Telp. CP</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="telpcp" name="telpcp">
                  </div>
                </div>
                <div class="form-group">
                  <label for="alamat" class="col-sm-2 control-label">Alamat Bioskop</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamat" name="alamat">
                  </div>
                </div>
                <div class="form-group">
                  <label for="filename" class="col-sm-2 control-label">Image</label>
                  <div class="col-sm-10">
                  <input type="file" id="filename" name="filename">
                  </div>
                
                  <p class="help-block"> </p>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <!-- <button type="submit" class="btn btn-default">Cancel</button> -->
                <!-- <button type="submit" class="btn btn-primary pull-right">simpan</button> -->
                <button type="submit" class="btn btn-primary pull-right">simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>

            
            
          </div>
@stop