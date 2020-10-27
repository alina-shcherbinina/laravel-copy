@extends('layouts.app')
@extends('page')
@section('content')
<div class="container">
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

                    <a href="{{ url('/logout') }}"> <button>logout</button> </a>
                    
                    <h3>post a message:</h3>@if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="/create" method="post">

                        <input type="text" name="title" placeholder="Title"> 

                        <br>

                        <input type="text" name="content" placeholder="content">

                        {{ csrf_field() }}

                        <button type="submit">Submit</button>
                        <input type="hidden" value="{{ Session::token() }}" name="_token">

                    </form>
                    <br>
                    @if(session()->has('message'))
                    <div class="alert alert-success">{{session()->get('message')}}</div>
                    @endif
                    <h3>Recent Messages:</h3>

                    <ul>
                        @foreach($messages as $message)

                        <li>
                            {{ $message->title }}
                            <br> 
                            user: {{ $message -> user-> name}}
                            <br>
                            {{ $message -> content }}
                            <br>
                            {{ $message->created_at->diffForHumans() }} 
                        </li>

                        <a href="/message/{{ $message->id }}"> view tweet </a>
                        <br>
                        <br>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection