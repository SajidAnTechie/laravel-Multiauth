@extends('layouts.admin')

@section('title')
    Admin Dashboard | Laravel
@endsection

@section('content')

  <div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                <h3>{{$users}}</h3>
  
                  <p>USERS</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                <h3>{{$posts}}<sup style="font-size: 20px"></sup></h3>
  
                  <p>POSTS</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                <h3>{{$admins}}<sup style="font-size: 20px"></sup></h3>
  
                  <p>Admins</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
  
            <!-- ./col -->
   
            <!-- ./col -->
          </div>

          {{-- <div id="app">
            {!! $chart->container() !!}
        </div> --}}

       
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
@endsection
