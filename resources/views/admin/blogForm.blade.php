@extends('admin.layouts.master')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6 mb-4 mt-4">
      <form action="{{ isset($blog) ? route('admin.blogUpdate',[$blog]) : route('admin.blogStore')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
          <div class="card-header">
            Blog Content Add
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Blog Title</label>
              <input type="text" name="title" class="form-control" id="exampleInputEmail1" value="{{isset($blog) ? $blog->title : ''}}">
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Blog Content</label>
              <input type="text" name="content" class="form-control" id="exampleInputPassword1" value="{{isset($blog) ? $blog->content : ''}}">
            </div>

            <div class="form-group">
              <label for="exampleInputFile">File input</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="header_img">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
                <img style="width:150px; margin-left: 10px;" src="{{isset($blog) ? $blog->header_img : ''}}" alt="">
              </div>
            </div>
          </div>

          <div class="card-footer">
            <button type="submit" class="btn btn-success">Add</button>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>

@endsection


