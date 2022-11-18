@extends('layouts.admin.main')
 @section('title')
   Taraikhabar || Setting - Address
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
                      <strong>Setting / Address Setting</strong>
                  </div>
                </div>
              </div>
                

               
                   <div class="example">
                     <div class="tab-content rounded-bottom">
                      <div class="tab-pane p-3 active">
                        <form action="{{ route('update.address') }}" method="post" enctype="multipart/form-data">@csrf
                        <div class="card-body">
                        <div class="row">

                                <div class="mb-3  form-group col-md-4">
                                    <label for="contact_number1">{{ __('Contact Number First') }}</label>
                                    <input type="text" class="form-control" name="contact_number1" value="{{ $setting->contact_number1 }}">
                                </div>

                                <div class="mb-3  form-group col-md-4">
                                    <label for="contact_number2">{{ __('Contact Number Second') }}</label>
                                    <input type="text" class="form-control" name="contact_number2" value="{{ $setting->contact_number2 }}">
                                </div>

                                 <div class="mb-3  form-group col-md-4">
                                    <label for="address">{{ __('Address') }}</label>
                                    <input type="text" class="form-control" name="address" value="{{ $setting->address }}">
                                </div>

                                <div class="mb-3  form-group col-md-4">
                                    <label for="email_1">{{ __('Email First') }}</label>
                                    <input type="text" class="form-control" name="email_1" value="{{ $setting->email_1 }}">
                                </div>

                                <div class="mb-3  form-group col-md-4">
                                    <label for="email_2">{{ __('Email Second') }}</label>
                                    <input type="text" class="form-control" name="email_2" value="{{ $setting->email_2 }}">
                                </div>

                               <div class="mb-3 form-group col-md-4">
                                  <label for="pan_vat">{{ __('Pan/Vat') }}</label>
                                  <input type="text" class="form-control" name="pan_vat" value="{{ $setting->pan_vat }}">
                              </div>
                              <div class="mb-3 form-group col-md-4">
                                  <label for="reg_no">{{ __('Reg No.') }}</label>
                                  <input type="text" class="form-control" name="reg_no" value="{{ $setting->reg_no }}">
                              </div>
                              <div class="mb-3 form-group col-md-4">
                                  <label for="copy_right">{{ __('Copy Right') }}</label>
                                  <input type="text" class="form-control" name="copy_right" value="{{ $setting->copy_right }}">
                              </div>
                              <div class="mb-3 form-group col-md-4">
                                  <label for="copy_right_link">{{ __('Copy Right Link') }}</label>
                                  <input type="text" class="form-control" name="copy_right_link" value="{{ $setting->copy_right_link }}">
                              </div>
                              
                               <div class="mb-3 form-group col-md-12">
                                  <label for="footer_text">{{ __('Footer Text') }}</label>
                                  <textarea name="footer_text" class="form-control">{{ $setting->footer_text }}</textarea>
                              </div>
                              
                               <div class="mb-3 form-group col-md-12">
                                  <label for="facebook_comment">{{ __('Post Comment Script') }}</label>
                                  <textarea name="facebook_comment" class="form-control">{{ $setting->facebook_comment }}</textarea>
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