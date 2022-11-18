@extends('layouts.admin.main')
 @section('title')
   Taraikhabar || Setting - General
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
                      <strong>Setting / General Setting</strong>
                  </div>
                </div>
              </div>
                

                <div class="card-body">
                   <div class="example">
                     <div class="tab-content rounded-bottom">
                      <div class="tab-pane p-3 active">

                        <form action="{{route('general.update')}}" method="post" enctype="multipart/form-data">@csrf
                        
                      
                        <div class="row">

                        <div class="mb-3 col-md-6">
                          <label class="form-label">Stsyem Name</label>
                          <input type="text" name="system_name" class="form-control" value="{{$setting['system_name']}}">
                        </div>

                        <div class="mb-3 col-md-6">
                          <label class="form-label">Time-Zone</label>
                          <input type="text" name="system_timezone" class="form-control" value="{{$setting['system_timezone']}}">
                        </div>


                        <div class="mb-3 col-md-3">
                          <label class="form-label">Logo</label>
                           <input type="file" class="form-control" name="logo">
                           <small>Size (100x100)</small>
                            
                              <img src="{{$setting->getFirstMediaUrl('logo','logo') }}" style="padding: 5px;" width="100px" height="100px">
                             
                        </div>

                        <div class="mb-3 col-md-3">
                          <label class="form-label">Fav Icon</label>
                           <input type="file" class="form-control" name="favicon">
                           <small>Size (32x32)</small>
                           
                              <img src="{{$setting->getFirstMediaUrl('fav','fav') }}" style="padding: 5px;" width="100px" height="100px">
                             
                        </div>

                        <div class="mb-3 col-md-3">
                          <label class="form-label">Loader</label>
                           <input type="file" class="form-control" name="loader">
                           <small>Size (50x50)</small>
                          
                              <img src="{{$setting->getFirstMediaUrl('loader','loader') }}" style="padding: 5px;" width="100px" height="100px">
                             
                        </div>

                        <div class="mb-3 col-md-3">
                          <label class="form-label">Admin Login Background</label>
                           <input type="file" class="form-control" name="login_background_image">
                           <small>Size (900x500)</small>
                          
                              <img src="{{$setting->getFirstMediaUrl('login_background_image','login_background_image') }}" style="padding: 5px;" width="100px" height="100px">
                             
                        </div>

    
                         <div class="col-12">
                          <button class="btn btn-primary" type="submit">Update Data</button>
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

@endsection