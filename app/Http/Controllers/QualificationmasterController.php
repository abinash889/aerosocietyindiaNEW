<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qualificationmaster;
use Illuminate\Support\Facades\Crypt;

class QualificationmasterController extends Controller
{
    public function createqulificationdetails()
    {
        $qualificationfetchresult=Qualificationmaster::orderBy('id','DESC')->get();
        return view('admin.AdminQualificationmaster',compact('qualificationfetchresult'));
    }
    public function createqulificationPOSTINS(Request $request)
    {
        $validated = $request->validate([
            'qualificationcodetxt' => 'required',
            'qualificationnametxt' => 'required',
            'qualificationleveltxt' => 'required',
        ],
        [
            'qualificationcodetxt.required' => 'Please enter Qualification code',
            'qualificationnametxt.required' => 'Please enter Qualification name',
            'qualificationleveltxt.required' => 'Please select status'
        ]);
        $post=new Qualificationmaster;
        $post->vch_qcode=$request->qualificationcodetxt;
        $post->vch_qdesc=$request->qualificationnametxt;
        $post->vch_qlevel=$request->qualificationleveltxt;

        $post->save();
        notify()->success('Qualfication added successfully');
        return redirect('/addqualificationmaster');
    }
    public function createqulificationPostUDT(Request $request)
    {
        $post=Qualificationmaster::where('id',$request->id)->update([
            'vch_qcode'=>$request->UDTqualificationcodetxt,
            'vch_qdesc'=>$request->UDTqualificationnametxt,
            'vch_qlevel'=>$request->UDTqualificationleveltxt,
            'DT_updatedon'=>now()
        ]);
        notify()->success('Qualfication updated successfully');
        return redirect('/addqualificationmaster');
    }
    public function createqulificationPOSTDLT($id)
    {
        $qual_id=Crypt::decrypt($id);
        $post=Qualificationmaster::where('id',$qual_id)->delete();
        notify()->success('Qualfication deleted successfully');
        return redirect('/addqualificationmaster');
    }
}
