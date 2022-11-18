<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(){
     $permission = Permission::orderBy('id','Asc')->get();
     return view('admin.permission.index',compact('permission'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view('admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request){
     $this->validate($request,[
     'role_id' => 'required',
     'permission' => 'required'
     ]);

     Permission::create($request->all());
     toastr()->success('Permission Create Successfully !!');
     return redirect()->route('permission.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
        public function destroy($id){
          Permission::destroy($id);
          toastr()->success('Permission Destroy Successfully !!');
         return back();
        }

        public function edit($id){
          $permission = Permission::find($id);
          return view('admin.permission.edit',compact('permission'));

        }
        public function update(Request $request,$id){
         $permission = Permission::find($id);
         $permission->role_id = $request->role_id;
         $permission->permission = $request->permission;
         $permission->update();
         toastr()->success('Permission Update Successfully !!');
         return redirect()->route('permission.index');
        }


          //change user status
     public function changePermissionStatus(Request $request){
        $id = $request->get('permission_id');
        $data = Permission::find($id);
        if($data->status == 1) {
        $data->status = 0;
        }else {
        $data->status = 1;
        }
        $data->update();
        toastr()->success('Data Change successfully. !!');
        return back();
    }

}
