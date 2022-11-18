@extends('layouts.admin.main')
 @section('title')
   Taraikhabar || Setting - SMTP
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
                      <strong>Setting / SMTP Setting</strong>
                  </div>
                </div>
              </div>
                

               
                   <div class="example">
                     <div class="tab-content rounded-bottom">
                      <div class="tab-pane p-3 active">
                        <form action="{{ route('update.smtp') }}" method="post" enctype="multipart/form-data">@csrf
                        <div class="card-body">
                        <div class="row">

                           <div class="form-group col-md-12">
                                <label class="switch-primary">
                                  <input type="checkbox" class="switch switch-bootstrap status radio-check" name="smtp_status" value="1" {{ $setting->smtp_status == 1 ? 'checked' : '' }}>
                                  <span class="switch-body"></span>
                                  <span class="switch-text">{{ __('SMTP Service') }}</span>
                                </label>
                            </div>
              
              
                            <div class="radio-show {{ $setting['smtp_status'] == 0 ? 'd-none' : '' }}">
                              <div class="row">

                                <div class="form-group col-md-4">
                                    <label for="email_host">{{ __('SMTP Host') }}</label>
                                    <input type="text" class="form-control" name="email_host" placeholder="{{ __('Enter SMTP Host') }}" value="{{ $setting->email_host }}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="email_port">{{ __('SMTP Port') }}</label>
                                    <input type="text" class="form-control" name="email_port" placeholder="{{ __('Enter SMTP Port') }}" value="{{ $setting->email_port }}">
                                </div>

                                 <div class="form-group col-md-4">
                                    <label for="email_encryption">{{ __('SMTP Encryption') }}</label>
                                    <input type="text" class="form-control" name="email_encryption" placeholder="{{ __('Enter SMTP Encryption') }}" value="{{ $setting->email_encryption }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="email_user">{{ __('SMTP Username') }}</label>
                                    <input type="text" class="form-control" name="email_user" placeholder="{{ __('Enter SMTP Username') }}" value="{{ $setting->email_user }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="email_pass">{{ __('SMTP Password') }}</label>
                                    <input type="text" class="form-control" name="email_pass" placeholder="{{ __('Enter SMTP Password') }}" value="{{ $setting->email_pass }}">
                                </div>

                              </div>
                            </div>

                             <div class="form-group col-md-4">
                                <label for="email_from">{{ __('Email From') }}</label>
                                <input type="text" class="form-control" name="email_from" placeholder="{{ __('Enter Email From') }}" value="{{ $setting->email_from }}">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="email_from_name">{{ __('Email From Name') }}</label>
                                <input type="text" class="form-control" name="email_from_name" placeholder="{{ __('Enter Email From Name') }}" value="{{ $setting->email_from_name }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="contact_email">{{ __('Contact Email') }}</label>
                                <input type="text" class="form-control" name="contact_email" placeholder="{{ __('Enter Contact Email') }}" value="{{ $setting->contact_email }}">
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