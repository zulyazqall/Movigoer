@extends('adminlte::page')

@section('title', 'e-ljp')

@section('content_header')
    <h1>Film</h1>
    <div class="pull-right">
        <a class="btn btn-success" href="{{ route('films.create') }}"> Tambah Film</a>
    </div></br>
    
@stop

@section('content')
    
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 10px">No.</th>
                  <th>Kategori</th>
                  <th>Judul</th>
                  <th>Sinopsis</th>
                  <th>Poster</th>
                  <th>Tanggal</th>
                  <!-- <th>Tanggal</th> -->
                  <th style="width: 100px">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($films as $film)
                <tr>
                  <td>{{ ++$i}}</td>
                  <td>{{$film->id_kategori}}</td>
                  <td>{{$film->judul}}</td>
                  <td>{!! str_limit($film->sinopsis,100,'')!!}</td>
                  <td><img src="/img/{{$film->poster}}" class="img-responsive" width="100" hight="100"/></td>
                  <td>{{$film->created_at}}</td>
                  <td align="center">
                    <form action="{{ route('films.destroy',$film->id) }}" method="POST">
                        <a class="btn bg-navy btn-sm" href="{{ route('films.edit',$film->id) }}"><i class="fa fa-edit"></i></a>
                        
                        @csrf

                        @method('DELETE')
  
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    </form>
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <!-- <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
              {!! $films->links() !!}
              </ul>
            </div> -->
          </div>

          
@stop
@section('adminlte_js')
<script>
      $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
        })
    })
</script>
@stop