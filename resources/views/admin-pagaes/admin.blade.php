@extends('layouts.admin')

@section('title')
    Admin Dashboard | Admins
@endsection

@section('content')


  <div class="content">
    <div class="container-fluid">

        
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="margin-bottom: 0;">Admins table</h3><br/>
                

                <div class="card-tools">
                <a href="{{route('admin.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Admins</a>
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
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($admins)>0)
                    @foreach ($admins as $admin)
                        
                        <tr>
                            <td>{{$admin->id}}</td>
                            <td>{{$admin->name}}</td>
                            <td>{{$admin->email}}</td>
                            <td>

                                <form  method="POST" action="{{route('admin.delete',$admin->id)}}">
                                  @csrf
                                <a href="{{route('admin.edit',$admin->id)}}" class="btn btn-success"><i class="fas fa-edit"></i></a>

                                  <a href="{{route('admins.show',$admin->id)}}" class="btn btn-warning"><i class="fas fa-eye"></i></a>

                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                {{ method_field('DELETE') }}
                                
                              </form>
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
  {{$admins->links()}} 

</div>
  <!-- /.content -->
@endsection
