<?php 
namespace App\Repositories;

use App\Models\Blog;

class BlogRepository{

    public function getAllBlogs(){
        return Blog::all();
    }
    public function createBlog($data){
        return Blog::create($data);
    }
    public function deleteBlog(Blog $blog){
         $blog->delete();
    }
    public function updateBlog(array $data,Blog $blog){
       $blog->update($data);
       return $blog;
    }
}