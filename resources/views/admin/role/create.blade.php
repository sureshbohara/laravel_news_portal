@extends('layouts.admin.main')
 @section('title')
   Taraikhabar || List Role
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
                      <strong>Role / List Role</strong>
                  </div>
                  </div>
                 </div>
                

                <div class="card-body">

                   <table class="table table-bordered">
                      <thead class="table-dark">
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach($role as $value)
                        <tr>
                          <td>{{$value['id']}}</td>
                          <td>{{$value['name']}}</td>

                          <td>
                             <form id="status{{ $value['id'] }}"
                              action="{{ route('role.status') }}" method="post">
                              @csrf
                              <input type="hidden" value="{{ $value['id'] }}" name="role_id">
                              <div id="checkbox{{ $value['id'] }}">
                                <input type="checkbox" {{ $value['status'] == 1 ? 'checked' : '' }} data-toggle="toggle" data-width="30">
                              </div>
                           </form>
                          </td>

                          <td class="d-flex">
                            @isset(auth()->guard('admin')->user()->role->permission['permission']['role']['edit'])
                             <a data-coreui-toggle="modal" type="button" data-coreui-target="#RoleUpdate{{$value->id}}" title="Change This" class="btn btn-success btn-xs">
                              <i class="fa fa-edit"></i>
                            </a>
                             @endisset
                             @isset(auth()->guard('admin')->user()->role->permission['permission']['role']['delete'])
                              <form action="{{ route('role.destroy', $value['id']) }}" method="post">@csrf
                              @method('DELETE')
                              <input name="_method" type="hidden" value="DELETE">
                              <button  type="submit" title="delete data" class="btn btn-danger btn-xs show_confirm">
                                  <i class="fa fa-trash"></i>
                              </button>
                             </form> 
                              @endisset 
                          
                          </td>

                        </tr>


                         <div class="modal fade" id="RoleUpdate{{$value->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header bg-dark">
                                <h5 class="modal-title text-light" id="exampleModalLabel">Update Data</h5>
                                <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form action="{{route('role.update',$value->id)}}" method="post">@csrf
                                @method('PUT')
                                <div class="modal-body">
                                  <div class="form-group">
                                  <label for="name">Role Name</label>
                                  <input type="text" name="name" id="name" class="form-control" value="{{$value->name}}">
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
                        <strong>Role / Create Role</strong>
                     </div>
                   </div>
                  </div>
                

                 <div class="card-body">
                   <div class="example">
                     <div class="tab-content rounded-bottom">
                      <div class="tab-pane p-3 active">

                        <form action="{{route('role.store')}}" method="post" id="createRole" enctype="multipart/form-data">
                          @csrf
                      
                        <div class="row">
                        <div class="mb-3 col-md-12">
                          <label class="form-label">Name</label>
                          <input type="text" name="name" id="name" class="form-control" placeholder="Enter Role Name">
                          <font style="color:red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
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
        var datas = {!! json_encode($role) !!};
         datas.forEach(test => {
            $("#checkbox" + test["id"]).click(function() {
                document.getElementById("status" + test["id"]).submit();
            });
        });
    });
</script>


@endpush

@endsection