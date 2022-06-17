<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Studentapply;
use App\Models\User;
use App\Models\PaymentTransaction;
use App\Models\Studentmemberdoc;
use Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class StudentapplyController extends Controller
{
    public function showstudentapplications()
    {
        $result=Studentapply::orderBy('id','DESC')->get();
        return view('admin.AdminCheckStudentApplication',compact('result'));
        
    }
    public function Acceptstudentapplications(Request $request, $id)
    {
       
        $acpt_id=Crypt::decrypt($id);
       
        $updatepost=Studentapply::where('id',$acpt_id)->update([
            'INT_approve_status'=>1
        ]);
        

        $getdata=Studentapply::where('id', $acpt_id)->first(); // get the current user data  
        //dd(json_decode($getdata->vch_academicinformation)[0]);

        
        


        //----Start-----Insert In Usertable//
        $insertuser=new User;
        $random=rand(111111,999999);
        $password = Hash::make($random);
        $insertuser->vch_usertype="Student";
        $insertuser->name=$getdata->vch_fname;
        $insertuser->email=$getdata->vch_emailid;
        $insertuser->password=$password;
        
        $insertuser->save();
        //----End-----Insert In Usertable//

        
        $last_id=$insertuser->id;
        //dd($last_id);
        // 'vch_membershipno'=>$getdata->vch_membershipno,
        // 'vch_dateofissue'=>$getdata->vch_dateofissue, 
        
        $getStudentdata=Studentapply::all(); 
        $memb_id=count($getStudentdata);
        $countmember_id=count($getStudentdata)+1;
        $countme_id="SM-". $countmember_id;
        //dd($countme_id);

        $updatepost=Studentapply::where('id',$acpt_id)->update([
           
            'INT_User_id'=>$last_id,
            'vch_membershipno'=>$countme_id,
            'vch_dateofissue'=>now(),
            'DT_updatedon'=>now()
          
        ]);

        //----Start-----Insert In Payment Table//
        $insertPaymentTable=new PaymentTransaction;
        $insertPaymentTable->INT_USER_id= $last_id;
        $insertPaymentTable->INT_paymentmode=$getdata->INT_paymentmode;
        $insertPaymentTable->INT_Payment_type=$getdata->INT_Payment_type;
        $insertPaymentTable->vch_transactionID=$getdata->vch_transactionID;
        $insertPaymentTable->vch_fee=$getdata->vch_fee;
        $insertPaymentTable->INT_paymentstatus=$getdata->Int_payment_status;
        $insertPaymentTable->save();

        //----End-----Insert In Payment Table//
        
        // $insertmemberdocTable=new Studentmemberdoc;
        // $insertPaymentTable->INT_USER_id= $last_id;

        // $file = $request->file('uploadimagefileUpload');
        // $extenstion = $file->getClientOriginalExtension();
        // $filename = time().'.'.$extenstion;
        // $file->move('Upload_DBImage/', $filename);
        // $post->vch_image = $filename; 

        
        //dd(count($getStudentdata));



        notify()->success('Student approved Successfully');
        //return redirect('/studentapplications');
        return view('admin.pdf',compact('getdata'));
    }
    public function Acceptofflinepayment(Request $request)
    {
        $updateData=Studentapply::where('id',$request->id)->update([
            'Int_payment_status'=>1,
            'INT_Payment_type'=>$request->paymenttypetxt,
            'vch_transactionID'=>$request->chequeddnotxt,
            'vch_fee'=>$request->amounttxt
        ]);
        notify()->success('Offline Payment update Successfully');
        return redirect('/studentapplications');
    }
    public function Rejectstudentapplications($id)
    {
        $rej_id=Crypt::decrypt($id);
       
        $updatepost=Studentapply::where('id',$rej_id)->update([
            'INT_approve_status'=>2
        ]);
        notify()->success('Approval Rejected Successfully');
        return redirect('/studentapplications');
    }
    public function refundtostudent($id)
    {
        $rfd_id=Crypt::decrypt($id);

        $refundpost=Studentapply::where('id',$rfd_id)->update([
            'INT_refund_status'=>1,
            'DT_updatedon'=>now()
        ]);
        notify()->success('Refund Successfull');
        return redirect('/studentapplications');
    }
}
