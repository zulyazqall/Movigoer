@extends('adminlte::page')


@section('title', 'e-ljp')

@section('content_header')
    <h1>Kategori</h1>
    <div class="pull-right">
        <a class="btn btn-success" href="{{ route('kategoris.create') }}"> Tambah Kategori</a>
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
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">No.</th>
                  <th>Kategori</th>
                  <!-- <th>Tanggal</th> -->
                  <th style="width: 100px">Aksi</th>
                </tr>
                @foreach ($kategoris as $kategori)
                <tr>
                  <td>{{ ++$i}}</td>
                  <td>{{$kategori->kategori}}</td>
                  <td align="center">
                    <form action="{{ route('kategoris.destroy',$kategori->id) }}" method="POST">
                        <a class="btn bg-navy btn-sm" href="{{ route('kategoris.edit',$kategori->id) }}"><i class="fa fa-edit"></i></a>
                        
                        @csrf

                        @method('DELETE')
  
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
              {!! $kategoris->links() !!}
              </ul>
            </div>
          </div>

          
@stop