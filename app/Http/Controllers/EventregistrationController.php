<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddBranchEvent;
use App\Models\eventmanagement;

class EventregistrationController extends Controller
{
    public function eventregistration()
    {
        return view('frontend.eventregistration');
    }
    public function showallevents()
    {
        $eventresult=AddBranchEvent::orderBy('id','DESC')->get();
        return view('frontend.allevents',compact('eventresult'));
    }
    public function showalleventslog($slog)
    {
        $evenstsall=AddBranchEvent::where('VCH_eventslogname',$slog)->get();
        return view('frontend.eventsdetails',compact('evenstsall'));
    }
    public function eventregistration_insertion(Request $request)
    {
        $post=new eventmanagement();
        $post->vch_pname=$request->fullnametxt;
        $post->INT_eventID=$request->id;
        $post->vch_pmembshipno=$request->membershipnotxt;
        $post->vch_pemail=$request->emailidtxt;
        $post->vch_pmobno=$request->mobilenotxt;
        $post->vch_pgender=$request->pgenderddl;
        $post->vch_fee=$request->feetxt;
        $post->INT_paymentstatus=1;

        
        $post->save();
        notify()->success('You have successfully registration for this event');
        return redirect('/all-events');
    }
}
