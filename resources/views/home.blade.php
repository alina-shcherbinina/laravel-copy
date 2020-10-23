@extends('page')

@section('title', 'Homepage') 

@section('content')
<h3>post a message:</h3>
	<form action="/create" method="post">

		<input type="text" name="title" placeholder="Title"> 

		<br>

		<input type="text" name="content" placeholder="content">

		{{ csrf_field() }}

		<button type="submit">Submit</button>

	</form>
		<br>

	<h3>Recent Messages:</h3>


	<ul>
		@foreach($messages as $message)

		<li>
			{{ $message->title }}
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

@endsection