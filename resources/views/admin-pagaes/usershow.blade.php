@extends('layouts.admin')

@section('title')
    Admin Dashboard | User Info
@endsection

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
      <a href="{{route('admin.dasboard.users')}}" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

  <div class="content">
    <div class="container-fluid">

             <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  Jr.Senior
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                    <h2 class="lead"><b>{{$user->name}}</b></h2>
                      <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                      <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Email: {{$user->email}}</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: +977-9817253327</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                    <img src="/storage/profileimages/{{$user->profile_image}}"  alt="" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                  </div>
                </div>
              </div>
            </div> 
       
    </div><!-- /.container-fluid -->
    
  </div>
      </div>
    </div>
  </div>

  <!-- /.content -->
@endsection
