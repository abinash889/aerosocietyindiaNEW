<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddBranchEvent;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

class ApproveBranchEventController extends Controller
{
    public function approvebranchevent()
    {
        $result=AddBranchEvent::orderBy('id','DESC')->get();
        return view('admin.AdminbrancheventApproval',compact('result'));
    }
    public function ApprovedEvents($id)
    {   
        $aprv_id=Crypt::decrypt($id);
        $post=AddBranchEvent::where('id',$aprv_id)->update([
            'INT_approvestatus'=>1,
            'DT_updatedon'=>now()
        ]);

        notify()->success('Event approved Successfully');
        return redirect('/approvebranchevent');
    }
    public function RejectedEvents($id)
    {
        $rejc_id=Crypt::decrypt($id);
        $post=AddBranchEvent::where('id',$rejc_id)->update([
            'INT_approvestatus'=>2,
            'DT_updatedon'=>now()
        ]);

        notify()->success('Event Rejected Successfully');
        return redirect('/approvebranchevent');
    }
}
