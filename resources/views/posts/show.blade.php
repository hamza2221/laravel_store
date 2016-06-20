@extends('main')
@section('title','| '.$posts->title)
@section('content')

<div class="row">
	<div class="col-md-8">
		<div class="well">
			<h1>{{$posts->title}}</h1>
		</div>
		<div>{{$posts->body}}</div>
	</div>
	<div class="col-md-4">
		<div class="well">
			<dl>
				<dt>URL:</dt>
				<dd><a href="{{url("/blog/$posts->slug")}}">{{url("/blog/$posts->slug")}}</a></dd>
			</dl>
			<dl>
				<dt>Created at:</dt>
				<dd>{{$posts->created_at}}</dd>
			</dl>
			<dl>
				<dt>Updated at:</dt>
				<dd>{{$posts->updated_at}}</dd>
			</dl>
			<span class="">
				<a href="{{url('posts/'.$posts->id.'/edit')}}">
					<button type="button" class="btn btn-success btn-sm">Edit</button>
				</a>

			</span>
			<span class="">
				<button type="button" onclick="delete_post({{$posts->id}})" class="btn btn-sm btn-danger">Delete</button>
			</span>
		</div>
	</div>
</div>
@endsection


@section('custom_scripts')
	<script>
		//alert(' {{url("posts/1")}}');
		
	    function delete_post(post_id){
	    	// alert(post_id)
	    	var check=confirm("Do you want to delete this post?");
	    	if(check==true){
	    		$.ajax({
			        url: ' {{url("posts")}}/'+post_id,
			        type: 'Delete',
			         data: { "_token": "{{ csrf_token() }}" },
			        success: function( msg ) {
			            window.location.href="{{url('posts')}}";
			        },
			        error: function (xhr, ajaxOptions, thrownError) {
		        		alert(xhr.status+thrownError);
				    }
	    		});
	    	}
	    	else{
	    		alert("cancaled")
	    	}
	    	/**/
	    }
	</script>
@endsection