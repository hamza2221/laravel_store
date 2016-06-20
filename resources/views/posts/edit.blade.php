@extends('main')
@section('title',"| Edit Post")
@section('content') 

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Edit {{$posts->title}}</h1>
			<form method="POST" action=" {{ url('posts/'.$posts->id) }}" accept-charset="UTF-8">
			 	<input type="hidden" name="_method" value="PATCH">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				
				<input name="title" value="{{$posts->title}}" class="form-control" type="text" />
				<hr>
				<input name="slug" value="{{$posts->slug}}" class="form-control" type="text" />
				<hr>
				<textarea class="form-control" value="" name="body">{{$posts->body}}</textarea>
				<hr>
				<input class="btn btn-success btn-block" type="submit" value="submit">
			</form>
		</div>
	</div>
@endsection
