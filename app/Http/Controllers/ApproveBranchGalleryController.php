<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddBranchGallery;
use Illuminate\Support\Facades\Crypt;

class ApproveBranchGalleryController extends Controller
{
    public function approvebranchgallery()
    {
        $result=AddBranchGallery::orderBy('id','DESC')->get();
        // dd($result);
        return view('admin.AdminbranchgalleryApproval',compact('result'));
    }
    public function ApprovedGallery($id)
    {   
        $aprv_id=Crypt::decrypt($id);
        $post=AddBranchGallery::where('id',$aprv_id)->update([
            'INT_approvestatus'=>1,
            'DT_updatedon'=>now()
        ]);

        notify()->success('Gallery approved successfully');
        return redirect('/approvebranchgallery');
    }
    public function RejectedGallery($id)
    {
        $rejc_id=Crypt::decrypt($id);
        $post=AddBranchGallery::where('id',$rejc_id)->update([
            'INT_approvestatus'=>2,
            'DT_updatedon'=>now()
        ]);

        notify()->success('Gallery Rejected Successfully');
        return redirect('/approvebranchgallery');
    }
}
