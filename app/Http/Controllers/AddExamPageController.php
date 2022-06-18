<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddExamPage;
use Illuminate\Support\Facades\Crypt;

class AddExamPageController extends Controller
{
    public function createexampage()
    {
        $result=AddExamPage::orderBy('id','DESC')->get();
        return view("admin.AdminAddExampages",compact('result'));
    }
    public function createexampagesPOSTINS(Request $request)
    {
        $post= new AddExamPage;
        $post->vch_category=$request->categoryddl;
        $post->vch_title=$request->titletxt;
        
        $file = $request->file('pdffileupload');
        $extenstion = $file->getClientOriginalExtension();
        $filename = time().'.'.$extenstion;
        $file->move('Upload_DBImage/', $filename);
        $post->vch_upload_pdf = $filename; 

        $post->save();
        notify()->success('Document upload successfully');
        return redirect('/adddownloadpages');
    }
    public function createdownloadPOSTUDT(Request $request)
    {  
        $file = $request->file('UDTpdffileupload');
        $extenstion = $file->getClientOriginalExtension();
        $filename = time().'.'.$extenstion;
        $file->move('Upload_DBImage/', $filename);
        //$post->vch_image = $filename; 
        //dd($filename);
        $post=AddExamPage::where('id',$request->id)->update([
            'vch_category'=>$request->UDTcategoryddl,
            'vch_title'=>$request->UDTtitletxt,
            'vch_upload_pdf'=>$filename,
            'DT_updatedon'=>now()
        ]);
        
        notify()->success('Document updated successfully');
        return redirect('/adddownloadpages');
    }
    public function createdownloadPOSTDLT($id)
    {
        $resultID=Crypt::decrypt($id);
        $post=AddExamPage::where('id',$resultID)->delete();
        notify()->success('Document deleted successfully');
        return redirect('/adddownloadpages');
    }
}
