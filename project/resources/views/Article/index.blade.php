@extends('layout.app')
@section('title')
    index page
@endsection

@section('content')
<div class="card shadow mb-4">
        <div class="card-header py-3">
            <br><a class="btn btn-primary" href="articles/create" role="button">Add</a><br>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>image</th>
                            <th>User_id</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <th>{{$user["id"]}}</th>
                                <td>{{$user["title"]}}</td>
                                <td>{{$user["content"]}}</td>
                                <td>
                                    <img src="{{asset('images/'.$user['image'])}}" width="50" height="50">
                                </td>
                                <td>{{$user["user_id"]}}</td>
                                <td>
                                    <a class="btn btn-primary" href="/articles/{{$user['id']}}" role="button">View</a>
                                    <a class="btn btn-primary" href="/articles/{{$user['id']}}/edit" role="button">Edit</a>
                                    <form action="/articles/{{$user['id']}}" method="post" style="display:inline-block">
                                        @method('Delete')
                                        @csrf
                                        <input type="submit" class="btn btn-danger" value="Delete"></input>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</div>
@endsection