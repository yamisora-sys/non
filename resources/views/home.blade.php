@extends('layouts.app')

@section('content')
<div class="container mx-auto sm:px-6 lg:px-8">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    </br>
                    <a href="{{route('tc')}}">Trang chủ</a>
                </div>
            </div>
        </div>
    </div>
</div>
<a href="{{route('post')}}">Create new post</a>
@endsection
