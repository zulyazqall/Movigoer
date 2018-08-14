@extends('adminlte::page')
@section('title', '403')
@section('content')
<h2>{{ $exception->getMessage() }}</h2>
<div class="error-page">
        <h2 class="headline text-yellow"> 403</h2>

        <div class="error-content">
          <h3><i class="fa fa-warning text-yellow"></i> Oops! forbidden.</h3>

          <p>
            Anda tidak bisa mengakses halaman ini karena anda tidak memiliki hak akses <p>
            @if(Auth::user()->hasRole('admin'))
            <a href="/admin">kembali ke dashboard</a>
            @else
             <a href="/penontons">kembali ke dashboard</a>
            @endif
          </p>

          <form class="search-form">
            <div class="input-group">
              <input type="text" name="search" class="form-control" placeholder="Search">

              <div class="input-group-btn">
                <button type="submit" name="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i>
                </button>
              </div>
            </div>
            <!-- /.input-group -->
          </form>
        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
@stop