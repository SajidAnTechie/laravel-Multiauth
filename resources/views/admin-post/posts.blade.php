@extends('layouts.admin')

@section('title')
    Admin Dashboard | Posts
@endsection

@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Create Posts</li>
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
              <h3 class="card-title">Add Post</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            {{-- action="javascript:void(0)" --}}
            {{-- action="{{route('posts.store')}}" --}}
          <form method="POST" action="{{route('posts.store')}}">
              {{ csrf_field() }}
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Post Title</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="example..Code For chage">
                  <span class="text-danger">{{ $errors->first('title') }}</span>
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea name="decriptions" class="form-control" placeholder="This post is awesome" id="des" cols="100" rows="10" ></textarea>
                  <span class="text-danger">{{ $errors->first('description') }}</span>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Choose file</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="post_image" id="exampleInputFile">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">Select Category</label>
                    <div class="input-group">
                      <div class="custom-file">
                          <select class="form-control" name="category_id" id="">
                              <option value="" disabled>Choose Category</option>
                              @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->cateory_name}}</option>
                              @endforeach
                          </select>
                          <span class="text-danger">{{ $errors->first('category_id') }}</span>
                      </div>
                    </div>
                  </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit"  class="btn btn-primary">Posts</button>
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


