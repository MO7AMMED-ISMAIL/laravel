@extends('layout.app')
@section('title')
    edit Article
@endsection

@section('content')
<div class="card-header py-3">

    <form method="post" action="/articles/{{$user['id']}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label class="form-label">Title</label>
          <input type="text" class="form-control" value="{{$user['title']}}" name="title" style="border: 1px solid">
        </div>

        <div class="mb-3">
          <label class="form-label">Content</label>
          <input type="text" class="form-control" name="content" value="{{$user['content']}}" style="border: 1px solid">
        </div>
        
        <div class="mb-3">
          <label class="form-label">Image</label>
          <input type="file" class="form-control" value="{{$user['image']}}" name="image" style="border: 1px solid">
        </div>

        <div class="mb-3">
          <label class="form-label">User_ID</label>
          <input type="text" class="form-control" name="user_id" style="border: 1px solid" value="{{$user['user_id']}}">
        </div>

        <button type="submit" class="btn btn-primary">Add</button>
        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif
    </form>
  </div>
@endsection