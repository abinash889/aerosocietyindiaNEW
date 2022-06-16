<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\Gradingcommittee;
use App\Models\User;
use App\Models\PaymentTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;

use Illuminate\Support\Facades\Mail as FacadesMail;
use Mail;
 
use PDF;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $membership = Membership::all();
      return view('membership.membership',compact('membership'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Approvedmember(Request $request,$id)
    {   
    
        $membership = Gradingcommittee::all();
        $aprv_id=Crypt::decrypt($id);
       // dd($aprv_id);
        $member_id=Membership::where('id',$aprv_id)->first();
       
        $level_id=Gradingcommittee::where('INT_user_id',$member_id->int_grading_level)->first('INT_level');
        //dd($level_id->INT_level);
        if($level_id->INT_level!=6){
        $new_member_id=Gradingcommittee::where('INT_level',$level_id->INT_level+1)->first('INT_user_id');
        $mbr_id=$new_member_id->INT_user_id ;
        }
        else{
            $mbr_id=0;
        }
        $new_member_approved_id=$member_id->Int_approve_status+2;
        // dd($new_member_approved_id);
        $post = Membership::find($aprv_id);
        $post->int_grading_level =$mbr_id;
        $post->Int_approve_status = $new_member_approved_id;
        $post->update();

        notify()->success('Member approved Successfully');
        
        return redirect()->back();  
       
    }

    public function Approvedmember_user(Request $request,$id)
    {   
        // $student = User::all();
        // dd($student);
        $membership = Gradingcommittee::all();
        $aprv_id=Crypt::decrypt($id);
       // dd($aprv_id);
        $member_id=Membership::where('id',$aprv_id)->first();
       
        $level_id=Gradingcommittee::where('INT_user_id',$member_id->int_grading_level)->first('INT_level');
        //dd($level_id->INT_level);
        if($level_id->INT_level!=6){
        $new_member_id=Gradingcommittee::where('INT_level',$level_id->INT_level+1)->first('INT_user_id');
        $mbr_id=$new_member_id->INT_user_id ;
        }
        else{
            $mbr_id=0;
        }
        $new_member_approved_id=$member_id->Int_approve_status+2;

        $member_user = new User;
        $post = Membership::find($aprv_id);
        // dd($post->id);
        $password = '444333';
        // $random=rand(111111,999999);
        $hashedPassword = Hash::make($password);
        $member_user->name = $post->vch_firstname;
        $member_user->gender = $post->vch_gender;
        $member_user->password = $hashedPassword;
        $mem_pwd = $member_user->password;
        $member_user->vch_usertype = 'member';
        $member_user->vch_membership_no = "G-".$post->id;
        $member_user->email = $post->vch_emailid;
        $mem_email= $member_user->email;
    //    dd($member_user->name,
    //    $member_user->gender,
    //    $member_user->password,
    //    $member_user->email);
          $member_user->save();
        // dd($new_member_approved_id);
        $last_id=$member_user->id;
        // dd($last_id);
        $post->int_grading_level =$mbr_id;
        $post->INT_user_id =$last_id;
        $post->vch_membership_no ="G-".$post->id;;
        $mem_code = $post->vch_membership_no;
        $post->Int_payment_status =1;
        $post->vch_dateofissue =date('Y-m-d H:i:s');
        $post->Int_approve_status = $new_member_approved_id;
        $post->DT_updatedon = now();
        $post->update();

        $insertPaymentTable=new PaymentTransaction;
        $insertPaymentTable->INT_USER_id= $last_id;
        $insertPaymentTable->INT_paymentmode=$post->INT_paymentmode;
        $insertPaymentTable->INT_Payment_type=$post->INT_Payment_type;
        $insertPaymentTable->vch_transactionID=$post->vch_transactionID;
        $insertPaymentTable->vch_fee=$post->vch_amount;
        $insertPaymentTable->INT_paymentstatus=$post->Int_payment_status;
        $insertPaymentTable->save();




        $this->generatePDF( $mem_code ,$mem_email,$password,'abinash889@gmail.com');


        notify()->success('Member approved Successfully');
        
        return redirect()->back();  
       
    }

    public function generatePDF($mem_code ,$mem_email,$password){
        // $data["email"]=$request->get("kprasant635@gmail.com");
        // $data["client_name"]=$request->get("prasant");
        // $data["subject"]=$request->get("testing");

        $data = [ 'mem_code' => $mem_code , 'email' => $mem_email, 'pwd' => $password];

        $pdf = FacadePdf::loadView('mail.student_id',$data);
 
        try{
            $s_mail=$data["email"];
            FacadesMail::send('mail.test', $data, function($message)use($pdf) {
            $message->to('kprasant631@gmail.com')
            // FacadesMail::send('mail.otp', $data, function ($messages) use ($user) {
            //     $messages->to($user['to']);
            //  ->subject("member code")
             ->attachData($pdf->output(), "invoice.pdf");
             $message->subject('Membership Details');
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Rejectedmember($id)
    {
        $rejc_id=Crypt::decrypt($id);
        $post = Membership::find($rejc_id);
        //dd($post->Int_approve_status);
        $post = Membership::find($rejc_id);
        
        $reject_id=$post->Int_approve_status;
        // dd($reject_id);
        $member_rejected_id=$reject_id + 1;
        //dd($member_rejected_id);
        
        $post->Int_approve_status =  $reject_id+1;
        $post->INT_refund_status =  1;
        $post->DT_updatedon = now();
        //dd($post->vch_rejectedby);
        $post->update();

        

        notify()->success('Member Rejected Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function show(Membership $membership)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function edit(Membership $membership)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Membership $membership)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function destroy(Membership $membership)
    {
        //
    }
}
