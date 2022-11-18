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
                        <form action="{{ route('update.team') }}" method="post" enctype="multipart/form-data">@csrf
                        <div class="card-body">
                        <div class="row">

                                <div class="mb-3  form-group col-md-4">
                                    <label for="chief_edtor">{{ __('Chief Edtor') }}</label>
                                    <input type="text" class="form-control" name="chief_edtor" placeholder="{{ __('chief edtor name') }}" value="{{ $setting->chief_edtor }}">
                                </div>

                                <div class="mb-3  form-group col-md-4">
                                    <label for="chairman">{{ __('Chairman') }}</label>
                                    <input type="text" class="form-control" name="chairman" placeholder="{{ __('Chairman') }}" value="{{ $setting->chairman }}">
                                </div>

                                 <div class="mb-3  form-group col-md-4">
                                    <label for="editor">{{ __('Editor') }}</label>
                                    <input type="text" class="form-control" name="editor" placeholder="{{ __('Editor') }}" value="{{ $setting->editor }}">
                                </div>

                                <div class="mb-3  form-group col-md-4">
                                    <label for="advisor_editor">{{ __('Advisor Editor') }}</label>
                                    <input type="text" class="form-control" name="advisor_editor" placeholder="{{ __('Advisor Editor') }}" value="{{ $setting->advisor_editor }}">
                                </div>

                                <div class="mb-3  form-group col-md-4">
                                    <label for="assistant_editor">{{ __('Assistant Editor') }}</label>
                                    <input type="text" class="form-control" name="assistant_editor" placeholder="{{ __('Assistant Editor') }}" value="{{ $setting->assistant_editor }}">
                                </div>

                              

                             <div class="mb-3 form-group col-md-4">
                                <label for="sub_editor">{{ __('Sub Editor') }}</label>
                                <input type="text" class="form-control" name="sub_editor" placeholder="{{ __('Sub Editor') }}" value="{{ $setting->sub_editor }}">
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