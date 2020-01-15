@extends('layouts.admin')

@section('title')
    Admin Dashboard | Users
@endsection

@section('content')


  <div class="content">
    <div class="container-fluid">

      
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="margin-bottom: 0;">Users table</h3><br/>
                Filters:
                <a href="{{route('admin.dasboard.users',['gender'=>'male'])}}">Male</a> |
                <a href="{{route('admin.dasboard.users',['gender'=>'female'])}}">Female</a>

                <div class="card-tools">
                <form action="{{route('admin.dasboard.users')}}" class="d-flex" method="GET">
                <input type="text" name="q" class="form-control" value="{{request('q')}}" placeholder="search users">
                    <button type="submit" class="btn btn-success">Search</button>
                </form>
                <a href="{{route('admin.create.user')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Users</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>gender</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($users)>0)
                    @foreach ($users as $user)
                        
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->gender  }}</td>
                            <td>
                                <form  method="POST" action="{{route('user.delete',$user->id)}}">
                                    @csrf
                                    <a href="{{route('user.show',$user->id)}}" class="btn btn-warning"><i class="fas fa-eye"></i></a>

                                  <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                  {{ method_field('DELETE') }}
                                  
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @else
                    <tr><td>No Users for {{request('gender') ? request('gender') : request('q') }}</td></tr>
                    @endif

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            
            <!-- /.card -->
       
    </div><!-- /.container-fluid -->
    
  </div>
  {{$users->links()}} 

</div>
  <!-- /.content -->
@endsection
