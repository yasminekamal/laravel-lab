@extends('../layouts.app')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container mt-4">
    <h2 class="text-primary mb-3"> Edit Post</h2>
    <div class="row">
    <table class="table table-success table-striped">
    <form action="{{ route('posts.update',$post->id) }}" method="post">
      @csrf
      @method("put")
  <div class="mb-3">
    <label for="exampleInputid" class="form-label">Id</label>
    <input type="text" class="form-control" id="exampleInputid" value="{{$post->id}}"  disabled>
  </div>
  <div class="mb-3">
    <label for="exampleInputtitle" class="form-label">Title</label>
    <input type="text" class="form-control" value="{{$post->title}}" name="title" id="exampleInputtitle" class="@error('title') is-invalid @enderror">
    @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputbody" class="form-label">Body</label>
    <input type="text" class="form-control" value="{{$post->body}}" id="exampleInputbody" name="body" class="@error('body') is-invalid @enderror">
    @error('body')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
  </div>
  <div class="mb-3">
    <select class="form-select" name="user_id">
      @foreach ($users as $user)
          <option value="{{ $user->id }}" @if ($post->user_id==$user->id)
            selected
          @endif>{{ $user->name }}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label for="exampleInputcreatedat" class="form-label">created At</label>
    <input type="text" class="form-control" value="{{$post->created_at}}" id="exampleInputcreatedat" name="created_at" disabled>
  </div>
  <div class="mb-3">
    <label for="exampleInputupdatedat" class="form-label">updated At</label>
    <input type="text" class="form-control" value="{{$post->updated_at}}" id="exampleInputupdatedat" name="updated_at" disabled>
  </div>
  <div>
  <x-button hrefval="/posts" classval="primary" txt="Return" ></x-button>
  <button type="submit" class="btn btn-sm btn-primary">Submit</button>
</div>
</form>
       
    </div>
</div>

<div class="row">
</div>
@endsection