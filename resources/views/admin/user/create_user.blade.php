@extends('layouts.admin.main')
 @section('title')
   Taraikhabar || Create User
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
                      <strong>User / Create User</strong>
                  </div>
                  <div class="col-md-6">
                     <a href="{{route('user.index')}}" class="btn btn-danger text-info" style="float: right;">User List</a>
                
                  </div>
                </div>
              </div>
                

                <div class="card-body">
                   <div class="example">
                     <div class="tab-content rounded-bottom">
                      <div class="tab-pane p-3 active">

                        <form action="{{route('user.store')}}" method="post" id="createUser" enctype="multipart/form-data">@csrf
                      
                        <div class="row">
                        <div class="mb-3 col-md-4">
                          <label class="form-label">Email</label>
                          <input type="email" name="email" class="form-control" placeholder="User Email ID">
                        </div>

                        <div class="mb-3 col-md-4">
                          <label class="form-label">Password</label>
                          <input type="password" name="password" class="form-control" placeholder="User Password">
                        </div>

                        <div class="mb-3 col-md-4">
                          <label class="form-label">Full Name</label>
                          <input type="text" name="name" class="form-control" placeholder="User Full Name">
                        </div>

                        <div class="mb-3 col-md-4">
                          <label class="form-label">Mobile Number</label>
                          <input type="text" class="form-control" name="mobile" placeholder="User Contact Number">
                        </div>

                        <div class="mb-3 col-md-4">
                          <label class="form-label">Address</label>
                          <input type="text" class="form-control" name="address" placeholder="User Address">
                        </div>

                         <div class="mb-3 col-md-4">
                          <label class="form-label">Designation</label>
                          <input type="text" class="form-control" name="designation" placeholder="User Designation">
                        </div>

                        <div class="mb-3 col-md-4">
                          <label class="form-label">DOB</label>
                          <input type="text" class="form-control" name="dob" placeholder="User Date Of Birth">
                        </div>

                        <div class="mb-3 col-md-4">
                          <label class="form-label">Joining Date</label>
                          <input type="text" class="form-control" name="join_date" placeholder="User Joining Date">
                        </div>

                        <div class="mb-3 col-md-4">
                          <label class="form-label">Salary</label>
                          <input type="text" class="form-control" name="salary" placeholder="User Salary">
                        </div>

                         <div class="mb-3 col-md-6">
                          <label class="form-label">Profile Image</label>
                           <input type="file" class="form-control" name="image">
                        </div>

                        <div class="mb-3 col-md-6">
                          <label class="form-label">Select Role</label>
                           <select name="role_id" class="form-control">
                              <option value="">Select Role</option>
                              @foreach(\App\Models\Role::all() as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                              @endforeach
                           </select>
                        </div>

                         <div class="col-12">
                          <button class="btn btn-primary" type="submit">Create User</button>
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