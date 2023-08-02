@extends('layouts/main')

@section('isibody')
<h4 class="p-2 p-l-4">All Author</h4>
@foreach ($author as $author)
<div class="p-2">
    <div class="bg-light p-3">
    <h4><a class="text-decoration-none" href="/blog?author={{ $author->username }}">{{ $author->name }}</a></h4>
</div>
</div>
@endforeach
@endsection