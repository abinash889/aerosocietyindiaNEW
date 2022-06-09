<?php

namespace App\Http\Controllers;

use App\Models\CourseSyllabus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Crypt;

class CourseSyllabusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewCourse()
    {
        $result=CourseSyllabus::orderBy('id','DESC')->get();
        return view('course.addcourse',compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCourse(Request $request)
    {
            // dd($request->all());
            $post=new CourseSyllabus;
            $post->vch_title=$request->Coursename;
            $post->Int_catagories=$request->yeartxt;
            $post->vch_description=$request->syllabusdetailstxt;
    
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('Upload_DBImage/', $filename);
            $post->vch_image = $filename; 

            $file1 = $request->file('pdffile');
            $extenstion1 = $file1->getClientOriginalExtension();
            $filename1 = time().'.'.$extenstion1;
            $file1->move('Upload_DBImage/', $filename1);
            $post->vch_pdf = $filename1;
           
            $post->save();
            notify()->success('Courses Added Successfully');
            return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_Courses(Request $request)
    {
        //dd($request->all());
        $post1=CourseSyllabus::find($request->id);
        $post1->vch_title=$request->udtCoursename;
        $post1->Int_catagories=$request->udtyeartxt;
        $post1->vch_description=$request->udtsyllabusdetailstxt;
        $post1->updated_at= now();
         
        // dd($request->id);
        if ($request->hasfile('udtimage')) {
            $destination = 'Upload_DBImage/' . $post1->vch_image;
            if (File::exists($destination)) {
            File::delete($destination);
            }
            $file = $request->file('udtimage');
        $extenstion = $file->getClientOriginalExtension();
        $filename = time().'.'.$extenstion;
        $file->move('Upload_DBImage/', $filename);
        $post1->vch_image =$filename;
            
            }
           
        if ($request->hasfile('udtpdffile')) {
            $destination1 = 'Upload_DBImage/' . $post1->vch_pdf;
            if (File::exists($destination1)) {
            File::delete($destination1);
            }
            $file1 = $request->file('udtpdffile');
        $extenstion1 = $file1->getClientOriginalExtension();
        $filename1 = time().'.'.$extenstion1;
        $file1->move('Upload_DBImage/', $filename1);
        $post1->vch_pdf = $filename1;
            
            }
              $post1->save();
        notify()->success('Courses updated Sucessfully!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourseSyllabus  $courseSyllabus
     * @return \Illuminate\Http\Response
     */
    public function dlt_Courses($id)
    {
        

        $dtl_id=Crypt::decrypt($id);
        $post = CourseSyllabus::find($dtl_id);
        $post->delete();

        notify()->success('Course deleted Successfully');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourseSyllabus  $courseSyllabus
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseSyllabus $courseSyllabus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseSyllabus  $courseSyllabus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseSyllabus $courseSyllabus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseSyllabus  $courseSyllabus
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseSyllabus $courseSyllabus)
    {
        //
    }
}
