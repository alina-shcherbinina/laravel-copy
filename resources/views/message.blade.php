@extends('page')

 @section('title', $message->title) 

 @section('tweet') 
{{ $message->title }}
<p>{{ $message -> user ->name }}</p>
<h4>{{ $message->content }}</h4>
<p>{{ $message->created_at->diffForHumans() }}</p>

<a  class="btn btn-primary" href="/">return home</a>

@endsection

