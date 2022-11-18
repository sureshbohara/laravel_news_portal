@extends('layouts.admin.main')
 @section('title')
   Taraikhabar || Advertisement
 @endsection
@section('content')


   <div class="body flex-grow-1 py-4">
        <div class="container-lg">

          <div class="row">

            <div class="col-8">
              <div class="card mb-4">

                <div class="card-header">
                <div class="row">
                  <div class="col-md-12">
                      <strong>Advertisement / List</strong>
                  </div>
                  </div>
                 </div>
                

                <div class="card-body">

                   <table class="table table-bordered" id="myTable">
                      <thead class="table-dark">
                        <tr>
                          <th>Image</th>
                          <th>Title</th>
                          <th>Place</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach($advertisement as $value)
                        <tr>
                          <td>
                            <img src="{{ $value->getFirstMediaUrl('image','image') }}" width="50px" height="50px" >
                          </td>
                          <td>{{$value['title']}}</td>
                          <td>{{$value['place']}}</td>

                          <td>
                             <form id="status{{ $value['id'] }}"
                              action="{{ route('advertisement.status') }}" method="post">
                              @csrf
                              <input type="hidden" value="{{ $value['id'] }}" name="adv_id">
                              <div id="checkbox{{ $value['id'] }}">
                                <input type="checkbox" {{ $value['status'] == 1 ? 'checked' : '' }} data-toggle="toggle" data-width="30">
                              </div>
                           </form>
                          </td>

                          <td class="d-flex">
                            @isset(auth()->guard('admin')->user()->role->permission['permission']['advertisement']['edit'])
                             <a data-coreui-toggle="modal" type="button" data-coreui-target="#advertisement{{$value->id}}" title="Change This" class="btn btn-success btn-xs">
                              <i class="fa fa-edit"></i>
                            </a>
                             @endisset
                             @isset(auth()->guard('admin')->user()->role->permission['permission']['advertisement']['delete'])
                              <form action="{{ route('advertisement.destroy', $value['id']) }}" method="post">@csrf
                              @method('DELETE')
                              <input name="_method" type="hidden" value="DELETE">
                              <button  type="submit" title="delete data" class="btn btn-danger btn-xs show_confirm">
                                  <i class="fa fa-trash"></i>
                              </button>
                             </form> 
                              @endisset 
                          
                          </td>

                        </tr>


                         <div class="modal fade" id="advertisement{{$value->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header bg-dark">
                                <h5 class="modal-title text-light" id="exampleModalLabel">Update Data</h5>
                                <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form action="{{route('advertisement.update',$value->id)}}" method="post" enctype="multipart/form-data">@csrf
                                @method('PUT')
                                <div class="modal-body">

                                    <div class="mb-3 col-md-12">
                                      <label class="form-label">Title</label>
                                      <input type="text" name="title" id="title" class="form-control" value="{{$value['title']}}">
                                    </div>

                                    <div class="mb-3 col-md-12">
                                      <label class="form-label">Link</label>
                                      <input type="text" name="link" id="link" class="form-control" value="{{$value['link']}}">
                                    </div>

                                    <div class="mb-3 col-md-12">
                                      <label class="form-label">Place</label>
                                      <select name="place" class="form-control">
                                        <option value="0">select place</option>
                                        <option value="0">select place</option>
                                          <option value="top" {{($value['place']=='top')?'selected':''}}>Top Header(1200*100)</option>
                                          <option value="logo_side" {{($value['place']=='logo_side')?'selected':''}}>Logo Sidebar(700*80)</option>
                                          <option value="regular_1" {{($value['place']=='regular_1')?'selected':''}}>Regular First(1200*100)</option>
                                          <option value="regular_2" {{($value['place']=='regular_2')?'selected':''}}>Regular Second(1200*100)</option>
                                          <option value="regular_3" {{($value['place']=='regular_3')?'selected':''}}>Regular Third(1200*100)</option>
                                          <option value="regular_4" {{($value['place']=='regular_4')?'selected':''}}>Regular Forth(1200*100)</option>
                                          <option value="sidebar" {{($value['place']=='sidebar')?'selected':''}}>Home Sidebar(370*250)</option>
                                          <option value="after_header" {{($value['place']=='after_header')?'selected':''}}>Details Page After Title(1200*80)</option>
                                          <option value="before_content" {{($value['place']=='before_content')?'selected':''}}>Details Page Before Content(1200*80)</option>
                                          <option value="details" {{($value['place']=='details')?'selected':''}}>Details Page Sidebar(300*200)</option>
                                          <option value="cube" {{($value['place']=='cube')?'selected':''}}> Cube (300*200)</option>
                                          <option value="government" {{($value['place']=='government')?'selected':''}}> Government (400*300)</option>
                                      </select>
                                    </div>

                                    <div class="mb-3 col-md-12">
                                      <label class="form-label">Add Image</label>
                                      <input type="file" name="image"  class="form-control">
                                        <img src="{{$value->getFirstMediaUrl('image','image') }}" width="30%" style="padding: 5px;width: 50px;height: 50px;">


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
                    <div class="col-md-12">
                        <strong>Advertisement / Create Adv</strong>
                     </div>
                   </div>
                  </div>
                

                 <div class="card-body">
                   <div class="example">
                     <div class="tab-content rounded-bottom">
                      <div class="tab-pane p-3 active">

                        <form action="{{route('advertisement.store')}}" method="post" id="createAdv" enctype="multipart/form-data">
                          @csrf
                        <div class="row">
                        
                          <div class="mb-3 col-md-12">
                            <label class="form-label">Title *</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title" required>
                          </div>
                          <div class="mb-3 col-md-12">
                            <label class="form-label">Link *</label>
                            <input type="text" name="link" id="link" class="form-control" placeholder="Adv Link" required>
                          </div>
                          <div class="mb-3 col-md-12">
                            <label class="form-label">Place *</label>
                            <select name="place" class="form-control" required>
                              <option value="0">select place</option>
                              <option value="top">Top Header(1200*100)</option>
                              <option value="logo_side">Logo Sidebar(700*80)</option>
                              <option value="regular_1">Regular First(1200*100)</option>
                              <option value="regular_2">Regular Second(1200*100)</option>
                              <option value="regular_3">Regular Third(1200*100)</option>
                              <option value="regular_4">Regular Forth(1200*100)</option>
                              <option value="sidebar">Home Sidebar(370*250)</option>
                              <option value="after_header">Details Page After Title(1200*80)</option>
                              <option value="before_content">Details Page Before Content(1200*80)</option>
                              <option value="details">Details Page Sidebar(300*200)</option>
                              <option value="cube"> Cube (300*200)</option>
                              <option value="government"> Government (400*300)</option>
                            </select>
                          </div>

                          <div class="mb-3 col-md-12">
                            <label class="form-label">Add Image *</label>
                            <input type="file" name="image"  class="form-control" required>
                          </div>

                         <div class="col-12">
                          <button class="btn btn-primary" type="submit">Create Adv</button>
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
        var datas = {!! json_encode($advertisement) !!};
         datas.forEach(test => {
            $("#checkbox" + test["id"]).click(function() {
                document.getElementById("status" + test["id"]).submit();
            });
        });
    });
</script>


@endpush

@endsection