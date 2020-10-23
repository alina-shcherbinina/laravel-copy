@extends('page')

@section('title', $message->title) 

@section('content')
<h3>{{ $message->title }}</h3>
<h4>{{ $message->content }}</h4>
<p>{{ $message->created_at->diffForHumans() }}</p>

@endsection