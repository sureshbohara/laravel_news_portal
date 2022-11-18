@extends('layouts.admin.main')
 @section('title')
   Taraikhabar || Create Permission
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
                      <strong>Permission / Create Permission</strong>
                  </div>
                  <div class="col-md-6">
                     <a href="{{route('permission.index')}}" class="btn btn-danger text-info" style="float: right;">Permission List</a>
                
                  </div>
                  </div>
                 </div>

                 <form action="{{route('permission.store')}}" method="post">@csrf
                   <div class="row">
                     <div class="col-lg-3">
                      <div class="card-body">
                       <div class="form-group">
                          <label >Select Role Name <span style="color:red">*</span></label>
                          <select class="form-control" name="role_id" required="">
                              <option value="0">Please select a role</option>
                              @foreach(\App\Models\Role::all() as $role)
                                  <option value="{{$role->id}}">{{$role->name}}</option>
                              @endforeach
                          </select>
                      </div>
                    </div>

                    <div class="card-footer">
                       <button type="submit" class="btn btn-primary">Submit</button>
                  </div>

                     </div>
                     <div class="col-lg-9">
                       
                        <div class="card-body">
                          <table class="table table-bordered border-primary">
                          <thead class="table-dark">
                             <tr>
                                <th scope="col">Access</th>
                                <th scope="col">Add</th>
                                <th scope="col">Edit</th>
                                <th scope="col">View</th>
                                <th scope="col">Delete</th>
                             </tr>
                            </thead>

                            <tbody>
                           

                                <tr>
                                  <th scope="col">Role</th>
                                  <td><input type="checkbox" name="permission[role][add]" value="1"></td>
                                  <td><input type="checkbox" name="permission[role][edit]" value="1"></td>
                                  <td><input type="checkbox" name="permission[role][view]" value="1"></td>
                                  <td><input type="checkbox" name="permission[role][delete]" value="1"></td>
                                </tr>

                                <tr>
                                  <th scope="col">Permission</th>
                                  <td><input type="checkbox" name="permission[permission][add]" value="1"></td>
                                  <td><input type="checkbox" name="permission[permission][edit]" value="1"></td>
                                  <td><input type="checkbox" name="permission[permission][view]" value="1"></td>
                                  <td><input type="checkbox" name="permission[permission][delete]" value="1"></td>
                                </tr>

                                <tr>
                                <th scope="col">User</th>
                                <td><input type="checkbox" name="permission[user][add]" value="1"></td>
                                <td><input type="checkbox" name="permission[user][edit]" value="1"></td>
                                <td><input type="checkbox" name="permission[user][view]" value="1"></td>
                                <td><input type="checkbox" name="permission[user][delete]" value="1"></td>
                                </tr>


                                <tr>
                                  <th scope="col">News Category</th>
                                  <td><input type="checkbox" name="permission[category][add]" value="1"></td>
                                  <td><input type="checkbox" name="permission[category][edit]" value="1"></td>
                                  <td><input type="checkbox" name="permission[category][view]" value="1"></td>
                                  <td><input type="checkbox" name="permission[category][delete]" value="1"></td>
                                </tr>

                                <tr>
                                  <th scope="col">News Tags</th>
                                  <td><input type="checkbox" name="permission[tags][add]" value="1"></td>
                                  <td><input type="checkbox" name="permission[tags][edit]" value="1"></td>
                                  <td><input type="checkbox" name="permission[tags][view]" value="1"></td>
                                  <td><input type="checkbox" name="permission[tags][delete]" value="1"></td>
                                </tr>

                                  <tr>
                                  <th scope="col">News</th>
                                  <td><input type="checkbox" name="permission[news][add]" value="1"></td>
                                  <td><input type="checkbox" name="permission[news][edit]" value="1"></td>
                                  <td><input type="checkbox" name="permission[news][view]" value="1"></td>
                                  <td><input type="checkbox" name="permission[news][delete]" value="1"></td>
                                </tr>

                                 <tr>
                                  <th scope="col">Blogs Category</th>
                                  <td><input type="checkbox" name="permission[bcategory][add]" value="1"></td>
                                  <td><input type="checkbox" name="permission[bcategory][edit]" value="1"></td>
                                  <td><input type="checkbox" name="permission[bcategory][view]" value="1"></td>
                                  <td><input type="checkbox" name="permission[bcategory][delete]" value="1"></td>
                                </tr>

                                <tr>
                                  <th scope="col">Blogs</th>
                                  <td><input type="checkbox" name="permission[blogs][add]" value="1"></td>
                                  <td><input type="checkbox" name="permission[blogs][edit]" value="1"></td>
                                  <td><input type="checkbox" name="permission[blogs][view]" value="1"></td>
                                  <td><input type="checkbox" name="permission[blogs][delete]" value="1"></td>
                                </tr>

                                <tr>
                                  <th scope="col">Poll</th>
                                  <td><input type="checkbox" name="permission[poll][add]" value="1"></td>
                                  <td><input type="checkbox" name="permission[poll][edit]" value="1"></td>
                                  <td><input type="checkbox" name="permission[poll][view]" value="1"></td>
                                  <td><input type="checkbox" name="permission[poll][delete]" value="1"></td>
                                </tr>

                                <tr>
                                  <th scope="col">Pages</th>
                                  <td><input type="checkbox" name="permission[pages][add]" value="1"></td>
                                  <td><input type="checkbox" name="permission[pages][edit]" value="1"></td>
                                  <td><input type="checkbox" name="permission[pages][view]" value="1"></td>
                                  <td><input type="checkbox" name="permission[pages][delete]" value="1"></td>
                                </tr>

                                <tr>
                                  <th scope="col">Advertisement</th>
                                  <td><input type="checkbox" name="permission[advertisement][add]" value="1"></td>
                                  <td><input type="checkbox" name="permission[advertisement][edit]" value="1"></td>
                                  <td><input type="checkbox" name="permission[advertisement][view]" value="1"></td>
                                  <td><input type="checkbox" name="permission[advertisement][delete]" value="1"></td>
                                </tr>

                            </tbody>

                          </table>
          
                        </div>
                     </div>
                   </div>
                 </form>


                 
              </div>
            </div>

          </div>
        </div>
      </div>
@endsection