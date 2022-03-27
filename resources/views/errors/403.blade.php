@extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code')
<div>
    <img src="{{ URL('error_images/403.PNG') }}" width="200px" height="200px"/>
</div>
@endsection
@section('message')
<p>you are not the author of the post you are forbidden to do this </p>
<a class="btn btn-sm btn-info mt-3" href="{{ route("posts.index") }}">Return</a>
@endsection
