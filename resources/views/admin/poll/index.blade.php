@extends('layouts.admin.main')
 @section('title')
   Taraikhabar || List Poll
 @endsection
@section('content')


       <div class="body flex-grow-1 py-4">
        <div class="container-lg">

          <div class="row">

            <div class="col-8">
              <div class="card mb-4">

                <div class="card-header">
                <div class="row">
                  <div class="col-md-6">
                      <strong>Poll / List Poll</strong>
                  </div>
                  </div>
                 </div>
                

                <div class="card-body">

                   <table class="table table-bordered">
                      <thead class="table-dark">
                        <tr>
                          <th>#</th>
                          <th>Question</th>
                          <th>Yes Vote</th>
                          <th>No Vate</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach($poll as $value)
                        <tr>
                          <td>{{$value['id']}}</td>
                          <td>{{$value['question']}}</td>
                          <td>{{$value['yes_vote']}}</td>
                          <td>{{$value['no_vote']}}</td>

                          <td>
                             <form id="status{{ $value['id'] }}"
                              action="{{ route('poll.status') }}" method="post">
                              @csrf
                              <input type="hidden" value="{{ $value['id'] }}" name="poll_id">
                              <div id="checkbox{{ $value['id'] }}">
                                <input type="checkbox" {{ $value['status'] == 1 ? 'checked' : '' }} data-toggle="toggle" data-width="30">
                              </div>
                           </form>
                          </td>

                          <td class="d-flex">
                            @isset(auth()->guard('admin')->user()->role->permission['permission']['poll']['edit'])
                             <a data-coreui-toggle="modal" type="button" data-coreui-target="#PollUpdate{{$value->id}}" title="Change This" class="btn btn-success btn-xs">
                              <i class="fa fa-edit"></i>
                            </a>
                             @endisset
                             @isset(auth()->guard('admin')->user()->role->permission['permission']['poll']['delete'])
                              <form action="{{ route('poll.destroy', $value['id']) }}" method="post">@csrf
                              @method('DELETE')
                              <input name="_method" type="hidden" value="DELETE">
                              <button  type="submit" title="delete data" class="btn btn-danger btn-xs show_confirm">
                                  <i class="fa fa-trash"></i>
                              </button>
                             </form> 
                              @endisset 
                          
                          </td>

                        </tr>


                         <div class="modal fade" id="PollUpdate{{$value->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header bg-dark">
                                <h5 class="modal-title text-light" id="exampleModalLabel">Update Data</h5>
                                <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form action="{{route('poll.update',$value->id)}}" method="post">@csrf
                                @method('PUT')
                                <div class="modal-body">
                                  <div class="form-group">
                                  <label for="name">Poll Title</label>
                                  <input type="text" name="question" id="question" class="form-control" value="{{$value->question}}">
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

               <div class="col-4">
                <div class="card mb-4">
                  <div class="card-header">
                   <div class="row">
                    <div class="col-md-6">
                        <strong>Poll / Create Poll</strong>
                     </div>
                   </div>
                  </div>
                

                 <div class="card-body">
                   <div class="example">
                     <div class="tab-content rounded-bottom">
                      <div class="tab-pane p-3 active">

                        <form action="{{route('poll.store')}}" method="post" id="createRole" enctype="multipart/form-data">
                          @csrf
                      
                        <div class="row">
                        <div class="mb-3 col-md-12">
                          <label class="form-label">Question</label>
                          <textarea class="form-control" name="question" id="question"></textarea>
                          <font style="color:red">{{($errors->has('question'))?($errors->first('question')):''}}</font>
                        </div>


                         <div class="col-12">
                          <button class="btn btn-primary" type="submit">Create Question</button>
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

<!-- category status -->
<script>
    $(document).ready(function() {
        var datas = {!! json_encode($poll) !!};
         datas.forEach(test => {
            $("#checkbox" + test["id"]).click(function() {
                document.getElementById("status" + test["id"]).submit();
            });
        });
    });
</script>


@endpush

@endsection