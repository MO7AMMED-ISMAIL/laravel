<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Article;
use Illuminate\Support\Facades\File;
class ArticleController extends Controller
{

    public function index()
    {
        $user = Article::all();
        return view('Article.index',["users"=>$user]);
    }

    public function create()
    {
        return view('Article.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $request ->validate([
            "title"=>["required","max:255"],
            "content"=>["required"],
            "image"=>["required","mimes:jpeg,bmp,png"]
        ]);
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('images'), $filename);
            $data['image']= $filename;
        }
        Article::create($data);
        return redirect("/articles");
    }

    public function show($id)
    {
        $user = Article::find($id);
        return view('Article.show',compact('user'));
    }


    public function edit($id)
    {
        $user = Article::find($id);
        return view('Article.edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request ->validate([
            "title"=>["required","max:255"],
            "content"=>["required"],
            "image"=>["required","mimes:jpeg,bmp,png"],
        ]);
        $data = $request->all();
        $user = Article::find($id);
        $user['title']= $data['title'];
        $user['content'] = $data['content'];
        $user['user_id'] = $data['user_id'];
        if($request ->hasfile('image')){
            $des = "images/".$user["image"];
            if(File::exists($des)){
                Fill:delete($des);
            }
            $file = $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('images'), $filename);
            $user['image'] = $filename;
        }
        $user->save();
        return redirect("/articles");
    }

    public function destroy($id)
    {
        $user = Article::find($id);
        $user->delete();
        return redirect("/articles");
    }
}
