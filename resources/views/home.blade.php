@extends('layouts.app')

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
                    
                    <h3>post a message:</h3>
                    <form action="/create" method="post">

                        <input type="text" name="title" placeholder="Title"> 

                        <br>

                        <input type="text" name="content" placeholder="content">

                        {{ csrf_field() }}

                        <button type="submit">Submit</button>
                        <input type="hidden" value="{{ Session::token() }}" name="_token">

                    </form>
                    <br>

                    <h3>Recent Messages:</h3>


                    <ul>
                        @foreach($messages as $message)

                        <li>
                            {{ $message->title }}
                            <br> 
                             user: {{ $message -> user_id }}
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
