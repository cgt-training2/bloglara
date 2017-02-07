@extends('layouts.app')
@section('title', '| Homepage')
@section('content')
      <div class="row">
        <div class="col-md-12">
          <div class="jumbotron">
            <h1>Welcome to My Blog!</h1>
            <p class="lead">Thank you so much for visiting. This is my test website built with Laravel. Please read my popular post!</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>
          </div>
        </div>
      </div>
      <!-- end of header .row -->

      <div class="row">
          @foreach ($posts as $post)
            
            <div class="post col-md-8">
              <h3>{{$post->title}}</h3>
              <p>{!! $post->body !!}</p>

            </div>

          @endforeach
            


        <div class="col-md-3 col-md-offset-1">
          <h2>Sidebar</h2>
        </div>
      </div>
    </div> <!-- end of .row -->

@endsection