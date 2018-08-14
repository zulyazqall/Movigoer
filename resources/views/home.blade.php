@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <p>

                    @if(Auth::user()->hasRole('admin'))
                    <a href="/admin" class="btn btn-primary">Dashboard Admin</a>
                    @else
                    <a href="/user" class="btn btn-primary">Dashboard user</a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
