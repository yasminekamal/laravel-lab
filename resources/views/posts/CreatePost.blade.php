@extends('../layouts.app')
@section('content')
<div class="container mt-4">
    <h2 class="text-primary mb-3"> New Post</h2>
    <div class="row">
    <table class="table table-success table-striped">
    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    <label for="exampleInputtitle" class="form-label">Title</label>
    <input type="text" class="form-control"  id="exampleInputtitle" name="title"  class="@error('title') is-invalid @enderror">
    @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputbody" class="form-label">Body</label>
    <input type="text" class="form-control"  id="exampleInputbody" name="body" class="@error('body') is-invalid @enderror">
  
    @error('body')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
  </div>
  <div class="mb-3">
    <select class="form-select" name="user_id">
      @foreach ($users as $user)
          <option value="{{ $user->id }}">{{ $user->name }}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label for="exampleInputfile" class="form-label">upload image</label>
    <input type="file" class="form-control"  id="exampleInputfile" name="image" >
  </div>
  <div>
    <x-button hrefval="{{ route('posts.index') }}" classval="primary" txt="Return" ></x-button>

  <button type="submit" class="btn btn-sm btn-primary">Submit</button>
   </div>
</form>
       
    </div>
</div>


<div class="row">
</div>
@endsection