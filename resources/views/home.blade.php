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

                    <p>{{ __('You are logged in!') }}</p>
                    
                    <h6>post a message:</h6>

                    <form action="/create" method="post">
                        <div class="form-group">

                            <input type="text" name="title"  class="form-control" placeholder="Title">
                        </div>

                        <input type="text" name="content"  class="form-control" placeholder="content">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <input type="hidden" value="{{ Session::token() }}" name="_token">
                        </div>
                        <button class="btn btn-outline-primary" type="submit">twet</button>
                    </form> 

                    <br>

                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div> 
                    @endforeach
                    @endif


                    @if(session()->has('message'))
                    <div class="alert alert-success">{{session()->get('message')}}</div>
                    @endif

                    <h5>Recent Messages:</h5>

                        <div style="width: 18rem;">  
                        @foreach($messages->reverse()  as $message)
                        <div class=" card card-body">
                       
                            <h5 class="card-title"> {{ $message->title }} </h5>
                            <h6 class="card-subtitle mb-2 text-muted"> {{ $message -> user-> name}} </h6>
                            <p class="card-text"> {{ $message -> content }} </p>
                            <p class="card-text text-muted">  {{ $message->created_at->diffForHumans() }} </p>

                        <a href="/message/{{ $message->id }}" class="card-link"> view tweet </a>
                        </div>
                        <br>
                        @endforeach
                        
                       </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection