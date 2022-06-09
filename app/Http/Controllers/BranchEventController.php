<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddBranchEvent;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Crypt;

class BranchEventController extends Controller
{
    public function createbranchevent()
    {
        $result=AddBranchEvent::orderBy('id','DESC')->get();
        return view('branch.BranchAddEvent',compact('result'));
    }
    public function createbrancheventPOSTINS(Request $request)
    {

        
        $session_id = FacadesAuth::user()->id;
        //dd($session_id);
        $post=new AddBranchEvent;
        $post->Branch_ID=$session_id;
        $post->vch_eventname=$request->eventnametxt;
        $post->DT_Eventdate=$request->eventdatetxt;
        $post->vch_eventdetails=$request->eventdetailstxt;

        $file = $request->file('uploadimagefileUpload');
        $extenstion = $file->getClientOriginalExtension();
        $filename = time().'.'.$extenstion;
        $file->move('Upload_DBImage/', $filename);
        $post->vch_image = $filename; 

        $post->save();
        notify()->success('Your event details is under approval. Once its approved, Its automatically visible to all');
        return redirect('/addbranchevent');
    }
    public function createbrancheventPOSTUDT(Request $request)
    {
        $session_id = FacadesAuth::user()->id;

        $file = $request->file('UDTuploadimagefileUpload');
        $extenstion = $file->getClientOriginalExtension();
        $filename = time().'.'.$extenstion;
        $file->move('Upload_DBImage/', $filename);
        //$post->vch_image = $filename; 
        //dd($filename);
        $post=AddBranchEvent::where('id',$request->id)->update([
            'Branch_ID'=>$session_id,
            'vch_eventname'=>$request->UDTeventnametxt,
            'DT_Eventdate'=>$request->UDTeventdatetxt,
            'vch_eventdetails'=>$request->UDTeventdetailstxt,
            'vch_image'=>$filename,
            'INT_approvestatus'=>0,
            'DT_updatedon'=>now()
        ]);
        
        notify()->success('Your event details is under approval. Once its approved, Its automatically visible to all');
        return redirect('/addbranchevent');
    }
    public function createbrancheventPOSTDLT($id)
    {
        $dtl_id=Crypt::decrypt($id);
        $post=AddBranchEvent::where('id',$dtl_id)->delete();
        notify()->success('Event deleted Successfully');
        return redirect('/addbranchevent');
    }
}
