@extends('layouts.admin.main')
 @section('title')
   Taraikhabar || Update Blogs
 @endsection
@section('content')


   <div class="body flex-grow-1 py-4">
        <div class="container-lg">

          <div class="row">

            <div class="col-12">
              <div class="card mb-4">
                <div class="card-header">
                <div class="row">
                  <div class="col-md-6">
                      <strong>Blogs / Update Blogs</strong>
                  </div>

                  <div class="col-md-6">
                     <a href="{{route('blogs.index')}}" class="btn btn-danger text-info" style="float: right;">Blogs List</a>
                
                  </div>

                </div>
              </div>
                

                <div class="card-body">
                   <div class="example">
                     <div class="tab-content rounded-bottom">
                      <div class="tab-pane p-3 active">

                        <form action="{{route('blogs.update',$blogs['id'])}}" method="post" id="createBlogs" enctype="multipart/form-data">@csrf
                          @method('PUT')
                      
                        <div class="row">

                        <div class="mb-3 col-md-6">
                          <label class="form-label">Blogs Title *</label>
                          <input type="text" name="title" id="title" class="form-control" value="{{$blogs['title']}}">
                        </div>

                        <div class="mb-3 col-md-6 d-none">
                          <label class="form-label">Blogs Slug</label>
                          <input type="text" name="slug" id="slug" class="form-control" value="{{$blogs['slug']}}">
                        </div>

                        <div class="mb-3 col-md-6">
                          <label class="form-label">Blogs Tags *</label>
                          <input type="text" name="tags[]" id="tags" class="form-control" value="{{$blogs['tags']}}">
                          <small class="text-muted">This is used for search. Input those words by which cutomer can find this blogs</small>
                        </div>

                        <div class="mb-3 col-md-12">
                          <label class="form-label"> Description *</label>
                          <textarea class="form-control" name="description" id="description">
                            {{$blogs['description']}}
                          </textarea>
                        </div>

                         <div class="mb-3 col-md-12 ">
                          <label class="form-label">Blogs Category *</label>
                          <select class="form-control" name="bcategory_id" id="bcategory_id" required="">
                              <option value="0">Please select a Category</option>
                              @foreach(\App\Models\BlogCategory::all() as $bcat)
                                  <option value="{{$bcat->id}}"  @if($bcat->id == $blogs->bcategory_id) selected @endif>{{$bcat->name}}</option>
                              @endforeach
                          </select>
                        </div>


                        <div class="mb-3 col-md-6">
                          <label class="form-label">Blogs Image *</label>
                           <input type="file" class="form-control" name="feature_image" id="feature_image">

                            @if(!empty($blogs['feature_image']))
                              <img src="{{URL::to('images/blogs/',$blogs['feature_image'])}}" width="30%" style="padding: 5px;">
                             @endif

                        </div>

                        <div class="mb-3 col-md-6">
                          <label class="form-label">Meta Keyword</label>
                          <input type="text" name="meta_keywords[]" id="meta_keywords" class="form-control" value="{{$blogs['meta_keywords']}}">
                          <small class="text-muted">This is used for search. Input those words by which cutomer can find this blogs</small>
                        </div>

                        <div class="mb-3 col-md-12">
                          <label class="form-label">Meta Description</label>
                          <textarea class="form-control" name="meta_descriptions" id="meta_descriptions">
                            {{$blogs['meta_descriptions']}}
                          </textarea>
                        </div>


                         <div class="col-12">
                          <button class="btn btn-primary" type="submit">Create Blogs</button>
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
          // The DOM elements you wish to replace with Tagify
        var input = document.querySelector("#tags");
        new Tagify(input, {
            whitelist: ["समाज","विचार/ब्लग","साहित्य", "प्रवास", "ब्लोअप", "गसिप","सूचना-प्रविधि"],
            maxTags: 10,
            dropdown: {
                maxItems: 20,           // <- mixumum allowed rendered suggestions
                classname: "", // <- custom classname for this dropdown, so it could be targeted
                enabled: 0,             // <- show suggestions on focus
                closeOnSelect: false    // <- do not hide the suggestions dropdown once an item has been selected
            }
        });
        </script>

          <script>
          // The DOM elements you wish to replace with Tagify
        var input = document.querySelector("#meta_keywords");
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