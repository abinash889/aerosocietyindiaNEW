<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Country;
use Illuminate\Support\Facades\Crypt;

class StateController extends Controller
{
    public function createState()
    {
        $countryfetch=Country::all();
        $statedatafetch=State::orderBy('id','DESC')->get();
        return view('admin.AdminState',compact('countryfetch','statedatafetch'));
    }
    public function createStatePostIns(Request $request)
    {
        $validated = $request->validate([
            'Countryddl' => 'required',
            'Statecodetxt' => 'required',
            'Statenametxt' => 'required',
            'Statestatusddl' => 'required',
        ],
        [
            'Countryddl.required' => 'Please select country',
            'Statecodetxt.required' => 'Please enter state code',
            'Statenametxt.required' => 'Please enter state name',
            'Statestatusddl.required' => 'Please select status'
        ]);

        $post=new State;
        $post->Int_CountryID=$request->Countryddl;
        $post->vch_statecode=$request->Statecodetxt;
        $post->vch_statename=$request->Statenametxt;
        $post->vch_statestatus=$request->Statestatusddl;

        $post->save();
        notify()->success('State added sucessfully!');
        return redirect('/addstate');
    }
    public function createStatePostUDT(Request $request)
    {
        //dd($request->udtCountryddl);
        $post=State::where('id',$request->id)->update([
            'Int_CountryID'=>$request->udtCountryddl,
            'vch_statecode'=>$request->UDTStatecodetxt,
            'vch_statename'=>$request->UDTStatenametxt,
            'vch_statestatus'=>$request->udtStatestatusddl,
            'DT_updatedon'=>now()
        ]);
        notify()->success('State updated sucessfully!');
        return redirect('/addstate');
    }
    public function createStatePostDLT($id)
    {
        $state_id=Crypt::decrypt($id);
        $post=State::where('id',$state_id)->delete();
        notify()->success('State deleted sucessfully!');
        return redirect('/addstate');
    }
}
