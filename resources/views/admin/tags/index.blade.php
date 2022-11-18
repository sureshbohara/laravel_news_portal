@extends('layouts.admin.main')
 @section('title')
   Taraikhabar || News Tags
 @endsection
@section('content')


       <div class="body flex-grow-1 py-4">
        <div class="container-lg">

          <div class="row">

            <div class="col-6">
              <div class="card mb-4">

                <div class="card-header">
                <div class="row">
                  <div class="col-md-6">
                      <strong>Tags / News Tags</strong>
                  </div>
                  </div>
                 </div>
                

                <div class="card-body">

                   <table class="table table-bordered">
                      <thead class="table-dark">
                        <tr>
                          <th>#</th>
                          <th>Tags</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach($tags as $value)
                        <tr>
                          <td>{{$value['id']}}</td>
                          <td>{{$value['title']}}</td>

                          <td>
                             <form id="status{{ $value['id'] }}"
                              action="{{ route('tags.status') }}" method="post">
                              @csrf
                              <input type="hidden" value="{{ $value['id'] }}" name="tags_id">
                              <div id="checkbox{{ $value['id'] }}">
                                <input type="checkbox" {{ $value['status'] == 1 ? 'checked' : '' }} data-toggle="toggle" data-width="30">
                              </div>
                           </form>
                          </td>

                          <td class="d-flex">
                            @isset(auth()->guard('admin')->user()->role->permission['permission']['tags']['edit'])
                             <a data-coreui-toggle="modal" type="button" data-coreui-target="#tagsUpdate{{$value->id}}" title="Change This" class="btn btn-success btn-xs">
                              <i class="fa fa-edit"></i>
                            </a>
                             @endisset
                             @isset(auth()->guard('admin')->user()->role->permission['permission']['tags']['delete'])
                              <form action="{{ route('tags.destroy', $value['id']) }}" method="post">@csrf
                              @method('DELETE')
                              <input name="_method" type="hidden" value="DELETE">
                              <button  type="submit" title="delete data" class="btn btn-danger btn-xs show_confirm">
                                  <i class="fa fa-trash"></i>
                              </button>
                             </form> 
                              @endisset 
                          
                          </td>

                        </tr>


                         <div class="modal fade" id="tagsUpdate{{$value->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header bg-dark">
                                <h5 class="modal-title text-light" id="exampleModalLabel">Update Data</h5>
                                <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form action="{{route('tags.update',$value->id)}}" method="post">@csrf
                                @method('PUT')
                                <div class="modal-body">

                                  <div class="form-group">
                                  <label for="name"> Title</label>
                                  <input type="text" name="title" id="title" class="form-control" value="{{$value->title}}">

                                  <input type="hidden" name="slug" id="slug" class="form-control" value="{{$value->slug}}">

                                  <div class="form-group">
                                  <label class="form-label">Order Level</label>
                                  <input type="number" name="order_level" id="order_level" class="form-control" value="{{$value->order_level}}">
                                  <small>Higher number has high priority</small>
                                </div>

                                </div>
                                </div>

                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary">Save changes</button>
                              </div>
                              </form>
                            </div>
                          </div>
                        </div>

                        @endforeach
                      </tbody>
                   </table>

                </div>
              </div>
            </div>

               <div class="col-6">
                <div class="card mb-4">
                  <div class="card-header">
                   <div class="row">
                    <div class="col-md-6">
                        <strong>Tags / Create Post Tags</strong>
                     </div>
                   </div>
                  </div>
                

                 <div class="card-body">
                   <div class="example">
                     <div class="tab-content rounded-bottom">
                      <div class="tab-pane p-3 active">

                        <form action="{{route('tags.store')}}" method="post" id="createRole" enctype="multipart/form-data">
                          @csrf
                      
                        <div class="row">

                        <div class="mb-3 col-md-12">
                          <label class="form-label">Title</label>
                          <input type="text" name="title" id="title" class="form-control">
                          <font style="color:red">{{($errors->has('title'))?($errors->first('title')):''}}</font>
                        </div>

                        <input type="hidden" name="slug" id="slug" class="form-control">

                        <div class="mb-3 col-md-12">
                          <label class="form-label">Order Level</label>
                          <input type="number" name="order_level" id="order_level" class="form-control" value="0">
                          <small>Higher number has high priority</small>
                        </div>


                         <div class="col-12">
                          <button class="btn btn-primary" type="submit">Create Tags</button>
                        </div>
                        </div>
                      </form>
  
                      </div>
                     </div>
                  </div>
                </div>
            </div>

          </div>
        </div>
      </div>
    </div>

 @push("scripts")
<script>
    $(document).ready(function() {
        var datas = {!! json_encode($tags) !!};
         datas.forEach(test => {
            $("#checkbox" + test["id"]).click(function() {
                document.getElementById("status" + test["id"]).submit();
            });
        });
    });
</script>


<script>
  $(document).ready(function(){
      $('#title').keyup(function(e){
          var str = $('#title').val();
          str = str.replace(/\W+(?!$)/g, '-').toLowerCase();
          $('#slug').val(str);
          $('#slug').attr('placeholder', str);
      });
  });
  </script>

@endpush

@endsection