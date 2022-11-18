@extends('layouts.admin.main')
 @section('title')
   Taraikhabar || Update User
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
                      <strong>User / Update User</strong>
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

                        <form action="{{ route('user.update',$user['id']) }}" method="post" id="createUser" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                      
                        <div class="row">
                        <div class="mb-3 col-md-4">
                          <label class="form-label">Email</label>
                          <input type="email" name="email" class="form-control" value="{{ $user['email'] }}">
                        </div>

                        <div class="mb-3 col-md-4">
                          <label class="form-label">Full Name</label>
                          <input type="text" name="name" class="form-control" value="{{ $user['name'] }}">
                        </div>

                        <div class="mb-3 col-md-4">
                          <label class="form-label">Mobile Number</label>
                          <input type="text" class="form-control" name="mobile" value="{{ $user['mobile'] }}">
                        </div>

                        <div class="mb-3 col-md-4">
                          <label class="form-label">Address</label>
                          <input type="text" class="form-control" name="address" value="{{ $user['address'] }}">
                        </div>

                         <div class="mb-3 col-md-4">
                          <label class="form-label">Designation</label>
                          <input type="text" class="form-control" name="designation" value="{{ $user['designation'] }}">
                        </div>

                        <div class="mb-3 col-md-4">
                          <label class="form-label">DOB</label>
                          <input type="text" class="form-control" name="dob" value="{{ $user['dob'] }}">
                        </div>

                        <div class="mb-3 col-md-4">
                          <label class="form-label">Joining Date</label>
                          <input type="text" class="form-control" name="join_date" value="{{ $user['join_date'] }}">
                        </div>

                        <div class="mb-3 col-md-4">
                          <label class="form-label">Salary</label>
                          <input type="text" class="form-control" name="salary" value="{{ $user['salary'] }}">
                        </div>

                        <div class="mb-3 col-md-4">
                          <label class="form-label">Select Role</label>
                           <select name="role_id" class="form-control">
                              <option value="">Select Role</option>
                              @foreach(\App\Models\Role::all() as $role)
                                <option value="{{$role->id}}"  @if($role->id == $user->role_id) selected @endif>{{$role->name}}</option>
                              @endforeach
                           </select>
                        </div>

                         <div class="col-12">
                          <button class="btn btn-primary" type="submit">Update User</button>
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