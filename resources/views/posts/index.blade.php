
@extends('main')
@section('content')
      <div class="row">
        <div class="col-md-12">
          <div class="jumbotron">
            <h1>My All Posts!</h1>
            <p class="lead">Thank you so much for visiting. This is my test website built with Laravel. Please read my popular post!</p>
          </div>
        </div>
      </div>
      <!-- end of header .row -->

      <div class="row">
        <div class="col-md-8">
        @foreach($posts as $k=>$i)
          <div class="post">
            <h3><span class="badge ">{{ $k+1}}</span> {{ $i->title}}</h3>
            <p>{{$i->body}}</p>
            <a href="{{url('posts/'.$i->id)}}" class="btn btn-primary">Read More</a>
          </div>

          <hr>
          @endforeach
          <div class="text-center">{!! $posts->links(); !!}</div>
        </div>
        

        <div class="col-md-3 col-md-offset-1">
          <h2>Sidebar</h2>
        </div>
      </div>
@endsection
    