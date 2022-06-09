<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\Gradingcommittee;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $membership = Membership::all();
      return view('membership.membership',compact('membership'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Approvedmember(Request $request,$id)
    {   
    
        $membership = Gradingcommittee::all();
        $aprv_id=Crypt::decrypt($id);
       // dd($aprv_id);
        $member_id=Membership::where('id',$aprv_id)->first();
       
        $level_id=Gradingcommittee::where('INT_user_id',$member_id->int_grading_level)->first('INT_level');
        //dd($level_id->INT_level);
        if($level_id->INT_level!=6){
        $new_member_id=Gradingcommittee::where('INT_level',$level_id->INT_level+1)->first('INT_user_id');
        $mbr_id=$new_member_id->INT_user_id ;
        }
        else{
            $mbr_id=0;
        }
        $new_member_approved_id=$member_id->Int_approve_status+2;
        // dd($new_member_approved_id);
        $post = Membership::find($aprv_id);
        $post->int_grading_level =$mbr_id;
        $post->Int_approve_status = $new_member_approved_id;
        $post->update();

        notify()->success('Member approved Successfully');
        
        return redirect()->back();  
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Rejectedmember($id)
    {
        $rejc_id=Crypt::decrypt($id);
        $post = Membership::find($rejc_id);
        //dd($post->Int_approve_status);
        $post = Membership::find($rejc_id);
        
        $reject_id=$post->Int_approve_status;
        // dd($reject_id);
        $member_rejected_id=$reject_id + 1;
        //dd($member_rejected_id);
        
        $post->Int_approve_status =  $reject_id+1;
        $post->DT_updatedon = now();
        //dd($post->vch_rejectedby);
        $post->update();

        

        notify()->success('Member Rejected Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function show(Membership $membership)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function edit(Membership $membership)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Membership $membership)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function destroy(Membership $membership)
    {
        //
    }
}