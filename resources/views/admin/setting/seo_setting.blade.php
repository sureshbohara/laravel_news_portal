@extends('layouts.admin.main')
 @section('title')
   Taraikhabar || Setting - SEO
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
                      <strong>Setting / SEO Setting</strong>
                  </div>
                </div>
              </div>
                

               
                   <div class="example">
                     <div class="tab-content rounded-bottom">
                      <div class="tab-pane p-3 active">
                        <form action="{{ route('update.seo') }}" method="post" enctype="multipart/form-data">@csrf
                        <div class="card-body">
                        <div class="row">

                          <div class="mb-3  form-group col-md-12">
                              <label for="meta_title">{{ __('Meta Title') }}</label>
                              <input type="text" class="form-control" name="meta_title" value="{{ $setting->meta_title }}">
                          </div>

                          <div class="mb-3  form-group col-md-12">
                              <label for="meta_keywords">{{ __('Meta Keyword') }}</label>
                              <input type="text" class="form-control" name="meta_keywords[]" id="meta_keywords" value="{{ $setting->meta_keywords }}">
                              <small class="text-muted">This is used for search. Input those words by which cutomer can find this Website</small>
                          </div>

                           <div class="mb-3  form-group col-md-12">
                              <label for="meta_description">{{ __('Meta Description') }}</label>
                              <textarea class="form-control" name="meta_description" id="meta_descriptions">
                                {{ $setting->meta_description }}
                              </textarea>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update Setting</button>
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


          <script>
          // The DOM elements you wish to replace with Tagify
        var input = document.querySelector("#meta_keywords");
        new Tagify(input, {
            maxTags: 20,
            dropdown: {
                maxItems: 40,           // <- mixumum allowed rendered suggestions
                classname: "", // <- custom classname for this dropdown, so it could be targeted
                enabled: 0,             // <- show suggestions on focus
                closeOnSelect: false    // <- do not hide the suggestions dropdown once an item has been selected
            }
        });
        </script>

@endpush

@endsection