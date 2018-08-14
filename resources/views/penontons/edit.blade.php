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

        <div class="alert alert-info alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-info"></i> Pemberitahuan!</h4>
          Mohon mengisi data yang sesuai dan valid
        </div>

          <!-- Horizontal Form -->
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method='post' action='{{ route('penontons.update',$penonton->id) }}' class="form-horizontal">
            @csrf
            @method('PUT')
              
              <div class="box-body">

              <input type="hidden" class="form-control" id="id_bioskop" name="id_bioskop" value="{{$penonton->id_bioskop}}">
              <input type="hidden" class="form-control" id="user" name="user" value="{{$penonton->user}}">
                
                <div class="form-group">
                  <label for="film" class="col-sm-2 control-label">Judul Film</label>

                  <div class="col-sm-10">
                    <input type="text" class="typeahead2 form-control" name="film" value="{{$penonton->film}}">
                  </div>
                </div>                
                <div class="form-group">
                  <label for="kategori" class="col-sm-2 control-label">Kategori</label>

                  <div class="col-sm-10">
                    <input data-provide="typeahead" class="typeahead form-control" type="text" id="kat" name="kategori" value="{{$penonton->kategori}}">
                  </div>
                </div>                
                <div class="form-group">
                  <label for="tgl_tayang" class="col-sm-2 control-label">Tanggal Tayang</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="tgl_tayang" id="datepicker" value="{{$penonton->tgl_tayang}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="jml_penonton" class="col-sm-2 control-label">Jumlah Penonton</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="jml_penonton" value="{{$penonton->jml_penonton}}">
                  </div>
                </div>
                <!-- <div class="form-group">
                  <label for="filename" class="col-sm-2 control-label">Poster</label>
                  <div class="col-sm-10">
                  <input type="file" id="filename" name="filename">
                  </div>
                
                  <p class="help-block"> </p>
                </div>                 -->
              <!-- /.box-body -->
              <div class="box-footer">
                <!-- <button type="submit" class="btn btn-default">Cancel</button> -->
                <button type="submit" class="btn btn-primary pull-right">update</button>
                <a href="{{route('penontons.index')}}" class="btn bg-navy pull-left">Kembali</a>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
@stop

@section('adminlte_js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
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

    var path2 = "{{ route('autofilm') }}";
    $('input.typeahead2').typeahead({
      source: function (query, process) {
        $.get(path2, { query: query }, function (data) {
            labels = [];
            mapped = {};
            $.each(data, function(i,obj) {
                mapped[obj.name] = obj;
                labels.push(obj.name);
            });
            process(labels);
        });
        }
        ,updater: function (item) {
            $('#kat').val(mapped[item].id);
            return item;
        }
    });

    
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
</script>
@stop