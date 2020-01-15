@extends('layouts.admin')

@section('title')
    Admin Dashboard | Admin Edit
@endsection

@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        <a href="{{route('admin.dasboard.admins')}}" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>



  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            {{-- action="javascript:void(0)" --}}
            {{-- action="{{route('posts.store')}}" --}}
          <form method="POST" action="{{route('admin.edit.store',$admin->id)}}">
              @csrf

              {{ method_field('PUT') }}

              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" value="{{$admin->name}}" id="exampleInputEmail1" name="name" placeholder="Admin Name">
                  <span class="text-danger">{{ $errors->first('name') }}</span>
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <input type="email" class="form-control"  value="{{$admin->email}}" id="exampleInputEmail1" name="email" placeholder="example.com">
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                </div>


              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit"  class="btn btn-primary">Edit</button>
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


