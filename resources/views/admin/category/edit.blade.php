@extends('layouts.admin.main')
 @section('title')
   Taraikhabar || Update Category
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
                      <strong>Category / Update Category</strong>
                  </div>

                  <div class="col-md-6">
                     <a href="{{route('category.index')}}" class="btn btn-danger text-info" style="float: right;">Category List</a>
                
                  </div>

                </div>
              </div>
                

                <div class="card-body">
                   <div class="example">
                     <div class="tab-content rounded-bottom">
                      <div class="tab-pane p-3 active">

                        <form action="{{route('category.update',$category->id)}}" method="post" id="createCategory" enctype="multipart/form-data">@csrf
                          @method('PUT')
                      
                        <div class="row">

                        <div class="mb-3 col-md-3">
                          <label class="form-label">Category Name</label>
                          <input type="text" name="name" id="name" class="form-control" value="{{$category['name']}}">
                        </div>

                         <div class="mb-3 col-md-3 d-none">
                          <label class="form-label">Category Name</label>
                          <input type="text" name="slug" id="slug" class="form-control" value="{{$category['slug']}}">
                        </div>

                        <div class="mb-3 col-md-3">
                          <label class="form-label">Parent Category</label>
                          <select class="form-control" name="parent_id">
                                <option value="0">No Parent</option>
                                @foreach ($categories as $acategory)
                                    <option value="{{ $acategory->id }}" @if($acategory->id == $category->parent_id) selected @endif>{{ $acategory['name'] }}</option>
                                    @foreach ($acategory->childrenCategories as $childCategory)
                                        @include('categories.cat_child_category', ['child_category' => $childCategory])
                                    @endforeach
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3 col-md-3">
                          <label class="form-label">Ordering Number</label>
                          <input type="number" name="order_level" id="order_level" class="form-control" value="{{$category['order_level']}}">
                          <small>Higher number has high priority</small>
                        </div>



                        <div class="mb-3 col-md-3">
                          <label class="form-label">Category Icon</label>
                           <input type="file" class="form-control" name="icon">
                           <small>Size (100x100)</small>
                             @if(!empty($category['icon']))
                             <img src="{{asset('images/category/'.$category['icon']) }}">
                            @endif

                        </div>

                        <div class="mb-3 col-md-12">
                          <label class="form-label">Meta Keyword</label>
                          <input type="text" name="meta_keywords" class="form-control" value="{{ $category->meta_keywords }}" >
                        </div>

                        <div class="mb-3 col-md-12">
                          <label class="form-label">Meta Description</label>
                          <textarea class="form-control" name="meta_descriptions" id="meta_descriptions">
                            {{ $category->meta_descriptions }}
                          </textarea>
                        </div>


                         <div class="col-12">
                          <button class="btn btn-primary" type="submit">Update Category</button>
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