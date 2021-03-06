@extends('layouts.admin')

@section('title')
    Admin Dashboard | Admin Create
@endsection

@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Create Admin</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add Admin</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            {{-- action="javascript:void(0)" --}}
            {{-- action="{{route('posts.store')}}" --}}
          <form method="POST" action="{{route('admin.store')}}">
              {{ csrf_field() }}
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Admin Name">
                  <span class="text-danger">{{ $errors->first('name') }}</span>
                </div>
                <div class="form-group">
                  <label for="description">Email</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="example.com">
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                </div>
                <div class="form-group">
                        <label for="description">Password</label>
                        <input type="password" class="form-control" id="exampleInputEmail1" name="password" placeholder="example.com">
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
                <button type="submit"  class="btn btn-primary">Add</button>
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


