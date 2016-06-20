@extends('main')
@section('title','| '.$posts->title)
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="">
			<h1>{{$posts->title}}
			</h1>
			<hr>
		</div>
		<div>{{$posts->body}}</div>
		<hr>
	</div>
	


	<div class="col-md-4">
		<div class="">
			<dl>
				<dt>URL:</dt>
				<dd><a href="{{url("/blog/$posts->slug")}}">{{url("/blog/$posts->slug")}}</a></dd>
			</dl>
			<dl>
				<dt>Created at:</dt>
				<dd>{{$posts->created_at}}</dd>
			</dl>
		</div>
	</div>
</div>
@endsection

