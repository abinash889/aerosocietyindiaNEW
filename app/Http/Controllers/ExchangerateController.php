<?php

namespace App\Http\Controllers;

use App\Models\Exchangerate;
use Illuminate\Http\Request;
use App\Models\Currency;
use Illuminate\Support\Facades\Crypt;

class ExchangerateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createindex()
    {
        
        $currency = Currency::all();
        $exchangerate = Exchangerate::all();

        return view('admin.AdminCurrencyrate',compact('currency','exchangerate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function exchangetratestore(Request $request)
    {

        // dd($request->all());
        $currency = new Exchangerate;
        $currency->vch_basecurrency = $request->input('basecurrencyrate');
        $currency->vch_transactioncurrency = $request->input('trancurrencyrate');
        $currency->time_exchangedate = $request->input('exchangedate');
        $currency->INT_exchangerate = $request->input('currencyrate');   
        $currency->save();
        notify()->success('Currencyrate Added Sucessfully!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exchangerate  $exchangerate
     * @return \Illuminate\Http\Response
     */
    public function show(Exchangerate $exchangerate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exchangerate  $exchangerate
     * @return \Illuminate\Http\Response
     */
    public function edit(Exchangerate $exchangerate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exchangerate  $exchangerate
     * @return \Illuminate\Http\Response
     */
    public function exchangetrate(Request $request, $id)
    {

        
        $currency = Exchangerate::find($id);
         $exchnage_id = Exchangerate:: where('id',$id)->get('vch_transactioncurrency');
        //  dd($country_id);
       // dd( $exchnage_id[0]->vch_transactioncurrency);
        $currency->vch_basecurrency = $request->input('basecurrencyrate');
        $currency->vch_transactioncurrency = $exchnage_id[0]->vch_transactioncurrency;
        $currency->time_exchangedate = $request->input('udtcurrencydate');
        $currency->INT_exchangerate = $request->input('udtcurrencyrate'); 
        $currency->updated_at = now();
        $currency->update();
        notify()->success('Currency updated Sucessfully!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exchangerate  $exchangerate
     * @return \Illuminate\Http\Response
     */
    public function destroyrate($id)
    {
        $currency=Crypt::decrypt($id);
        $dlt_currency = Exchangerate::find($currency);
        $dlt_currency->delete();
        notify()->success('Currencyrate Deleted Sucessfully!');
        return redirect()->back();
    }
}
