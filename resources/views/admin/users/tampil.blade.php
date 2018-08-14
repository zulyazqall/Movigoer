@extends('adminlte::page')
@section('title', 'e-ljp')

@section('content_header')
    <h1>Profil User Bioskop</h1>
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
            <form class="form-horizontal">
              <div class="box-body">
              @foreach ($bioskops as $profile)
                <div class="form-group">
                  <label for="id_akun" class="col-sm-2 control-label">id_akun</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="id_akun" name="id_akun" value="{{ $profile->id_akun }}" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label for="nama" class="col-sm-2 control-label">Nama Bioskop</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $profile->nama }}" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="{{ $profile->email }}" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label for="telp" class="col-sm-2 control-label">Telp.</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="telp" name="telp" value="{{ $profile->telp }}" disabled>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="namacp" class="col-sm-2 control-label">Nama CP</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="namacp" name="namacp" value="{{ $profile->namacp}}" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label for="telpcp" class="col-sm-2 control-label">Telp. CP</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="telpcp" name="telpcp" value="{{ $profile->telpcp}}" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label for="alamat" class="col-sm-2 control-label">Alamat Bioskop</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $profile->alamat}}" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label for="filename" class="col-sm-2 control-label">Image</label>
                  <div class="col-sm-10">
                  <!-- <input type="file" id="filename"> -->
                  <img src="../img/{{ $profile->image }}" class="user-image" width="200px" hight="200px">
                  </div>
                
                  <p class="help-block"> </p>
                </div>
              </div>
              @endforeach
              <!-- /.box-body -->
              @forelse ($bioskops as $profile)
              <div class="box-footer">
                <!-- <button type="submit" class="btn btn-default">Cancel</button> -->
                <!-- <button type="submit" class="btn btn-primary pull-right">simpan</button> -->
                <a class="btn bg-navy pull-left" href="{{ route('users.index') }}">Kembali</a>
              </div>
              @empty
              @endforelse
              <!-- /.box-footer -->
            </form>

            
            
          </div>
@stop