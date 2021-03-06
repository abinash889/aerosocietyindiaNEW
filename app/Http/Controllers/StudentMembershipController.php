<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddBranch;
use App\Models\Studentapply;
use Illuminate\Support\Facades\File;

class StudentMembershipController extends Controller
{
    public function studentmembershipinsert()
    {
        $result=AddBranch::orderBy('id','DESC')->get();
        return view("frontend.StudentMembershipForm",compact('result'));
    }
    public function studentmembershipinsert_data(Request $request)
    {

       // dd(json_encode($request->data['cqualificationtxtt']));
        //dd($request->data);

       
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
        

       


        $insertData=new Studentapply;

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

        $insertData->vch_fname=$request->applicant_name;
        $insertData->vch_mname=$request->middle_name;
        $insertData->vch_lname=$request->last_name;
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
        //$insertData->vch_academicinformation=$request->cqualificationtxtt;



        $insertData->vch_academicinformation=json_encode($cqualificationtxt);
        $insertData->collage=json_encode($collagetxt);
        $insertData->address=json_encode($addresstxt);
        $insertData->university=json_encode($universitytxt);
        $insertData->yaerofpassing=json_encode($yaerofpassingtxt);
        $insertData->specialization=json_encode($specializationtxt);







       
      
        //dd($insertData);
        $insertData->save();
        
        notify()->success('Your detail has been successfully Submited');
        return redirect('/student-membership');
    }
}
