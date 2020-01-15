@extends('layouts.admin')

@section('title')
    Admin Dashboard | Posts
@endsection

@section('content')


  <div class="content">
    <div class="container-fluid">

        
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="margin-bottom: 0;">Users Posts</h3><br/>Show:
              <a href="{{route('admin.posts')}}">Admin Posts</a>
                <div class="card-tools">
                <a href="{{route('posts.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Posts</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Author name</th>
                            <th>Actions</th>
                        </tr>
                  </thead>
                  <tbody>
                    @if(count($posts)>0)
                        @foreach ($posts as $post)
                            
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td id="text">{{$post->decriptions}}</td>
                                <td>{{$post->user->name}}</td>
                                <td>
                                    <a href="#" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="btn btn-warning"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            
            <!-- /.card -->
       
    </div><!-- /.container-fluid -->
    
  </div>
  {{$posts->links()}} 

</div>
  <!-- /.content -->
@endsection
