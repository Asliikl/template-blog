<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogUpdateRequest;
use App\Models\Blog;

use Illuminate\Http\Request;

class BlogController extends Controller
{
 
    private function uploadFile($file){
        $filename = md5(time()).\Str::slug($file->getClientOriginalName()).'.'.$file->getClientOriginalExtension();
        $file->move(storage_path('app/public/images'), $filename);
        return '/storage/images/'.$filename;
    }

    public function blogAdd(){
        return view('admin.blogForm');
    }

    public function blog(){
        $blogs =Blog::all();
        return view('admin.blog',['blogs'=>$blogs]); 
    }

    public function blogStore(BlogUpdateRequest $request)
    {
        $newblog=Blog::create([
            'title'=>$request->get('title'),
            'content'=>$request->get('content'),
            'header_img'=>$this->uploadFile($request->file('header_img'))
        ]);
        return redirect()->route('admin.blog');
    }

    public function blogEdit(Blog $blog){
        return view('admin.blogForm',['blog'=>$blog]);
    }
    public function blogDelete(Blog $blog){
        $blog->delete();
        return redirect(route('admin.blog'))->with('succes',"Blog deleted succesfly");
    }

    public function blogUpdate(BlogUpdateRequest $request,Blog $blog)
    {
        $blog->update([
            'title'=>$request->get('title'),
            'content'=>$request->get('content'),
            'header_img'=>$this->uploadFile($request->file('header_img'))
        ]);
        return redirect()->route('admin.blog');
    }
}
