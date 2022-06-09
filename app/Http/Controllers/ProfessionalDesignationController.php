<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfessionalDesignation;
use Illuminate\Support\Facades\Crypt;

class ProfessionalDesignationController extends Controller
{
    public function createprofesstionaldesig()
    {
        $getProfessionalDesignation=ProfessionalDesignation::orderBy('id','DESC')->get();
        return view('admin.AdminprofessionalDesignation',compact('getProfessionalDesignation'));
    }
    public function createprofDesigPostIns(Request $request)
    {
        $validated = $request->validate([
            'profdesigcodetxt' => 'required',
            'profdesignametxt' => 'required',
            //'profdesigstatusddl' => 'required',
        ],
        [
            'profdesigcodetxt.required' => 'Please enter professional designation code',
            'profdesignametxt.required' => 'Please enter professional designation description'
            //'profdesigstatusddl.required' => 'Please select status'
        ]);
        $post= new ProfessionalDesignation;
        $post->vch_pd_code=$request->profdesigcodetxt;
        $post->vch_pd_name=$request->profdesignametxt;
        $post->vch_pd_status=$request->profdesigstatusddl;

        $post->save();
        notify()->success('Professional Designation added successfully');
        return redirect('/addprofesstionalDesignation');
    }
    public function createprofDesigPostUDT(Request $request)
    {
        $post=ProfessionalDesignation::where('id',$request->id)->update([
            'vch_pd_code'=>$request->UDTprofdesigcodetxt,
            'vch_pd_name'=>$request->UDTprofdesignametxt,
            'vch_pd_status'=>$request->UDTprofdesigstatusddl,
            'DT_updatedon'=>now()
        ]);
        notify()->success('Professional Designation updated successfully');
        return redirect('/addprofesstionalDesignation');
    }
    public function createprofDesigPOSTDLT($id)
    {
        $contllr_var=Crypt::decrypt($id);
        $post=ProfessionalDesignation::where('id',$contllr_var)->delete();
        notify()->success('Professional Designation deleted successfully');
        return redirect('/addprofesstionalDesignation');
    }
}
