@extends('main')
@section('title',"| New Post")
@section('content') 

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Create New Post</h1>
			<form method="POST" action=" {{ url('posts') }}" accept-charset="UTF-8">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input name="title" class="form-control" value="<?php if(isset($_GET['title'])){
				echo $_GET['title'];
				}?>" type="text" />
				<hr>
				<input name="slug" class="form-control" type="text" />
				<hr>
				<textarea class="form-control" value="" name="body"></textarea>
				<hr>
				<input class="btn btn-success btn-block" type="submit" value="submit">
			</form>
		</div>
	</div>
@endsection
