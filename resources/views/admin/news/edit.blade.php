<?php 
  use App\Models\Tags;
  $tags = Tags::where('status',1)->get();
 ?>
@extends('layouts.admin.main')
 @section('title')
   Taraikhabar ||Update News
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
                      <strong>News / Update News</strong>
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

                        <form action="{{route('news.update',$news['id'])}}" method="post" id="createNews" enctype="multipart/form-data">@csrf
                          @method('PUT')
                      
                        <div class="row">
                          <!-- main content -->
                          <div class="col-md-8">
                            <div class="row">
                              <div class="mb-3 col-md-12">
                          <label class="form-label">News Title *</label>
                          <input type="text" name="title" id="title" class="form-control" value="{{$news['title']}}">
                        </div>
                        <div class="mb-3 col-md-12">
                          <label class="form-label">Short Description</label>

                          <textarea class="form-control" name="short_description" id="short_description">
                            {{$news['short_description']}}
                          </textarea>
                        </div>
                        <div class="mb-3 col-md-12">
                          <label class="form-label">Description *</label>
                            <textarea class="form-control" name="description" id="description">
                               {{$news['description']}}
                            </textarea>
                        </div>



                        <div class="mb-3 col-md-12">
                          <label class="form-label">News Tags *</label> <br>
                            <select class="form-control" name="tags[]" multiple multiselect-search="true" multiselect-select-all="true" multiselect-max-items="20">
                              @foreach($tags as $tag)
                              <option value="{{$tag->id}}" @selected(old('tags',$news->id) == $tag->id)>{{$tag['title']}}</option>
                              @endforeach
                            </select>
                        </div>

                         
                         <div class="mb-3 col-md-12">
                          <label class="form-label">Meta Title</label>
                          <input type="text" name="meta_title" class="form-control" value="{{$news['meta_title']}}">
                        </div>
                        <div class="mb-3 col-md-12">
                          <label class="form-label">Meta Keyword</label>
                          <input type="text" name="meta_keywords[]" id="meta_keywords" class="form-control" value="{{ $news['meta_keywords'] }}">
                          <small class="text-muted">This is used for search. Input those words by which cutomer can find this news</small>
                        </div>
                        <div class="mb-3 col-md-12">
                          <label class="form-label">Meta Description</label>
                          <input type="text" name="meta_descriptions" id="myeditorinstance" class="form-control" value="{{$news['meta_description']}}">
                        </div>

                            </div>
                          </div>
                          <!-- end -->
                           <!-- sidebar start -->
                          <div class="col-md-4" style="background: #ccc;">

                            <div class="mb-3 col-md-12">
                             <label class="form-label">Thumbnail Image *</label>
                             <input type="file" class="form-control" name="feature_image">
                              <img src="{{asset('images/news/small/'.$news['feature_image'])}}" width="100%" style="padding: 5px;">
                           </div>



                           <div class="mb-3 col-md-12" id="category" style="width: 100%;height: 400px;overflow: scroll;">
                            <label class="form-label">News Category *</label>
                                    @foreach ($categories as $category)
                                    <hr>
                                    <input type="checkbox" name="category_id[]" value="{{ $category->id }}" @if($category['id']==$news['category_id']) checked @endif>{{ $category['name'] }} <br>
                                    @foreach ($category->childrenCategories as $childCategory)
                                    @include('categories.child_category', ['child_category' => $childCategory])
                                    <br>
                                    @endforeach
                                    @endforeach
                          </div>

                          <div class="mb-3 col-md-12">
                             <label class="form-label">News Type</label>
                              <select name="news_type"class="form-control">
                                <option value="banner" {{($news['news_type']=='banner')?'selected':''}}>Banner</option>
                                <option value="राजनीति" {{($news['news_type']=='राजनीति')?'selected':''}}>राजनीति</option>
                                <option value="मुख्य-समाच" {{($news['news_type']=='मुख्य समाच')?'selected':''}}>मुख्य समाच</option>
                                <option value="अर्थतन्त्र" {{($news['news_type']=='अर्थतन्त्र')?'selected':''}}>अर्थतन्त्र</option>
                                <option value="खेलकुद" {{($news['news_type']=='खेलकुद')?'selected':''}}>खेलकुद</option>
                                <option value="मनोरञ्जन" {{($news['news_type']=='मनोरञ्जन')?'selected':''}}>मनोरञ्जन</option>
                                <option value="जीवनशैली" {{($news['news_type']=='जीवनशैली')?'selected':''}}>जीवनशैली</option>
                                <option value="अन्तर्वार्ता" {{($news['news_type']=='अन्तर्वार्ता')?'selected':''}}>Tarai अन्तर्वार्ता</option>

                                <option value="पर्यटन" {{($news['news_type']=='पर्यटन')?'selected':''}}>पर्यटन</option>
                                <option value="विचार" {{($news['news_type']=='विचार')?'selected':''}}> विचार</option>
                                <option value="तराई-खबर-स्पेसल" {{($news['news_type']=='तराई-खबर-स्पेसल')?'selected':''}}> तराई-खबर-स्पेसल</option>
                             </select>


                           </div>

                            <div class="mb-3 col-md-12">
                              <label class="form-label">Video Id</label>
                              <input type="text" name="video_id" id="video_id" class="form-control" value="{{$news['video_id']}}">
                            </div>


                            <div class="mb-3 col-md-12">
                              <label class="form-label">Banner News Tags</label>
                              <input type="text" name="banner_tags" id="banner_tags" class="form-control" value="{{$news['banner_tags']}}">
                            </div>

                             <div class="mb-3 col-md-12">
                              <label class="form-label">Author Name</label>
                              <input type="text" name="author_name" id="author_name" class="form-control" value="{{$news['author_name']}}">
                            </div>

                           <div class="mb-3 col-lg-12 btn-group mr-2">
                             <button class="btn btn-success btn-lg" name="button" type="submit" value="publish">Update & Publish</button>
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
          // The DOM elements you wish to replace with Tagify

        var input = document.querySelector("#input id name");
        new Tagify(input, {
            whitelist: ["राजनीति","नेकपा-एमाले","प्रचण्ड"],
            maxTags: 10,
            dropdown: {
                maxItems: 20,     
                classname: "",
                enabled: 0,            
                closeOnSelect: false 
            }
        });
        </script>

        <script>
          // The DOM elements you wish to replace with Tagify
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




@endpush

@endsection