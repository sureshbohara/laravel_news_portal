<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tags;
class TagsController extends Controller
{
    
    public function index(){
     $tags = Tags::orderBy('id','Asc')->get();
     return view('admin.tags.index',compact('tags'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
     $this->validate($request,[
     'title' => 'required|unique:tags,title'
     ]);
     $tags = new Tags();
     $tags->title = $request->title;
     $tags->slug = $request->slug;
     $tags->order_level = $request->order_level;
     $tags->save();
     toastr()->success('Data Create Successfully');
     return redirect()->back();
    }

  
    public function update(Request $request, $id)
    {

     $tags = Tags::find($id);
     $tags->title = $request->title;
     $tags->slug = $request->slug;
     $tags->order_level = $request->order_level;
     $tags->update();
     toastr()->success('Data Update successfully. !!');
     return back();

    }




    public function destroy($id){
        $data = Tags::find($id);
        $data->delete();
        toastr()->success('Data Deleted successfully. !!');
        return redirect()->back();
     }

    //change user status
     public function changeTagsStatus(Request $request){
        $id = $request->get('tags_id');
        $data = Tags::find($id);
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
