<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membertypemaster;
use Illuminate\Support\Facades\Crypt;

class MembertypemasterController extends Controller
{
    public function createmembertypemaster()
    {
        $membertypefetch=Membertypemaster::orderBy('id','DESC')->get();
        return view('admin.AdminMembertypemaster',compact('membertypefetch'));
    }
    public function createmembertypemasterPOSTINS(Request $request)
    {
        $validated = $request->validate([
            'membertypecodetxt' => 'required',
            'membertypenametxt' => 'required',
            'membertypeddl' => 'required',
            'duescode1' => 'required',
            'duescode2' => 'required',
            //'statusddl' => 'required',
        ],
        [
            'membertypecodetxt.required' => 'Please enter member type code',
            'membertypenametxt.required' => 'Please enter member type name',
            'membertypeddl.required' => 'Please select member description',
            'duescode1.required' => 'Please enter dues code1',
            'duescode2.required' => 'Please enter dues code2'
            //'statusddl.required' => 'Please choose status'
        ]);
        $post=new Membertypemaster;
        $post->vch_membTCode=$request->membertypecodetxt;
        $post->vch_membTname=$request->membertypenametxt;
        $post->vch_catedescname=$request->membertypeddl;
        $post->vch_duescode1=$request->duescode1;
        $post->vch_duescode2=$request->duescode2;
        $post->vch_status=$request->statusddl;

        $post->save();
        notify()->success('Member type master added succssfully');
        return redirect('/addmembertypemaster');
    }
    public function createmembertypemasterPOSTUDT(Request $request)
    {
        $post=Membertypemaster::where('id',$request->id)->update([
            'vch_membTCode'=>$request->UDTmembertypecodetxt,
            'vch_membTname'=>$request->UDTmembertypenametxt,
            'vch_catedescname'=>$request->UDTmembertypeddl,
            'vch_duescode1'=>$request->UDTduescode1,
            'vch_duescode2'=>$request->UDTduescode2,
            'vch_status'=>$request->UDTstatusddl
        ]);
        notify()->success('Member type master updated succssfully');
        return redirect('/addmembertypemaster');
    }
    public function createmembertypemasterPOSTDLT($id)
    {
        $mtype_id=Crypt::decrypt($id);
        $post=Membertypemaster::where('id',$mtype_id)->delete();
        notify()->success('Member type master deleted succssfully');
        return redirect('/addmembertypemaster');
    }
}
