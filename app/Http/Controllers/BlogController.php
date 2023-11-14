<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogUpdateRequest;
use App\Models\Blog;
use App\Repositories\BlogRepository;

use Illuminate\Http\Request;

class BlogController extends Controller
{
 
    public function __construct(private BlogRepository $blogRepository)
    {
        $this->blogRepository=$blogRepository;
    }

    public function getAllBlogs()
    {
        $blogs = $this->blogRepository->getAllBlogs(); //1. yöntem
        // $blogs = (new BlogRepository())->getAllBlogs(); //2. yöntem

        //ikinci yöntem daha hızlı ve basit, __construct ile eklediğinde tüm fonksiyonlarda o repo yüklenir kullanmasan bile
        //ama bu şekilde sadece bu fonksiyonda gerekli yerde yüklenri, ikisini de kullanıp
     
        return view('admin.blog',['blogs'=>$blogs]); 
    }

    private function uploadFile($file){
        $filename = md5(time()).\Str::slug($file->getClientOriginalName()).'.'.$file->getClientOriginalExtension();
        $file->move(storage_path('app/public/images'), $filename);
        return '/storage/images/'.$filename;
    }

    public function blogAdd(){
        return view('admin.blogForm');
    }

    public function blogStore(BlogUpdateRequest $request){
        $newBlog = $this->blogRepository->createBlog([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'header_img' => $this->uploadFile($request->file('header_img')),
        ]);
        return redirect()->route('admin.blog');
    }

    public function blogEdit(Blog $blog){
        return view('admin.blogForm',['blog'=>$blog]);
    }

    public function blogUpdate(BlogUpdateRequest $request,Blog $blog)
    {
        $data = [
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'header_img' => $this->uploadFile($request->file('header_img')),
        ];
        $updateBlog = $this->blogRepository->updateBlog($data,$blog);
        return redirect()->route('admin.blog');
    }

    
    public function blogDelete(Blog $blog)
    {
        $this->blogRepository->deleteBlog($blog);
        return redirect(route('admin.blog'));
    }

    /* CRUD (REPOSİTORYSİZ)
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

        public function blogStore(BlogUpdateRequest $request){
                $data = [
                    'title' => $request->input('title'),
                    'content' => $request->input('content'),
                    'header_img' => $this->uploadFile($request->file('header_img')),
                ];
                $newBlog = $this->blogRepository->createBlog($data);
                return redirect()->route('admin.blog');
        }
    
        public function blogDelete(Blog $blog){
            $blog->delete();
            return redirect(route('admin.blog'))->with('succes',"Blog deleted succesfly");
        }
    */

    // Blogs sayfası
    public function allBlogs()
    {
        $blogs = Blog::all();
        return view('blog.all', compact('blogs'));
    }
    
    public function show($id)
    {
        $blog = Blog::where('id', $id)->firstOrFail();
        return view('blog.show', compact('blog'));
    }
    
    
}
