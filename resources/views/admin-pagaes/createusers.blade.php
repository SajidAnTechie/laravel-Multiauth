@extends('layouts.admin')

@section('title')
    Admin Dashboard | Create Users
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



  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add User</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            {{-- action="javascript:void(0)" --}}
            {{-- action="{{route('posts.store')}}" --}}
          <form method="POST" action="{{route('admin.create.users.store')}}">
              @csrf

              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control"  id="exampleInputEmail1" value="{{old('name')}}" name="name" placeholder="Admin Name">
                  <span class="text-danger">{{ $errors->first('name') }}</span>
                </div>
                <div class="form-group">
                  <label for="description">Email</label>
                  <input type="email" class="form-control"  id="exampleInputEmail1" value="{{old('email')}}" name="email" placeholder="example.com">
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">Gender</label>
                    <div class="input-group">
                      <div class="custom-file">
                          <select class="form-control" name="gender" id="">
                              <option value="" disabled>Choose gender</option>
                             
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            
                          </select>
                          <span class="text-danger">{{ $errors->first('gender') }}</span>
                      </div>
                    </div>
                  </div>

                <div class="form-group">
                    <label for="description">Password</label>
                    <input type="password" class="form-control" id="exampleInputEmail1" value="{{old('password')}}" name="password" placeholder="example.com">
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                </div>

            <div class="form-group">
                    <label for="description">Confirm Password</label>
                    <input type="password" class="form-control" id="exampleInputEmail1" name="password_confirmation" placeholder="example.com">
                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
            </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit"  class="btn btn-primary">Add User</button>
              </div>
            </form>
          </div>

    </div>
  </section>

@endsection

@section('script')

<script type="text/javascript">
        

             
$(document).ready(function(){


  $('#submit_form').click(function(){
    ////alert('hello');

    $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });

      $('#submit_form').html('Posting..');

      $.ajax({

      method: "POST",
      url: "/admin/dashboard/posts/save",
      data: $('#post_store').serialize(),
      dataType: "JSON",

      success: function( response ) {
          if(response.status=='success'){
            $('#submit_form').html('Submit');
            $('#res_message').show();
            $('#res_message').html(response.msg);
            $('#msg_div').removeClass('d-none');

            document.getElementById("post_store").reset(); 
            setTimeout(function(){
            $('#res_message').hide();
            $('#msg_div').hide();
            },10000);

          }else if(response.status=='error'){
            $('#res_message').html(response.msg);
            $('#msg_div').addClass('alert-danger');
          }

      }

      });

      });



});
             
       </script>
        
@endsection


