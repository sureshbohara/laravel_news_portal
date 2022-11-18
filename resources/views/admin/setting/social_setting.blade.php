@extends('layouts.admin.main')
 @section('title')
   Taraikhabar || Setting - Social
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
                      <strong>Setting / Social Setting</strong>
                  </div>
                </div>
              </div>
                

               
                   <div class="example">
                     <div class="tab-content rounded-bottom">
                      <div class="tab-pane p-3 active">
                        <form action="{{ route('update.social') }}" method="post" enctype="multipart/form-data">@csrf
                        <div class="card-body">
                        <div class="row">

                                <div class="mb-3  form-group col-md-4">
                                    <label for="facebook">{{ __('Facebook') }}</label>
                                    <input type="text" class="form-control" name="facebook" placeholder="{{ __('Enter Facebook Link') }}" value="{{ $setting->facebook }}">
                                </div>

                                <div class="mb-3  form-group col-md-4">
                                    <label for="twitter">{{ __('Twitter') }}</label>
                                    <input type="text" class="form-control" name="twitter" placeholder="{{ __('EnterTwitter Link') }}" value="{{ $setting->twitter }}">
                                </div>

                                 <div class="mb-3  form-group col-md-4">
                                    <label for="youtube">{{ __('Youtube') }}</label>
                                    <input type="text" class="form-control" name="youtube" placeholder="{{ __('Enter Youtube Link') }}" value="{{ $setting->youtube }}">
                                </div>

                                <div class="mb-3  form-group col-md-4">
                                    <label for="linkdin">{{ __('Linkdin') }}</label>
                                    <input type="text" class="form-control" name="linkdin" placeholder="{{ __('Enter linkdin Username') }}" value="{{ $setting->linkdin }}">
                                </div>

                                <div class="mb-3  form-group col-md-4">
                                    <label for="instagram">{{ __('Instagram') }}</label>
                                    <input type="text" class="form-control" name="instagram" placeholder="{{ __('Enter Instagram Link') }}" value="{{ $setting->instagram }}">
                                </div>

                              

                             <div class="mb-3 form-group col-md-4">
                                <label for="tiktok">{{ __('Tiktok') }}</label>
                                <input type="text" class="form-control" name="tiktok" placeholder="{{ __('Enter Tiktok Link') }}" value="{{ $setting->tiktok }}">
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

@endsection