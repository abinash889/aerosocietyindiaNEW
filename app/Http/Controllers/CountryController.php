<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Support\Facades\Crypt;

class CountryController extends Controller
{
    public function createCountry()
    {
        $result=Country::orderBy('id','DESC')->get();
        return view('admin.AdminCountry',compact('result'));
    }
    public function createCountryPOSTIns(Request $request)
    {
        $validated = $request->validate([
            'countrycodetxt' => 'required',
            'countrynametxt' => 'required',
        ],
        [
            'countrycodetxt.required' => 'Please Enter Country code',
            'countrynametxt.required' => 'Please Enter Country name'
        ]);

        $post=new Country;
        $post->vch_countrycode=$request->countrycodetxt;
        $post->vch_countryname=$request->countrynametxt;
        $post->vch_status=$request->countrystatusddl;

        $post->save();
        notify()->success('Country added sucessfully!');
        return redirect('/addcountry');
    }
    public function createCountryPOSTUDT(Request $request)
    {
        $post=Country::where('id',$request->id)->update([
            'vch_countrycode'=>$request->Udtcountrycodetxt,
            'vch_countryname'=>$request->Udtcountrynametxt,
            'vch_status'=>$request->Udtcountrystatusddl,
            'DT_updatedon'=>now()
              ]);
        notify()->success('Country updated sucessfully!');
        return redirect('/addcountry');
    }
    public function createCountryPOSTDLT($id)
    {
        $cntry_id=Crypt::decrypt($id);
        $post=Country::where('id',$cntry_id)->delete();
        notify()->success('Country deleted sucessfully!');
        return redirect('/addcountry');
    }
    // public function all(Request $request){

    //     $post=new Country;
    //     $post->vch_countrycode=$request->countrycodetxt;
    //     $post->vch_countryname=$request->countrynametxt;
    //     $post->vch_status=$request->countrystatusddl;
    //     $post->save();

    //     return response()->json([
    //         "status"=>200,
    //         "message"=>"insert Succefull",
    //         "data"=>$post
    //     ]);

    // }
}
