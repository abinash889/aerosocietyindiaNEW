<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddBranchGallery;
use Auth;

class BranchGalleryController extends Controller
{
    public function createbranchgallery()
    {
        $result=AddBranchGallery::orderBy('id','DESC')->get();
        return view("branch.BranchAddGallery",compact('result'));
    }
    public function AcceptImageByAdmin(Request $request)
    {

       $result= AddBranchGallery::where('id',$request->image_id)->get('INT_approvestatus');
       $status=json_decode($result[0]->INT_approvestatus);
   
       $count=count($request->acceptimg);
       for($i=0;$i<$count;$i++){
            $val=$request->acceptimg[$i];
            $status[$val]=1;
       }
        $image_status=json_encode($status);
         $post=AddBranchGallery::where('id',$request->image_id)->update([
        'INT_approvestatus'=>$image_status,
        'DT_updatedon'=>now()
        ]);
        notify()->success('Approved Successfully');
        return redirect('/approvebranchgallery');
    }
    public function createbranchgalleryPOSTINS(Request $request)
    {
        $session_id = Auth::user()->id;
        $count=count($request->uploadgalleryfileUpload);
        //dd($count);
        for($i=0;$i<$count;$i++)
        {
            $extenstion = $request->uploadgalleryfileUpload[$i]->getClientOriginalExtension();
            $filename = rand().'.'.$extenstion;
            $request->uploadgalleryfileUpload[$i]->move('Upload_DBImage/', $filename);
            $images[]=$filename;
            $app_status[]=0;
        }

        $post= new AddBranchGallery;
        $post->Branch_ID=$session_id;
        $post->vch_title=$request->gallerytitletxt;
        $post->vch_image=json_encode($images);
        $post->INT_approvestatus=json_encode($app_status);
        $post->save();
        notify()->success('Your images are under approval. Once its approved, It will automatically visible to all');
        return redirect('/addbranchgallery');
    } 
    public function createbranchgalleryPOSTUDT(Request $request)
    {
        $session_id = Auth::user()->id;

        $count=count($request->UDTuploadgalleryfileUpload);
        // dd($count);
        for($i=0;$i<$count;$i++)
        {
            $extenstion = $request->UDTuploadgalleryfileUpload[$i]->getClientOriginalExtension();
            $filename = rand().'.'.$extenstion;
            $request->UDTuploadgalleryfileUpload[$i]->move('Upload_DBImage/', $filename);
            $images[]=$filename;
        } 
        
        $post=AddBranchGallery::where('id',$request->id)->update([
            'vch_title'=>$request->UDTgallerytitletxt,
            'vch_image'=>json_encode($images),
            'INT_approvestatus'=>0,
            'DT_updatedon'=>now()
        ]);
        
        notify()->success('Your images are under approval. Once its approved, Its automatically visible to all');
        return redirect('/addbranchgallery');
    }
}
