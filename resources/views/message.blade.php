@section('title', $message->title)

@extends('page')
@extends('layouts.app')

@section('posts')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					<h3>{{ $message->title }}</h3>
				</div>
				<div class="card-body">
					<p></p>
					<blockquote class="blockquote mb-0">
						<p>{{ $message->content }}</p>
						<footer class="blockquote-footer"> <cite title="Source Title">{{ $message -> user ->name }}</cite></footer>
					</blockquote>
					<p  class="font-weight-light text-muted text-right" >{{ $message->created_at->diffForHumans() }}</p>
				</div>
			</div>
			<br>
			<a  class="btn btn-primary float-right" href="{{ url('/') }}">return home</a>
		</div>

	</div>

</div>
@endsection