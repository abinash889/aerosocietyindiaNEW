<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddBranch;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class AdminAddBranchController extends Controller
{
    public function createbranch()
    {
        $branchresult=AddBranch::orderBy('id','DESC')->get();
        return view('admin.AdminAddBranch',compact('branchresult'));
    }
    public function createbranchPOSTINS(Request $request)
    {
        $random=rand(111111,999999);

        $post= new AddBranch;
        $post->vch_branchname=$request->branchnametxt;
        $post->branch_emailid=$request->branchusernametxt;
        //$post->branch_password=Hash::make(substr($request->branchnametxt,0,2).$random);
        $post->branch_password=substr($request->branchnametxt,0,2).$random;
        $post->vch_status=$request->branchstatusddl;

        $post->save();

        $post1= new User;
        $post1->vch_usertype="branch";
        $post1->name=$request->branchnametxt;
        $post1->email=$request->branchusernametxt;
        $post1->password=substr($request->branchnametxt,0,2).$random;
        // ::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        // ]);


        $post1->save();
        notify()->success('Branch added sucessfully!');
        return redirect('/addbranch');
    }
    public function createbranchPOSTUDT(Request $request)
    {
        $updateresult=AddBranch::where('id',$request->id)->update([
            'vch_branchname'=>$request->UDTbranchnametxt,
            'branch_emailid'=>$request->UDTbranchusernametxt,
            'branch_password'=>$request->UDTbranchusernametxt,
            'vch_status'=>$request->UDTbranchstatusddl
        ]);
        notify()->success('Branch updated successfully');
        return redirect('/addbranch');
    }
    public function createbranchPOSTDLT($id)
    {
        $resultID=Crypt::decrypt($id);
        $post=AddBranch::where('id',$resultID)->delete();
        notify()->success('Branch deleted successfully');
        return redirect('/addbranch');
    }
}
