@extends('layouts.admin.main')
 @section('title')
   Taraikhabar || Cube Adv
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
                      <strong>Setting / Cube Adv</strong>
                  </div>
                </div>
              </div>
                

               
                   <div class="example">
                     <div class="tab-content rounded-bottom">
                      <div class="tab-pane p-3 active">
                        <form action="{{ route('cube.update') }}" method="post" enctype="multipart/form-data">@csrf
                        <div class="card-body">
                        <div class="row">

                           <div class="mb-3 form-group col-md-12">
                                <label class="switch-primary">
                                  <input type="checkbox" class="switch switch-bootstrap status radio-check" name="cube_status" value="1" {{ $setting->cube_status == 1 ? 'checked' : '' }}>
                                  <span class="switch-body"></span>
                                  <span class="switch-text">{{ __('CUBE ADV STATUS') }}</span>
                                </label>
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