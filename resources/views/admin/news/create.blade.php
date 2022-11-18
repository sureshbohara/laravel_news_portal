@extends('layouts.admin.main')
 @section('title')
   Taraikhabar || News Create
 @endsection
@section('content')

 <style>
   .bar{
    background-color: #00ff00;
   }
   .precent{
    position: absolute;
    color: #000000;
   }
 </style>
   <div class="body flex-grow-1 py-4">
        <div class="container-lg">

          <div class="row">

            <div class="col-12">
              <div class="card mb-4">
                <div class="card-header">
                <div class="row">
                  <div class="col-md-6">
                      <strong>News / Creae News</strong>
                  </div>

                  <div class="col-md-6">
                     <a href="{{route('news.index')}}" class="btn btn-danger text-info" style="float: right;">News List</a>
                
                  </div>

                </div>
              </div>
                

                <div class="card-body">
                   <div class="example">
                     <div class="tab-content rounded-bottom">
                      <div class="tab-pane p-3 active">

                        <form action="{{route('news.store')}}" method="post" id="createNews" enctype="multipart/form-data">@csrf
                      
                        <div class="row">
                          <!-- main content -->
                          <div class="col-md-8">
                            <div class="row">
                            <div class="mb-3 col-md-12">
                             <label class="form-label">News Title *</label>
                              <input type="text" name="title" id="title" class="form-control" placeholder="Type News Title">
                            </div>

                        <div class="mb-3 col-md-12">
                          <label class="form-label">Short Description </label>
                          <textarea class="form-control" name="short_description"></textarea>
  
                        </div>
                        <div class="mb-3 col-md-12">
                          <label class="form-label">Description *</label>
                          <textarea class="form-control" name="description" id="description"></textarea>
                        </div>


                        <div class="mb-3 col-md-12">
                          <label class="form-label">News Tags *</label> <br>
                            <select class="form-control" name="tags[]" multiple multiselect-search="true" multiselect-select-all="true" multiselect-max-items="20">
                              @foreach(\App\Models\Tags::where('status',1)->get() as $tag)
                              <option value="{{$tag['id']}}">{{$tag['title']}}</option>
                              @endforeach
                            </select>
                        </div>

                        
                         <div class="mb-3 col-md-12">
                          <label class="form-label">Meta Title</label>
                          <input type="text" name="meta_title" class="form-control" placeholder="Meta Title">
                        </div>
                        <div class="mb-3 col-md-12">
                          <label class="form-label">Meta Keyword</label>
                          <input type="text" name="meta_keywords[]" id="meta_keywords" class="form-control" placeholder="Meta Keyword">
                          <small class="text-muted">This is used for search. Input those words by which cutomer can find this news</small>
                        </div>
                        <div class="mb-3 col-md-12">
                          <label class="form-label">Meta Description</label>
                          <textarea class="form-control" name="meta_descriptions"  id="meta_descriptions"></textarea>
                        </div>

                            </div>
                          </div>
                          <!-- end -->
                           <!-- sidebar start -->
                          <div class="col-md-4" style="background: #ccc;">

                            <div class="mb-3 col-md-12">
                             <label class="form-label">Thumbnail Image *</label>
                             <input type="file" class="form-control" name="feature_image" id="feature_image">
                           </div>


                            <div class="mb-3 col-md-12">
                             <label class="form-label">Select Category *</label>
                           </div>
                           <div class="mb-3 col-md-12" id="category" style="width: 100%;height: 400px;overflow: scroll;">
                            <div class="col-md-12">
                                    @foreach ($categories as $category)
                                    <hr>
                                    <input type="checkbox" name="category_id[]" value="{{ $category->id }}">
                                     {{ $category['name'] }} <br>
                                    @foreach ($category->childrenCategories as $childCategory)
                                      @include('categories.child_category', ['child_category' => $childCategory])
                                      <br>
                                    @endforeach
                                    @endforeach
                              </div>
                            </div>

                          <div class="mb-3 col-md-12">
                             <label class="form-label">News Type</label>
                             <select name="news_type"class="form-control">
                                <option value="banner">Banner</option>
                                <option value="राजनीति">राजनीति</option>
                                <option value="मुख्य-समाचार">मुख्य समाचार</option>
                                <option value="अर्थतन्त्र">अर्थतन्त्र</option>
                                <option value="खेलकुद">खेलकुद</option>
                                <option value="मनोरञ्जन">मनोरञ्जन</option>
                                <option value="जीवनशैली">जीवनशैली</option>
                                <option value="अन्तर्वार्ता">अन्तर्वार्ता</option>
                                <option value="पर्यटन">पर्यटन</option>
                                <option value="विचार">विचार</option>
                                <option value="तराई-खबर-स्पेसल">तराई-खबर स्पेसल</option>
                             </select>
                           </div>

                           <div class="mb-3 col-md-12">
                              <label class="form-label">Video Id</label>
                              <input type="text" name="video_id" id="video_id" class="form-control" placeholder="Video Id">
                            </div>

  
                            <div class="mb-3 col-md-12">
                              <label class="form-label">Banner News Tags</label>
                              <input type="text" name="banner_tags" id="banner_tags" class="form-control" placeholder="गठबन्धन,अर्थतन्त्र,चुनावी चर्चा,आजका तस्वीरहरु">
                            </div>

                             <div class="mb-3 col-md-12">
                              <label class="form-label">Author Name</label>
                              <input type="text" name="author_name" id="author_name" class="form-control" placeholder="">
                            </div>

                            <div class="form-group col-md-12 py-2">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                            </div>
                        </div>

                           <div class="mb-3 col-lg-12 btn-group mr-2">
                             <button class="btn btn-danger btn-lg" name="button" type="submit" value="draft">Save Draft</button>
                             <button class="btn btn-warning btn-lg" name="button" type="submit" value="unpublish">Save Unpublish</button>
                             <button class="btn btn-success btn-lg" name="button" type="submit" value="publish">Save Publish</button>
                          </div>

                          </div>
                          <!-- sidebar end -->

                         

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
        var input = document.querySelector("#meta_keywords");
        new Tagify(input, {
            maxTags: 10,
            dropdown: {
                maxItems: 20,         
                classname: "", 
                enabled: 0,         
                closeOnSelect: false
            }
        });
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    <script>
        $(function () {
            $(document).ready(function () {
                $('#createNews').ajaxForm({
                    beforeSend: function () {
                        var percentage = '0';
                    },
                    uploadProgress: function (event, position, total, percentComplete) {
                        var percentage = percentComplete;
                        $('.progress .progress-bar').css("width", percentage+'%', function() {
                          return $(this).attr("aria-valuenow", percentage) + "%";
                        })
                    },
                    complete: function(){
                        alert('Post has been uploaded Successfully!')
                        window.location.href="{{route('news.index')}}";
                    }
                });
            });
        });
    </script>
@endpush

@endsection