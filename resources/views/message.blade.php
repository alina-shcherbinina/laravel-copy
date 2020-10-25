@extends('page')

@section('title', $message->title) 

@section('posts')
<h3>{{ $message->title }}</h3>
<p>{{ $message -> user_id}}</p>
<h4>{{ $message->content }}</h4>
<p>{{ $message->created_at->diffForHumans() }}</p>

<a href="/"><button>return home</button></a>

@endsection