@extends('layout.app')
@section('title')
    index page
@endsection

@section('content')
<div class="card-header py-3">

    <form method="post" action="/articles" enctype="multipart/form-data">
    
        @csrf
        <div class="mb-3">
          <label class="form-label">Title</label>
          <input type="text" class="form-control" name="title" style="border: 1px solid">
        </div>

        <div class="mb-3">
          <label class="form-label">Content</label>
          <input type="text" class="form-control" name="content" style="border: 1px solid">
        </div>
        
        <div class="mb-3">
          <label class="form-label">Image</label>
          <input type="file" class="form-control" name="image" style="border: 1px solid">
        </div>

        <div class="mb-3">
          <label class="form-label">User_ID</label>
          <input type="text" class="form-control" name="user_id" style="border: 1px solid">
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