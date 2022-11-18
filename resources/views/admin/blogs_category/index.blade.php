@extends('layouts.admin.main')
 @section('title')
   Taraikhabar || Blogs Category
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
                      <strong>Blogs / List Category</strong>
                  </div>
                  </div>
                 </div>
                

                <div class="card-body">

                   <table class="table table-bordered">
                      <thead class="table-dark">
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Order Level</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach($blogCategory as $value)
                        <tr>
                          <td>{{$value['id']}}</td>
                          <td>{{$value['name']}}</td>
                          <td>{{$value['order_level']}}</td>

                          <td>
                             <form id="status{{ $value['id'] }}"
                              action="{{ route('bcategory.status') }}" method="post">
                              @csrf
                              <input type="hidden" value="{{ $value['id'] }}" name="bcategory_id">
                              <div id="checkbox{{ $value['id'] }}">
                                <input type="checkbox" {{ $value['status'] == 1 ? 'checked' : '' }} data-toggle="toggle" data-width="30">
                              </div>
                           </form>
                          </td>

                          <td class="d-flex">
                            @isset(auth()->guard('admin')->user()->role->permission['permission']['bcategory']['edit'])
                             <a data-coreui-toggle="modal" type="button" data-coreui-target="#bCategoryUpdate{{$value->id}}" title="Change This" class="btn btn-success btn-xs">
                              <i class="fa fa-edit"></i>
                            </a>
                             @endisset
                             @isset(auth()->guard('admin')->user()->role->permission['permission']['bcategory']['delete'])
                              <form action="{{ route('bcategory.destroy', $value['id']) }}" method="post">@csrf
                              @method('DELETE')
                              <input name="_method" type="hidden" value="DELETE">
                              <button  type="submit" title="delete data" class="btn btn-danger btn-xs show_confirm">
                                  <i class="fa fa-trash"></i>
                              </button>
                             </form> 
                              @endisset 
                          
                          </td>

                        </tr>


                         <div class="modal fade" id="bCategoryUpdate{{$value->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header bg-dark">
                                <h5 class="modal-title text-light" id="exampleModalLabel">Update Data</h5>
                                <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form action="{{route('bcategory.update',$value->id)}}" method="post">@csrf
                                @method('PUT')
                                <div class="modal-body">

                                  <div class="form-group">
                                  <label for="name">Category Name</label>
                                  <input type="text" name="name" id="name" class="form-control" value="{{$value->name}}">
                                </div>

                                <div class="form-group d-none">
                                  <label for="name">Slug</label>
                                  <input type="text" name="slug" id="slug" class="form-control" value="{{$value->slug}}">
                                </div>

                                <div class="form-group">
                                  <label for="name">Ordering Number</label>
                                  <input type="number" name="order_level" id="order_level" class="form-control" value="{{$value->order_level}}">
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
                        <strong>Blogs / Create Category</strong>
                     </div>
                   </div>
                  </div>
                

                 <div class="card-body">
                   <div class="example">
                     <div class="tab-content rounded-bottom">
                      <div class="tab-pane p-3 active">

                        <form action="{{route('bcategory.store')}}" method="post" id="createBcategory" enctype="multipart/form-data">
                          @csrf
                      
                        <div class="row">

                        <div class="mb-3 col-md-12">
                          <label class="form-label">Name</label>
                          <input type="text" name="name" id="name" class="form-control" placeholder="Blog Category Name">
                          <font style="color:red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                        </div>

                         <div class="mb-3 col-md-12 d-none">
                          <label class="form-label">Slug</label>
                          <input type="text" name="slug" id="slug" class="form-control">
                        </div>

                        <div class="mb-3 col-md-12">
                          <label class="form-label">Ordering Number</label>
                          <input type="number" name="order_level" id="order_level" class="form-control" placeholder="Order Number">
                          <small>Higher number has high priority</small>
                        </div>


                         <div class="col-12">
                          <button class="btn btn-primary" type="submit">Create Data</button>
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

      @push("scripts")

<!-- category status -->
<script>
    $(document).ready(function() {
        var datas = {!! json_encode($blogCategory) !!};
         datas.forEach(test => {
            $("#checkbox" + test["id"]).click(function() {
                document.getElementById("status" + test["id"]).submit();
            });
        });
    });
</script>

 <script>
        $(document).ready(function(){
            $('#name').keyup(function(e){
                var str = $('#name').val();
                str = str.replace(/\W+(?!$)/g, '-').toLowerCase();
                $('#slug').val(str);
                $('#slug').attr('placeholder', str);
            });
        });
        </script>

@endpush

@endsection