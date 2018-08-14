@extends('adminlte::page')


@section('title', 'e-ljp')

@section('content_header')
    <h1>Film</h1>
    
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
              <h3 class="box-title">Film Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method='post' action='{{ route('films.update',$film->id) }}' enctype="multipart/form-data" class="form-horizontal">
            @csrf
            @method('PUT')
              
              <div class="box-body">
                
                <div class="form-group">
                  <label for="id_kategori" class="col-sm-2 control-label">Kategori</label>

                  <div class="col-sm-10">
                  <select class="form-control" name="id_kategori">
                    <option value="">---select kategori---</option>
                    @foreach($kategori as $kat)
                    <option value="{{ $kat->kategori }}"> {{ $kat->kategori }} </option>
                    @endforeach
                  </select>
                    <!-- <input class="typeahead form-control" type="text" name="id_kategori" value="{{$film->id_kategori}}"> -->
                  </div>
                </div>                
                <div class="form-group">
                  <label for="judul" class="col-sm-2 control-label">Judul Film</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="judul" value="{{$film->judul}}">
                  </div>
                </div>                
                <div class="form-group">
                  <label for="sinopsis" class="col-sm-2 control-label">Sinopsis</label>

                  <div class="col-sm-10">
                    <textarea class="form-control" rows="3" id="sinopsis" name="sinopsis">{{$film->sinopsis}}</textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="filename" class="col-sm-2 control-label">Poster</label>
                  <div class="col-sm-10">
                  <input type="file" id="filename" name="filename">
                  </div>
                
                  <p class="help-block"> </p>
                </div>                
              <!-- /.box-body -->
              <div class="box-footer">
                <!-- <button type="submit" class="btn btn-default">Cancel</button> -->
                <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                <a href="{{route('films.index')}}" class="btn bg-navy pull-left">Kembali</a>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
@stop

@section('adminlte_js')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>  
<script type="text/javascript">
    var path = "{{ route('autocomplete') }}";
    $('input.typeahead').typeahead({
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });
</script>
@stop