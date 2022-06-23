<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\Gradingcommittee;
use App\Models\User;
use App\Models\AddBranch;
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

        $membership = Membership::orderBy('id','DESC')->get();
        return view('membership.membership',compact('membership'));
    }
    public function ViewMembershipapplications($id)
    {
        $MembID=Crypt::decrypt($id);
        $fetchMember=Membership::findorfail($MembID);

        $st_result[]=json_decode($fetchMember->collage);
        $st_result[]=json_decode($fetchMember->vch_academicinformation);
        $st_result[]=json_decode($fetchMember->yearofpassing);
        $st_result[]=json_decode($fetchMember->specialization);  
        $st_result[]=json_decode($fetchMember->university);
        $st_result[]=json_decode($fetchMember->address);

        $length = count($st_result[0]);
        //dd($length);
     
        for ($i = 0; $i < $length; $i++) 
        {
            $temp = [];
           
            foreach ($st_result as $array) {
                $temp[] = $array[$i];
            }
            $result[] = $temp;
            //dd($result);
        }


        $prof_information[]=json_decode($fetchMember->vch_organisationname);
        //dd($prof_information);
        $prof_information[]=json_decode($fetchMember->vch_fromdate);
        $prof_information[]=json_decode($fetchMember->vch_todate);
        $prof_information[]=json_decode($fetchMember->vch_designation);
        $prof_information[]=json_decode($fetchMember->vch_jobdescription);

        $prof_length=count($prof_information[0]);
        for($i=0;$i<$prof_length;$i++)
        {
            $tempVar = [];
            foreach ($prof_information as $Profarray) {
                $tempVar[] = $Profarray[$i];
            }
            $professionalresult[] = $tempVar;
        }


        $award_name[]=json_decode($fetchMember->vch_awardsname);
        //dd($prof_information);

        $award_length=count($award_name[0]);
        for($i=0;$i<$award_length;$i++)
        {
            $tempAwardsVar = [];
            foreach ($award_name as $Awardarray) {
                $tempAwardsVar[] = $Awardarray[$i];
            }
            $awardsresult[] = $tempAwardsVar;
        }
        return view('admin.AdminMemberApplicationView',compact('fetchMember','result','professionalresult','awardsresult'));
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

        
        $post->int_grading_level =$mbr_id;
        $post->INT_user_id =$last_id;
        $post->vch_membership_no ="G-".$post->id;;
        $mem_code = $post->vch_membership_no;
        $post->Int_payment_status =1;
        $post->vch_dateofissue =date('Y-m-d H:i:s');
        $post->Int_approve_status = $new_member_approved_id;
        $post->DT_updatedon = now();
        $post->update();

        $last_fname=$post->vch_firstname;
        $last_mname=$post->vch_middlename;
        $last_lname=$post->vch_lastname;
        $last_collagename=json_decode($post->collage)[0];
        $last_memberID=$post->vch_membership_no;
        $last_dateofissue=$post->DT_updatedon;

        //dd($last_memberID);

        $insertPaymentTable=new PaymentTransaction;
        $insertPaymentTable->INT_USER_id= $last_id;
        $insertPaymentTable->INT_paymentmode=$post->INT_paymentmode;
        $insertPaymentTable->INT_Payment_type=$post->INT_Payment_type;
        $insertPaymentTable->vch_transactionID=$post->vch_transactionID;
        $insertPaymentTable->vch_fee=$post->vch_fee;
        $insertPaymentTable->INT_paymentstatus=$post->Int_payment_status;
        $insertPaymentTable->save();




        $this->generatePDF( $mem_email, $last_fname, $last_mname, $last_lname, $last_collagename,$last_memberID, $last_dateofissue);


        notify()->success('Member approved Successfully');
        
        return redirect()->back();  
       
    }

    // public function generatePDF($mem_code ,$mem_email,$password){
    public function generatePDF($mem_email, $last_fname, $last_mname, $last_lname, $last_collagename, $last_memberID, $last_dateofissue){
        // $data["email"]=$request->get("kprasant635@gmail.com");
        // $data["client_name"]=$request->get("prasant");
        // $data["subject"]=$request->get("testing");

        $data = ['email'=>$mem_email, 'f_name' => $last_fname, 'm_name' => $last_mname, 'l_name' => $last_lname, 'c_name'=>$last_collagename, 'membercode'=> $last_memberID, 'dateissue'=>$last_dateofissue];

        $pdf = FacadePdf::loadView('mail.student_id',$data);
 
        try{
            $user['to']=$data["email"];
            FacadesMail::send('mail.test', $data, function($message)use($pdf,$user) {
            $message->to( $user['to'])
            // FacadesMail::send('mail.otp', $data, function ($messages) use ($user) {
            //     $messages->to($user['to']);
            //  ->subject("member code")
             ->attachData($pdf->output(), "membershipcard.pdf");
             $message->subject('Membership Card');
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
    public function membershipform()
    {

        $result = AddBranch::all();
        return view('frontend.membershipform',compact('result'));
    }

    public function membershipinsert_data(Request $request)
    {
        //dd($request->all());
        // dd($request->data1[0]['cqualificationtxtt1']);
       // dd(json_encode($request->data['cqualificationtxtt']));
        //

       
        $count=count($request->data);
       

        for($i=0;$i<$count;$i++)
        {

        $cqualificationtxt[]=$request->data[$i]['cqualificationtxtt'];
        $collagetxt[]=$request->data[$i]['collagetxt'];
        $addresstxt[]=$request->data[$i]['addresstxt'];
        $universitytxt[]=$request->data[$i]['universitytxt'];
        $yaerofpassingtxt[]=$request->data[$i]['yaerofpassingtxt'];
        $specializationtxt []=$request->data[$i]['specializationtxt'];
       
        }

        $count2=count($request->data1);
     
        for($j=0;$j<$count2;$j++)
        {

        $organisationtxt[]=$request->data1[$j]['organisationtxt'];
        $orga_fromtxt[]=$request->data1[$j]['orga_fromtxt'];
        $orga_totxt[]=$request->data1[$j]['orga_totxt'];
        $orga_desig[]=$request->data1[$j]['orga_desig'];
        $orga_jobdesc[]=$request->data1[$j]['orga_jobdesc'];
        }
        
        $countawards=count($request->awards);
     
        for($k=0;$k<$countawards;$k++)
        {
            $VARawardsname[]=$request->awards[$k]['awardsname'];
        }

       


        $insertData=new Membership;

        $file = $request->file('filenameuploadphoto');
        $extenstion = $file->getClientOriginalExtension();
        $filename = time().'.'.$extenstion;
        $file->move('Upload_DBImage/', $filename);
        $insertData->vch_profile_photo = $filename; 


        $file1 = $request->file('fileupload1');
        $extenstion1 = $file1->getClientOriginalExtension();
        $filename1 = time().'.'.$extenstion1;
        $file1->move('Upload_DBImage/', $filename1);
        $insertData->vch_document1file = $filename1; 


        $file2 = $request->file('fileupload2');
        $extenstion2 = $file2->getClientOriginalExtension();
        $filename2 = time().'.'.$extenstion2;
        $file2->move('Upload_DBImage/', $filename2);
        $insertData->vch_document2file = $filename2; 


        $file3 = $request->file('signaturefileupload');
        $extenstion3 = $file3->getClientOriginalExtension();
        $filename3 = time().'.'.$extenstion3;
        $file3->move('Upload_DBImage/', $filename3);
        $insertData->vch_sign = $filename3; 
        
        $randomNO=rand(111111,999999);
        $ApplicationRandomNO="APLID-". $randomNO;
        $insertData->VCH_Application_id=$ApplicationRandomNO;

        $insertData->vch_firstname=$request->applicant_name;
        $insertData->vch_middlename=$request->middle_name;
        $insertData->vch_lastname=$request->last_name;
        $insertData->vch_gender=$request->genderddl;
        $insertData->vch_phone1=$request->mobiletxt;
        $insertData->vch_phone2=$request->mobile2txt;
        $insertData->vch_dob=$request->dobtxt;
        $insertData->vch_emailid=$request->emailtxt;
        $insertData->vch_membersociety=$request->memberofanysecoetytxt;
        $insertData->vch_contactaddress=$request->caddresslinetxt.','.$request->ccountrytxt.','.$request->cstatetxt.','.$request->ccitytxt.','.$request->cpostalcodetxt;
        $insertData->vch_permanentaddress=$request->plinetxt. ',' .$request->plinetxt.',' .$request->pstatetxt .',' .$request->pcitytxt.','.$request->ppostalcodetxt;
        //$insertData->vch_academicinformation=$request->
        $insertData->int_memberid=$request->membershiptxt;
        $insertData->vch_fee=$request->feetxt;
        $insertData->vch_document1name=$request->uploaddoc1txt;
        $insertData->vch_document2name=$request->uploaddoc2txt;
        $insertData->int_branch_id=$request->branchddl;
        $insertData->INT_paymentmode=$request->paymenttypeddl;



        $insertData->INT_pro1_userid=$request->pro_name1;
        $insertData->vch_1propersormembernom=$request->pro_number1;
        $insertData->vch_1emailid=$request->pro_email1;


        $insertData->INT_pro2_userid=$request->pro_name2;
        $insertData->vch_2propersormembernom=$request->pro_number2;
        $insertData->vch_2emailid=$request->pro_email2;
        $insertData->INT_Payment_type=$request->paymenttypeddl;



    


        //$insertData->vch_academicinformation=$request->cqualificationtxtt;



        $insertData->vch_academicinformation=json_encode($cqualificationtxt);
        $insertData->collage=json_encode($collagetxt);
        $insertData->address=json_encode($addresstxt);
        $insertData->university=json_encode($universitytxt);
        $insertData->yearofpassing=json_encode($yaerofpassingtxt);
        $insertData->specialization=json_encode($specializationtxt);


        $insertData->vch_organisationname=json_encode($organisationtxt);
        $insertData->vch_fromdate=json_encode($orga_fromtxt);
        $insertData->vch_todate=json_encode($orga_totxt);
        $insertData->vch_designation=json_encode($orga_desig);
        $insertData->vch_jobdescription=json_encode($orga_jobdesc);

        $insertData->vch_awardsname=json_encode($VARawardsname);







       
      
        //dd($insertData);
        $insertData->save();
        
        notify()->success('Your detail has been successfully Submited');
        return redirect()->back();
    }

    //Accept Offline payment for Member
    public function Acceptofflinepayment(Request $request)
    {
        $updateData=Membership::where('id',$request->id)->update([
            'Int_payment_status'=>1,
            'INT_PaymentOffline__type'=>$request->paymenttypetxt,
            'vch_transactionID'=>$request->chequeddnotxt,
            'vch_fee'=>$request->amounttxt
        ]);
        notify()->success('Offline Payment update Successfully');
        return redirect()->back();
    }

    public function temp()
    {

       
        
      return view('mail.student_id');
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
