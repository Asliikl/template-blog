@extends('admin.layouts.master')

@section('content')
<br>
<h3>Aslı Blog Contents</h3>

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Contents Table</h3>
        </div>
        <!-- ./card-header -->
        <div class="card-body">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Header İmage</th>
                <th colspan="2">Transactions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td>{{$blog->title}}</td>
                    <td>{{$blog->content}}</td>
                    <td><a target="_blank" href="{{$blog->header_img}}"><img style="width:100px" src="{{$blog->header_img}}" alt=""></a></td>
                    <td class="text-center"><a href="{{route('admin.blogEdit',[$blog])}}"><button class="btn btn-warning">Düzenle</button></a></td>
                    <td class="text-center"><a href="{{route('admin.blogDelete',[$blog])}}"><button class="btn btn-danger">Sil</button></a></td>
                  </tr>
                @endforeach
            
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection

