<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Session;
use Auth;
class PageController extends Controller
{
    
   
    public function index()
    {
      $pages = Page::orderBy('id', 'desc')->get();
      return view('admin.pages.index', compact('pages'));
    }


    public function store(Request $request)
    {

        $this->validate($request,[
        'title' => 'required',
        'short_description' => 'required',
        'description' => 'required'
        ]);

        $pages = new Page;
        $pages->title = $request->title;
        $pages->slug = $request->slug;
        $pages->short_description = $request->short_description;
        $pages->description = $request->description;


        $meta_keyword = array();
        if($request->meta_keyword[0] != null){
            foreach (json_decode($request->meta_keyword[0]) as $key => $tag) {
                array_push($meta_keyword, $tag->value);
            }
        }
        $pages->meta_keyword = implode(',', $meta_keyword);

        $pages->meta_description = $request->meta_description;

        if($pages->meta_keyword == null) {
        $pages->meta_keyword = $pages->title;
        }

        if($pages->meta_description == null) {
        $pages->meta_description = $pages->short_description;
        }
        $pages->created_by = auth()->guard('admin')->user()->id;
        $pages->save();
        toastr()->success('Data has been inserted successfully !!');
        return redirect()->route('pages.index');
    }

   

  
      public function update(Request $request, $id)
    {
        $pages = Page::findOrFail($id);
        $pages->title = $request->title;
        $pages->slug = $request->slug;
        $pages->short_description = $request->short_description;
        $pages->description = $request->description;
        $pages->meta_keyword = $request->meta_keyword;
        $pages->meta_description = $request->meta_description;

        if($pages->meta_keyword == null) {
        $pages->meta_keyword = $pages->title;
        }
        if($pages->meta_description == null) {
        $pages->meta_description = $pages->short_description;
        }

       $pages->updated_by = auth()->guard('admin')->user()->id;
       $pages->save();
       toastr()->success('Data has been Update successfully !!');
       return redirect()->route('pages.index');

    }

 
     public function destroy($id){
        $data = Page::find($id);
        $data->delete();
        toastr()->success('Data Deleted successfully. !!');
        return redirect()->back();
     }

    //change user status
     public function changePageStatus(Request $request){
        $id = $request->get('pages_id');
        $data = Page::find($id);
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
