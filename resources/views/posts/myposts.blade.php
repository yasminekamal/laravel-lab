@extends('../layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
    @foreach ($posts as $post)
     <div class="col">
            
      <div class="card" style="width: 18rem;">
        <img src="{{ asset('storage/images/posts/'.$post->image) }}" class="card-img-top" width="200px" height="200px" alt="...">
        <div class="card-body">
          <h5 class="card-title">post title</h5>
          <p class="card-text">{{$post["title"]}}</p>
        </div>
       
        <div class="card-body">
          <p class="card-text">{{$post["body"]}}</p>
          <p class="card-text">{{$post->user->name}}</p>
        </div>
        <div class="card-footer text-center">
          <x-button hrefval="{{ route('posts.index') }}" classval="primary" txt="Return" ></x-button>

        </div>
      </div>
     </div>
      @endforeach


</div>
    </div>
</div>

<div class="row">
</div>
@endsection
