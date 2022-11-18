@extends('layouts.admin.main')
 @section('title')
   Taraikhabar || Change-Password
 @endsection
@section('content')


   <div class="body flex-grow-1 py-4">
        <div class="container-lg">

          <div class="row">

            <div class="col-12">
              <div class="card mb-4">

                <div class="card-header">
                  <strong>Password / Update Password</strong>
                </div>

                <div class="card-body">
                   <div class="example">
                     <div class="tab-content rounded-bottom">
                      <div class="tab-pane p-3 active">

                        <form action="{{route('update.password')}}" method="post" id="changePassword">@csrf
                        
                         <div class="mb-3">
                          <label class="form-label">Email / User Name</label>
                          <input type="email" class="form-control" value="{{$adminDetails['email']}}" readonly="">
                        </div>

                        <div class="mb-3">
                          <label class="form-label">Current Password *</label>
                          <input type="password" class="form-control" name="current_password" id="current_password" placeholder="current password">
                        </div>
                        <div class="mb-3">
                          <label class="form-label">New Password *</label>
                          <input type="password" class="form-control" name="new_password" id=" new_password" placeholder="new password">
                        </div>

                        <div class="mb-3">
                          <label class="form-label">Confirm Password *</label>
                          <input type="password" class="form-control" name="confirm_password" id=" confirm_password" placeholder="confirm password">
                        </div>

                         <div class="col-12">
                          <button class="btn btn-primary" type="submit">Update Password</button>
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