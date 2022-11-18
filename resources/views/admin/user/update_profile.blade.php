@extends('layouts.admin.main')
 @section('title')
   Taraikhabar || Update-Profile
 @endsection
@section('content')


   <div class="body flex-grow-1 py-4">
        <div class="container-lg">

          <div class="row">

            <div class="col-12">
              <div class="card mb-4">

                <div class="card-header">
                  <strong>Profile / Update Profile</strong>
                </div>

                <div class="card-body">
                   <div class="example">
                     <div class="tab-content rounded-bottom">
                      <div class="tab-pane p-3 active">

                        <form action="{{route('update.profile')}}" method="post" id="updateProfile" enctype="multipart/form-data">@csrf
                          
                        
                         <div class="mb-3">
                          <label class="form-label">Email / User Name</label>
                           <input type="email" value="{{Auth::guard('admin')->user()->email}}" class="form-control" readonly="">
                        </div>

                        <div class="mb-3">
                          <label class="form-label">Full Name</label>
                          <input type="text" name="name" value="{{Auth::guard('admin')->user()->name}}" class="form-control">
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Mobile Number</label>
                          <input type="text" class="form-control" name="mobile" value="{{Auth::guard('admin')->user()->mobile}}">
                        </div>

                         <div class="mb-3">
                          <label class="form-label">Designation</label>
                          <input type="text" class="form-control" name="designation" value="{{Auth::guard('admin')->user()->designation}}">
                        </div>

                        <div class="mb-3">
                          <label class="form-label">DOB</label>
                          <input type="text" class="form-control" name="dob" value="{{Auth::guard('admin')->user()->dob}}">
                        </div>

                        <div class="mb-3">
                          <label class="form-label">Joining Date</label>
                          <input type="text" class="form-control" name="join_date" value="{{Auth::guard('admin')->user()->join_date}}">
                        </div>

                        <div class="mb-3">
                          <label class="form-label">Salary</label>
                          <input type="text" class="form-control" name="salary" value="{{Auth::guard('admin')->user()->salary}}">
                        </div>

                         <div class="mb-3">
                          <label class="form-label">Profile Image</label>
                           <input type="file" class="form-control" name="image">
                            @if(!empty(Auth::guard('admin')->user()->image))
                             <img src="{{asset('images/user/'.Auth::guard('admin')->user()->image) }}" alt="{{Auth::guard('admin')->user()->name}}">
                             <input type="hidden" name="current_image" value="{{ Auth::guard('admin')->user()->image }}">
                            @endif
                        </div>

                         <div class="col-12">
                          <button class="btn btn-primary" type="submit">Update Profile</button>
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