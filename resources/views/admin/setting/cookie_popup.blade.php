@extends('layouts.admin.main')
 @section('title')
   Taraikhabar || Popup - Cookie
 @endsection
@section('content')


<div class="body flex-grow-1 py-4">
        <div class="container-lg">

          <div class="row">
           <div class="col-md-6">
              <div class="col-12">
              <div class="card mb-4">
                <div class="card-header">
                <div class="row">
                  <div class="col-md-6">
                      <strong>Setting / Cookie Setting</strong>
                  </div>
                </div>
              </div>
                

               
                   <div class="example">
                     <div class="tab-content rounded-bottom">
                      <div class="tab-pane p-3 active">
                        <form action="{{ route('cookie.update') }}" method="post" enctype="multipart/form-data">@csrf
                        <div class="card-body">
                        <div class="row">

                           <div class="mb-3 form-group col-md-12">
                                <label class="switch-primary">
                                  <input type="checkbox" class="switch switch-bootstrap status radio-check" name="cookie_status" value="1" {{ $setting->cookie_status == 1 ? 'checked' : '' }}>
                                  <span class="switch-body"></span>
                                  <span class="switch-text">{{ __('COOKIE STATUS') }}</span>
                                </label>
                            </div>
              
                            <div class="radio-show {{ $setting['cookie_status'] == 0 ? 'd-none' : '' }}">
                              <div class="row">

                                <div class="mb-3 form-group col-md-12">
                                    <label for="cookie_consent_message">{{ __('Cookie Message') }}</label>
                                     <textarea class="form-control" name="cookie_consent_message">
                                      {{ $setting->cookie_consent_message }}
                                    </textarea>
                                </div>

                                <div class="mb-3 form-group col-md-12">
                                    <label for="cookie_consent_btn">{{ __('Cookie Button Text') }}</label>
                                    <input type="text" class="form-control" name="cookie_consent_btn" value="{{ $setting->cookie_consent_btn }}">
                                </div>


                              </div>
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
            <div class="col-md-6">
              <div class="col-12">
              <div class="card mb-4">
                <div class="card-header">
                <div class="row">
                  <div class="col-md-6">
                      <strong>Setting / Popup Setting</strong>
                  </div>
                </div>
              </div>
                

               
                   <div class="example">
                     <div class="tab-content rounded-bottom">
                      <div class="tab-pane p-3 active">
                        <form action="{{ route('popup.update') }}" method="post" enctype="multipart/form-data">@csrf
                        <div class="card-body">
                        <div class="row">

                           <div class="mb-3 form-group col-md-12">
                                <label class="switch-primary">
                                  <input type="checkbox" class="switch switch-bootstrap status radio-check" name="popup_status" value="1" {{ $setting->popup_status == 1 ? 'checked' : '' }}>
                                  <span class="switch-body"></span>
                                  <span class="switch-text">{{ __('POPUP STATUS') }}</span>
                                </label>
                            </div>
              
                            <div class="radio-show {{ $setting['popup_status'] == 0 ? 'd-none' : '' }}">
                              <div class="row">

                                <div class="mb-3 form-group col-md-12">
                                    <label for="popup_content_message">{{ __('Popup Message') }}</label>
                                     <textarea class="form-control" name="popup_content_message" id="meta_descriptions">
                                      {{ $setting->popup_content_message }}
                                    </textarea>
                                </div>

                                <div class="mb-3 form-group col-md-12">
                                    <label for="popup_image">{{ __('Popup Image') }}</label>
                                    <input type="file" class="form-control" name="popup_image">

                                     @if(!empty($setting['popup_image']))
                                      <img src="{{asset('images/setting/'.$setting['popup_image']) }}" width="100%">
                                     @endif

                                </div>


                              </div>
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
  </div>

@endsection