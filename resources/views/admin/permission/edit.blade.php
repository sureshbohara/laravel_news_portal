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

                 <form action="{{route('permission.update',$permission['id'])}}" method="post">@csrf
                  @method('PUT')
                   <div class="row">
                     <div class="col-lg-3">
                      <div class="card-body">
                       <div class="form-group">
                          <label >Select Role Name <span style="color:red">*</span></label>
                          <select class="form-control" name="role_id" required="">
                              <option value="0">Please select a role</option>
                               @foreach(\App\Models\Role::all() as $role)
                                 <option value="{{$role->id}}" @if($role->id == $permission->role_id) selected @endif>{{$role->name}}</option>
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
                                  <td><input type="checkbox" name="permission[role][add]" value="1" @isset($permission['permission']['role']['add']) checked @endisset></td>
                                  <td><input type="checkbox" name="permission[role][edit]" value="1" @isset($permission['permission']['role']['edit']) checked @endisset></td>
                                  <td><input type="checkbox" name="permission[role][view]" value="1" @isset($permission['permission']['role']['view']) checked @endisset></td>
                                  <td><input type="checkbox" name="permission[role][delete]" value="1" @isset($permission['permission']['role']['delete']) checked @endisset></td>

                              </tr>

                              <tr>
                                  <th scope="col">Permission</th>
                                  <td><input type="checkbox" name="permission[permission][add]" value="1" @isset($permission['permission']['permission']['add']) checked @endisset></td>
                                  <td><input type="checkbox" name="permission[permission][edit]" value="1" @isset($permission['permission']['permission']['edit']) checked @endisset></td>
                                  <td><input type="checkbox" name="permission[permission][view]" value="1" @isset($permission['permission']['permission']['view']) checked @endisset></td>
                                  <td><input type="checkbox" name="permission[permission][delete]" value="1" @isset($permission['permission']['permission']['delete']) checked @endisset></td>

                              </tr>

                              <tr>
                                  <th scope="col">Users</th>
                                  <td><input type="checkbox" name="permission[user][add]" value="1" @isset($permission['permission']['user']['add']) checked @endisset></td>
                                  <td><input type="checkbox" name="permission[user][edit]" value="1" @isset($permission['permission']['user']['edit']) checked @endisset></td>
                                  <td><input type="checkbox" name="permission[user][view]" value="1" @isset($permission['permission']['user']['view']) checked @endisset></td>
                                  <td><input type="checkbox" name="permission[user][delete]" value="1" @isset($permission['permission']['user']['delete']) checked @endisset></td>

                              </tr>


                              <tr>
                                  <th scope="col">News Tags</th>
                                  <td><input type="checkbox" name="permission[tags][add]" value="1" @isset($permission['permission']['tags']['add']) checked @endisset></td>
                                  <td><input type="checkbox" name="permission[tags][edit]" value="1" @isset($permission['permission']['tags']['edit']) checked @endisset></td>
                                  <td><input type="checkbox" name="permission[tags][view]" value="1" @isset($permission['permission']['tags']['view']) checked @endisset></td>
                                  <td><input type="checkbox" name="permission[tags][delete]" value="1" @isset($permission['permission']['tags']['delete']) checked @endisset></td>

                              </tr>



                              <tr>
                                  <th scope="col">News Category</th>
                                  <td><input type="checkbox" name="permission[category][add]" value="1" @isset($permission['permission']['category']['add']) checked @endisset></td>
                                  <td><input type="checkbox" name="permission[category][edit]" value="1" @isset($permission['permission']['category']['edit']) checked @endisset></td>
                                  <td><input type="checkbox" name="permission[category][view]" value="1" @isset($permission['permission']['category']['view']) checked @endisset></td>
                                  <td><input type="checkbox" name="permission[category][delete]" value="1" @isset($permission['permission']['category']['delete']) checked @endisset></td>

                              </tr>

                               <tr>
                                  <th scope="col">News</th>
                                  <td><input type="checkbox" name="permission[news][add]" value="1" @isset($permission['permission']['news']['add']) checked @endisset></td>
                                  <td><input type="checkbox" name="permission[news][edit]" value="1" @isset($permission['permission']['news']['edit']) checked @endisset></td>
                                  <td><input type="checkbox" name="permission[news][view]" value="1" @isset($permission['permission']['news']['view']) checked @endisset></td>
                                  <td><input type="checkbox" name="permission[news][delete]" value="1" @isset($permission['permission']['news']['delete']) checked @endisset></td>

                              </tr>

                               <tr>
                                  <th scope="col">Blogs Category</th>
                                  <td><input type="checkbox" name="permission[bcategory][add]" value="1" @isset($permission['permission']['bcategory']['add']) checked @endisset></td>
                                  <td><input type="checkbox" name="permission[bcategory][edit]" value="1" @isset($permission['permission']['bcategory']['edit']) checked @endisset></td>
                                  <td><input type="checkbox" name="permission[bcategory][view]" value="1" @isset($permission['permission']['bcategory']['view']) checked @endisset></td>
                                  <td><input type="checkbox" name="permission[bcategory][delete]" value="1" @isset($permission['permission']['bcategory']['delete']) checked @endisset></td>

                              </tr>

                               <tr>
                                  <th scope="col">Blogs</th>
                                  <td><input type="checkbox" name="permission[blogs][add]" value="1" @isset($permission['permission']['blogs']['add']) checked @endisset></td>
                                  <td><input type="checkbox" name="permission[blogs][edit]" value="1" @isset($permission['permission']['blogs']['edit']) checked @endisset></td>
                                  <td><input type="checkbox" name="permission[blogs][view]" value="1" @isset($permission['permission']['blogs']['view']) checked @endisset></td>
                                  <td><input type="checkbox" name="permission[blogs][delete]" value="1" @isset($permission['permission']['blogs']['delete']) checked @endisset></td>

                                </tr>


                                <tr>
                                  <th scope="col">Poll</th>
                                  <td><input type="checkbox" name="permission[poll][add]" value="1" @isset($permission['permission']['poll']['add']) checked @endisset></td>
                                  <td><input type="checkbox" name="permission[poll][edit]" value="1" @isset($permission['permission']['poll']['edit']) checked @endisset></td>
                                  <td><input type="checkbox" name="permission[poll][view]" value="1" @isset($permission['permission']['poll']['view']) checked @endisset></td>
                                  <td><input type="checkbox" name="permission[poll][delete]" value="1" @isset($permission['permission']['poll']['delete']) checked @endisset></td>

                                </tr>

                                <tr>
                                  <th scope="col">Pages</th>
                                  <td><input type="checkbox" name="permission[pages][add]" value="1" @isset($permission['permission']['pages']['add']) checked @endisset></td>
                                  <td><input type="checkbox" name="permission[pages][edit]" value="1" @isset($permission['permission']['pages']['edit']) checked @endisset></td>
                                  <td><input type="checkbox" name="permission[pages][view]" value="1" @isset($permission['permission']['pages']['view']) checked @endisset></td>
                                  <td><input type="checkbox" name="permission[pages][delete]" value="1" @isset($permission['permission']['pages']['delete']) checked @endisset></td>

                                </tr>
                                

                                <tr>
                                  <th scope="col">Advertisement</th>
                                  <td><input type="checkbox" name="permission[advertisement][add]" value="1" @isset($permission['permission']['advertisement']['add']) checked @endisset></td>
                                  <td><input type="checkbox" name="permission[advertisement][edit]" value="1" @isset($permission['permission']['advertisement']['edit']) checked @endisset></td>
                                  <td><input type="checkbox" name="permission[advertisement][view]" value="1" @isset($permission['permission']['advertisement']['view']) checked @endisset></td>
                                  <td><input type="checkbox" name="permission[advertisement][delete]" value="1" @isset($permission['permission']['advertisement']['delete']) checked @endisset></td>

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