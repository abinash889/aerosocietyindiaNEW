<?php

namespace App\Http\Controllers;

use App\Models\Proposer;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\Gradingcommittee;

class ProposerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $membership = Membership::all();
        return view('membership.proposer',compact('membership'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Approvedproposermember(Request $request,$id)
    {
        $membership = Gradingcommittee::all();
        $aprv_id=Crypt::decrypt($id);
       // dd($aprv_id);
        $member_id=Membership::where('id',$aprv_id)->first();
        // dd($member_id);

        $post = Membership::find($aprv_id);
        $post->INT1_pro_status =1 ;
       
        $post->update();

        notify()->success('Member approved Successfully');
        return redirect()->back(); 
    }

    public function Approvedproposermember2(Request $request,$id)
    {
        $membership = Gradingcommittee::all();
        $aprv_id=Crypt::decrypt($id);
       // dd($aprv_id);
        $member_id=Membership::where('id',$aprv_id)->first();
        // dd($member_id);

        $post = Membership::find($aprv_id);
        $post->INT2_pro_status =1 ;
       
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proposer  $proposer
     * @return \Illuminate\Http\Response
     */
    public function show(Proposer $proposer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proposer  $proposer
     * @return \Illuminate\Http\Response
     */
    public function edit(Proposer $proposer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proposer  $proposer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proposer $proposer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proposer  $proposer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proposer $proposer)
    {
        //
    }
}
