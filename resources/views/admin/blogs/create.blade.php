@extends('layouts.admin.main')
 @section('title')
   Taraikhabar || Create Blogs
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
                      <strong>Blogs / Create Blogs</strong>
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

                        <form action="{{route('blogs.store')}}" method="post" id="createBlogs" enctype="multipart/form-data">@csrf
                      
                        <div class="row">

                        <div class="mb-3 col-md-6">
                          <label class="form-label">Blogs Title *</label>
                          <input type="text" name="title" id="title" class="form-control" placeholder="Type Blogt Title">
                        </div>

                        <div class="mb-3 col-md-6 d-none">
                          <label class="form-label">Blogs Slug</label>
                          <input type="text" name="slug" id="slug" class="form-control">
                        </div>

                        <div class="mb-3 col-md-6">
                          <label class="form-label">Blogs Tags *</label>
                          <input type="text" name="tags[]" id="tags" class="form-control" placeholder="Blogs Tags">
                          <small class="text-muted">This is used for search. Input those words by which cutomer can find this blogs</small>
                        </div>

                        <div class="mb-3 col-md-12">
                          <label class="form-label"> Description *</label>
                          <textarea class="form-control" name="description" id="description"></textarea>
                        </div>

                         <div class="mb-3 col-md-12 ">
                          <label class="form-label">Blogs Category *</label>
                          <select class="form-control" name="bcategory_id" id="bcategory_id" required="">
                              <option value="0">Please select a Category</option>
                              @foreach(\App\Models\BlogCategory::all() as $bcat)
                                  <option value="{{$bcat->id}}">{{$bcat->name}}</option>
                              @endforeach
                          </select>
                        </div>


                        <div class="mb-3 col-md-6">
                          <label class="form-label">Blogs Image *</label>
                           <input type="file" class="form-control" name="feature_image" required>
                        </div>

                        <div class="mb-3 col-md-6">
                          <label class="form-label">Meta Keyword</label>
                          <input type="text" name="meta_keywords[]" id="meta_keywords" class="form-control" placeholder="Meta Keyword">
                          <small class="text-muted">This is used for search. Input those words by which cutomer can find this blogs</small>
                        </div>

                        <div class="mb-3 col-md-12">
                          <label class="form-label">Meta Description</label>
                          <textarea class="form-control" name="meta_descriptions" id="meta_descriptions"></textarea>
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