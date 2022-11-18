<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Poll;
use Illuminate\Http\Request;
use Session;
class PollController extends Controller
{
   

    public function index(){
     $poll = Poll::orderBy('id','Asc')->get();
     return view('admin.poll.index',compact('poll'));
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
     'question' => 'required|unique:polls,question'
     ]);
     $onlinePoll = new Poll();
     $onlinePoll->question = $request->question;
     $onlinePoll->yes_vote = 0;
     $onlinePoll->no_vote = 0;
     $onlinePoll->no_comment = 0;
     $onlinePoll->save();
     toastr()->success('Poll Create Successfully');
     return redirect()->back();
    }

  
    public function update(Request $request, $id)
    {

     $poll = Poll::find($id);
     $poll->question = $request->question;
     $poll->update();
     toastr()->success('Data Update successfully. !!');
     return back();

    }




    public function destroy($id){
        $data = Poll::find($id);
        $data->delete();
        toastr()->success('Data Deleted successfully. !!');
        return redirect()->back();
     }

    //change user status
     public function changePollStatus(Request $request){
        $id = $request->get('poll_id');
        $data = Poll::find($id);
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
