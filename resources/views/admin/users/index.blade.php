@extends('adminlte::page')

@section('title', 'e-ljp')

@section('content_header')
    <h1>User</h1>
    <div class="pull-right">
        <a class="btn btn-success" href="{{ route('users.create') }}"> Buat User</a>
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
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Password</th>
                  <!-- <th>Tanggal</th> -->
                  <th style="width: 100px">Aksi</th>
                </tr>
                @foreach ($users as $user)
                @if($user->id == 1)
                @else
                <tr>
                  <td>{{ ++$i}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->password}}</td>
                  <td align="center" width="150px">
                    <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                        <a title="lihat" class="btn btn-default btn-sm" href="{{ route('tampil',$user->id) }}"><i class="fa fa-eye"></i></a>
                        <a title="edit" class="btn btn-primary btn-sm" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-edit"></i></a>
                        
                        @csrf

                        @method('DELETE')
  
                        <button title="hapus" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    </form>
                  </td>
                </tr>
                @endif
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                
                {!! $users->links() !!}
              </ul>
            </div>
          </div>

@stop