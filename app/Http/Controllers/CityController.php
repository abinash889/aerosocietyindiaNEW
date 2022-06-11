<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\State;
use Illuminate\Support\Facades\Crypt;

class CityController extends Controller
{
    public function createCity()
    {
        $statefetch=State::all();
        $citydetailfetch=City::orderBy('id','DESC')->get();
        return view('admin.AdminCity',compact('statefetch','citydetailfetch'));
    }
    public function createCityPostIns(Request $request)
    {
        $validated = $request->validate([
            'Stateddl' => 'required',
            'Citycodetxt' => 'required',
            'Citynametxt' => 'required',
            // 'Statestatusddl' => 'required',
        ],
        [
            'Stateddl.required' => 'Please select city',
            'Citycodetxt.required' => 'Please enter city code',
            'Citynametxt.required' => 'Please enter city name'
            // 'Statestatusddl.required' => 'Please select status'
        ]);

        $post=new City;
        $post->INT_StateID=$request->Stateddl;
        $post->vch_citycode=$request->Citycodetxt;
        $post->vch_cityname=$request->Citynametxt;
        $post->vch_status=$request->Citystatusddl;

        $post->save();
        notify()->success('City added sucessfully!');
        return redirect('/addcity');
    }
    public function createCityPostUDT(Request $request)
    {
        //dd($request->udtStateddl);
        $post=City::where('id',$request->id)->update([
            'INT_StateID'=>$request->udtStateddl,
            'vch_citycode'=>$request->udtCitycodetxt,
            'vch_cityname'=>$request->udtCitynametxt,
            'vch_status'=>$request->udtCitystatusddl,
            'DT_updatedon'=>now()
        ]);
        
        notify()->success('City updated successfully');
        return redirect('/addcity');
    }
    public function createCityPOSTDLT($id)
    {
        $cty_id=Crypt::decrypt($id);
        $post=City::where('id',$cty_id)->delete();
        notify()->success('City deleted Successfully');
        return redirect('/addcity');
    }

    public function citydlt(Request $request,$id){

        $post=City::where('id',$request->id)->delete();

        return response()->json([
            "status"=>200,
            "message"=>"Delete Succefully",
            "data"=>$post
        ]);

    }

    public function citycreate(Request $request){

        $post=new City;
        $post->INT_StateID=$request->stateId;
        $post->vch_citycode=$request->citycode;
        $post->vch_cityname=$request->cityname;
        $post->vch_status=$request->citystatus;
        $post->save();

        return response()->json([
            "status"=>200,
            "message"=>"Inserted Succefully",
            "data"=>$post
        ]);

    }
    public function cityudt(Request $request,$id){

        $post = City::find($id);
       
        $post->INT_StateID = $request->input('stateId');
        $post->vch_citycode = $request->input('citycode'); 
        $post->vch_cityname = $request->input('cityname');
        $post->vch_status=$request->input('citystatus');
        $post->update();

        return response()->json([
            "status"=>200,
            "message"=>"updated Succefully",
            "data"=>$post
        ]);

    }
}
