<?php
 
namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Mail;
 
use PDF;
 
class SendEmailController extends Controller
{
     
    public function generatePDF(Request $request){
        $data["email"]=$request->get("kprasant635@gmail.com");
        $data["client_name"]=$request->get("prasant");
        $data["subject"]=$request->get("testing");
 
        $pdf = FacadePdf::loadView('mail.student_id',$data);
 
        try{
            $s_mail=$data["email"];
            FacadesMail::send('mail.test', $data, function($message)use($data,$pdf) {
            $message->to('kprasant631@gmail.com', $data["client_name"])
             ->subject($data["subject"])
             ->attachData($pdf->output(), "invoice.pdf");
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
// public function generatePDF()
// {
//     $data = ['title' => 'Welcome to ItSolutionStuff.com'];
//     $pdf = PDF::loadView('mail.student_id', $data);

//     $send_pdf = $pdf->download('itsolutionstuff.pdf');
//     dd($pdf);
// }
}