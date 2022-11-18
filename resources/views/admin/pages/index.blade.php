@extends('layouts.admin.main')
 @section('title')
   Taraikhabar || CMS Pages
 @endsection
@section('content')


   <div class="body flex-grow-1 py-4">
        <div class="container-lg">

          <div class="row">

            <div class="col-4">
              <div class="card mb-4">

                <div class="card-header">
                <div class="row">
                  <div class="col-md-6">
                      <strong>Page / List</strong>
                  </div>
                  </div>
                 </div>
                

                <div class="card-body">

                   <table class="table table-bordered">
                      <thead class="table-dark">
                        <tr>
                          <th>#</th>
                          <th>Page Title</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach($pages as $value)
                        <tr>
                          <td>{{$value['id']}}</td>
                          <td>{{$value['title']}}</td>

                          <td>
                             <form id="status{{ $value['id'] }}"
                              action="{{ route('pages.status') }}" method="post">
                              @csrf
                              <input type="hidden" value="{{ $value['id'] }}" name="pages_id">
                              <div id="checkbox{{ $value['id'] }}">
                                <input type="checkbox" {{ $value['status'] == 1 ? 'checked' : '' }} data-toggle="toggle" data-width="30">
                              </div>
                           </form>
                          </td>

                          <td class="d-flex">
                            @isset(auth()->guard('admin')->user()->role->permission['permission']['pages']['edit'])
                             <a data-coreui-toggle="modal" type="button" data-coreui-target="#PagesUpdate{{$value->id}}" title="Change This" class="btn btn-success btn-xs">
                              <i class="fa fa-edit"></i>
                            </a>
                             @endisset
                             @isset(auth()->guard('admin')->user()->role->permission['permission']['pages']['delete'])
                              <form action="{{ route('pages.destroy', $value['id']) }}" method="post">@csrf
                              @method('DELETE')
                              <input name="_method" type="hidden" value="DELETE">
                              <button  type="submit" title="delete data" class="btn btn-danger btn-xs show_confirm">
                                  <i class="fa fa-trash"></i>
                              </button>
                             </form> 
                              @endisset 
                          
                          </td>

                        </tr>


                         <div class="modal fade" id="PagesUpdate{{$value->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header bg-dark">
                                <h5 class="modal-title text-light" id="exampleModalLabel">Update Data</h5>
                                <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form action="{{route('pages.update',$value->id)}}" method="post">@csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="mb-3 col-md-12">
                                      <label class="form-label">Page Title</label>
                                      <input type="text" name="title" id="title1" class="form-control" value="{{$value['title']}}">
                                    </div>

                                     <div class="mb-3 col-md-12 d-none">
                                      <label class="form-label">Slug</label>
                                      <input type="text" name="slug" id="slug1" class="form-control" value="{{$value['slug']}}">
                                    </div>

                                     <div class="mb-3 col-md-12">
                                      <label class="form-label">Short Description</label>
                                      <textarea class="form-control" name="short_description">
                                        {{$value['short_description']}}
                                      </textarea>
                                    </div>

                                     <div class="mb-3 col-md-12">
                                      <label class="form-label"> Description</label>
                                      <textarea class="form-control" name="description">
                                        {{$value['description']}}
                                      </textarea>
                                    </div>

                                    <div class="mb-3 col-md-12">
                                      <label class="form-label">Meta Tags</label>
                                      <input type="text" name="meta_keyword" id="meta_keyword" class="form-control" value="{{$value['meta_keyword']}}">
                                    </div>

                                    <div class="mb-3 col-md-12">
                                      <label class="form-label">Meta Description</label>
                                      <textarea class="form-control" name="meta_description">
                                        {{$value['meta_description']}}
                                      </textarea>
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

               <div class="col-8">
                <div class="card mb-4">
                  <div class="card-header">
                   <div class="row">
                    <div class="col-md-6">
                        <strong>Pages / Create Pages</strong>
                     </div>
                   </div>
                  </div>
                

                 <div class="card-body">
                   <div class="example">
                     <div class="tab-content rounded-bottom">
                      <div class="tab-pane p-3 active">

                        <form action="{{route('pages.store')}}" method="post" id="createPages" enctype="multipart/form-data">
                          @csrf
                      
                        <div class="row">

                        <div class="mb-3 col-md-12">
                          <label class="form-label">Page Title *</label>
                          <input type="text" name="title" id="title" class="form-control" placeholder="About Us,Introduction...">
                          <font style="color:red">{{($errors->has('title'))?($errors->first('title')):''}}</font>
                        </div>

                         <div class="mb-3 col-md-12 d-none">
                          <label class="form-label">Slug</label>
                          <input type="text" name="slug" id="slug" class="form-control">
                        </div>

                         <div class="mb-3 col-md-12">
                          <label class="form-label">Short Description *</label>
                          <textarea class="form-control" name="short_description" id="short_description" required></textarea>
                          <font style="color:red">{{($errors->has('short_description'))?($errors->first('short_description')):''}}</font>
                        </div>

                         <div class="mb-3 col-md-12">
                          <label class="form-label"> Description *</label>
                          <textarea class="form-control" name="description" id="description" required></textarea>
                          <font style="color:red">{{($errors->has('description'))?($errors->first('description')):''}}</font>
                        </div>

                        <div class="mb-3 col-md-12">
                          <label class="form-label">Meta Tags</label>
                          <input type="text" name="meta_keyword[]" id="meta_keyword" class="form-control">
                          <small class="text-muted">This is used for search. Input those words by which cutomer can find this page</small>
                        </div>

                        <div class="mb-3 col-md-12">
                          <label class="form-label">Meta Description</label>
                          <textarea class="form-control" name="meta_description" id="meta_descriptions"></textarea>
                        </div>

                         <div class="col-12">
                          <button class="btn btn-primary" type="submit">Create Page</button>
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
        var datas = {!! json_encode($pages) !!};
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

  <script>
  $(document).ready(function(){
      $('#title1').keyup(function(e){
          var str = $('#title1').val();
          str = str.replace(/\W+(?!$)/g, '-').toLowerCase();
          $('#slug1').val(str);
          $('#slug1').attr('placeholder', str);
      });
  });
  </script>



        <script>
          // The DOM elements you wish to replace with Tagify
        var input = document.querySelector("#meta_keyword");

        new Tagify(input, {
            maxTags: 10,
            dropdown: {
                maxItems: 20,           // <- mixumum allowed rendered suggestions
                classname: "", // <- custom classname for this dropdown, so it could be targeted
                enabled: 0,             // <- show suggestions on focus
                closeOnSelect: false    // <- do not hide the suggestions dropdown once an item has been selected
            }
        });
        </script>

@endpush

@endsection