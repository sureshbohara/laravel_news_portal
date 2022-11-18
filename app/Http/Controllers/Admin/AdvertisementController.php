<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\Advertisement;
use Illuminate\Http\Request;
use Session;
class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data['advertisement'] = Advertisement::orderBy('id','Desc')->get();
      return view('admin.advertisements.index',$data);
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
    public function store(Request $request)
    {

         $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $data = new Advertisement;
        $data->title = $request->title;
        $data->link = $request->link;
        $data->place = $request->place;

         if ($data){
            if ($request->hasFile('image')) {
                $data->addMediaFromRequest('image')->toMediaCollection('image');
           }
         }


        $data->created_by = auth()->guard('admin')->id();
        $data->save();
        toastr()->success('Data has been inserted successfully !!');
        return redirect()->route('advertisement.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function show(Advertisement $advertisement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertisement $advertisement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $data = Advertisement::findOrFail($id);
        $data->title = $request->title;
        $data->link = $request->link;
        $data->place = $request->place;

        if ($data){
            if ($request->hasFile('image')) {
                $data->addMediaFromRequest('image')->toMediaCollection('image');
           }
         }
         
        $data->updated_by = auth()->guard('admin')->id();
        $data->save();
        toastr()->success('Data has been update successfully !!');
        return redirect()->route('advertisement.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
     $adv = Advertisement::where(['id'=>$id])->first();
     $adv->delete();

      $regularImage = 'image/advertisement/regular/';
      if(!empty($adv->image)){
         if(file_exists($regularImage.$adv->image)){
           unlink($regularImage.$adv->image);
        }
      }

      $navImage = 'image/advertisement/navside/';
      if(!empty($adv->image)){
         if(file_exists($navImage.$adv->image)){
           unlink($navImage.$adv->image);
        }
      }

      $sidebarImage = 'image/advertisement/sidebar/';
      if(!empty($adv->image)){
         if(file_exists($sidebarImage.$adv->image)){
           unlink($sidebarImage.$adv->image);
        }
      }
      toastr()->success('Data Delated successfully. !!');
      return redirect()->back();
    }

     public function changeAdvStatus(Request $request){
        $id = $request->get('adv_id');
        $data = Advertisement::find($id);
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
