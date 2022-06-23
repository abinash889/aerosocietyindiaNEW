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
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;

use Illuminate\Support\Facades\Mail as FacadesMail;
 
use PDF;

class StudentapplyController extends Controller
{
    public function showstudentapplications()
    {
        $result=Studentapply::orderBy('id','DESC')->get();
        return view('admin.AdminCheckStudentApplication',compact('result'));
        
    }
    public function Viewtudentapplications($id)
    { 
        
        $StudID=Crypt::decrypt($id);
        $fetchStudent=Studentapply::findorfail($StudID);
       // dd(json_decode($fetchStudent->collage));
        //$fetchStudent=Studentapply::where('id',$StudID)->first();
       // dd($Studentresult[0]->VCH_Application_id);
       $st_result[]=json_decode($fetchStudent->collage);
       $st_result[]=json_decode($fetchStudent->vch_academicinformation);
       $st_result[]=json_decode($fetchStudent->yaerofpassing);
       $st_result[]=json_decode($fetchStudent->specialization);  
       $st_result[]=json_decode($fetchStudent->university);
       $st_result[]=json_decode($fetchStudent->address);
       
       
       //dd($st_result);
       $length = count($st_result[0]);
        //dd($length);
     
        for ($i = 0; $i < $length; $i++) {
            $temp = [];
           
            foreach ($st_result as $array) {
                $temp[] = $array[$i];
            }

            $result[] = $temp;
            //dd($result);
        }
        return view('admin.AdminStudentapplicationView',compact('fetchStudent','result'));
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
        //dd($getStudentdata);
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


        $getdata1=Studentapply::where('id', $acpt_id)->first();
        //dd($getdata1);
        //dd($getdata1->vch_membershipno);
        //Data for pdf
        $pdf_membercode=$getdata1->vch_membershipno;
        $pdf_email=$getdata1->vch_emailid;
        $pdf_fullname=$getdata1->vch_fname .' '. $getdata1->vch_mname .' '. $getdata1->vch_lname;
        $pdf_collagename=json_decode($getdata1->collage)[0];
        $pdf_dateofissue=$getdata1->DT_updatedon;

        //dd($pdf_membercode);

        //----Start-----Insert In Payment Table//
        $insertPaymentTable=new PaymentTransaction;
        $insertPaymentTable->INT_USER_id= $last_id;
        $insertPaymentTable->INT_paymentmode=$getdata->INT_paymentmode;
        $insertPaymentTable->INT_Payment_type=$getdata->INT_Payment_type;
        $insertPaymentTable->vch_transactionID=$getdata->vch_transactionID;
        $insertPaymentTable->vch_fee=$getdata->vch_fee;
        $insertPaymentTable->INT_paymentstatus=$getdata->Int_payment_status;
        $insertPaymentTable->save();

        

        
        //dd(count($getStudentdata));
        $this->generatePDF($pdf_email, $pdf_membercode, $pdf_fullname, $pdf_collagename, $pdf_dateofissue);
        


        notify()->success('Student approved Successfully');
        return redirect('/studentapplications');
        //return view('admin.pdf',compact('getdata'));
    }
    public function generatePDF($pdf_email, $pdf_membercode, $pdf_fullname, $pdf_collagename, $pdf_dateofissue){
        // $data["email"]=$request->get("kprasant635@gmail.com");
        // $data["client_name"]=$request->get("prasant");
        // $data["subject"]=$request->get("testing");

        $data = [ 'email'=>$pdf_email, 'member_code' => $pdf_membercode , 'full_name' => $pdf_fullname, 'c_name' => $pdf_collagename, 'dateof_issue' => $pdf_dateofissue];

        $pdf = FacadePdf::loadView('admin.pdf',$data);
 
        try{
            $user['to']=$data["email"];
            FacadesMail::send('mail.test', $data, function($message)use($pdf,$user) {
            $message->to( $user['to'])
            // FacadesMail::send('mail.otp', $data, function ($messages) use ($user) {
            //     $messages->to($user['to']);
            //  ->subject("member code")
             ->attachData($pdf->output(), "studentcard.pdf");
             $message->subject('Student Card');
            });
            // FacadesMail::send('emails.activation', $data, function($message) use ($email, $subject) {
            //     $message->to($email)->subject($subject);
            // });
        }catch(JWTException $exception){
            $this->serverstatuscode = "0";
            $this->serverstatusdes = $exception->getMessage();
        }
        if (FacadesMail::failures()) {
             $this->statusdesc  =   "Error sending mail";
             $this->statuscode  =   "0";
 
        }else{
 
           $this->statusdesc  =   "Message sent Succesfully";
           $this->statuscode  =   "1";
        }
        return response()->json(compact('this'));
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
