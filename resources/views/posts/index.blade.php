@extends('../layouts.app')

@section('content')

<div class="container mt-4">
  <div class="row">
  <table class="table table-success table-striped mb-4">
      <thead>
          <tr>
              <th>Id</th>
              <th>Title</th>
              <th>Slug</th>
              <th>Body</th>
              <th>user_id</th>
              <th>image</th>
              <th>created At</th>
              <th>updated At</th>
              <th>Show</th>

              <th>Update</th>
              <th>Delete</th>
          </tr>
      </thead>
      <tbody>
          @foreach($posts as $post)
             <tr>
                <td>{{$post->id}}</td>    
                <td>{{$post->title}}</td>   
                <td>{{$post->slug}}</td>   
                <td>{{$post->body}}</td>
                <td>{{$post->user->name}} </td>
                <td><img src="{{ asset('storage/images/posts/'.$post->image) }}" width="50px" height="50px"/></td>
                <td>{{ $post->created_at }} </td>
                <td>{{ $post->updated_at }} </td>  
                <td><x-button hrefval="{{ route('posts.show',$post->id) }}" classval="primary" txt="Show" ></x-button></td>
                   
                <td><x-button hrefval="{{ route('posts.edit',$post->id) }}" classval="info" txt="Edit"  ></x-button></td>
                <td><button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $post->id }}">delete</button></td>    
         
<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $post->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are You Sure You Want To Delete This Post
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <form action="{{ route('posts.destroy',$post->id) }}" method="post">    
          @csrf
          @method("delete")
        <button type="submit" class="btn btn-primary">Yes</button>
      </form>
      </div>
    </div>
  </div>
</div>
</tr>
@endforeach
</tbody>
</table>
{{ $posts->links() }}
<div class="text-center">
<x-button hrefval="{{ route('posts.create') }}" classval="outline-primary" txt="Create New Post" ></x-button>
</div>
</div>
</div>

<div class="row">
</div>
@endsection



