<?php

namespace App\Http\Controllers\gst;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\gstcustomertxn;
use Session;


class customertxncontroller extends Controller
{
   public function index(){
     Session::put('brcode','5031');
    Session::put('userid','01328');
     return view('gstviews.customertxn');  
  }  
  
    public function create(Request $request){
    $userid=Session::get('userid');
    $brcode=Session::get('brcode');
			
			
			 $errmsg=['reg_customer.required'=>'Please choose whether Registered vendor ',
			       'gst_num.*'=>'GST number must be alpha numeric',
			       'invoice_no.required'=>'Invoice numberis mandatory',
	           	'payment_dt.required'=>'Payment date is mandatory',
							'purpose.required'=>'Purpose is mandatory',
							'narration.required'=>'narration is mandatory',
							'tot_amt.*'=>'Total amount is mandatory and must be only numeric',
							'tax_amt.*'=>'Tax amount is mandatory and must be only numeric',
							'tax.*'=>'Tax value is mandatory and must be only numeric',
							'sgst.*' => 'SGST value must be numeric ',
							'cgst.*' => 'CGST value must be numeric ',
		
						];
			$this->validate($request, [
			'reg_customer' => 'required',
			'gst_num' => 'AlphaNum',
			'invoice_no'	=>'required',
			'payment_dt' =>	'required',
			'purpose' => 'required',
			'narration' => 'required',
		  'tot_amt' => 'required|numeric',
				'tax_amt' => 'required|numeric',
				'tax' => 'required|numeric',
					'sgst' => 'numeric',
					'cgst' => 'numeric',
			
			],$errmsg);
		
					
			$registered=$request->input('reg_customer');
      $gstn_num=$request->input('gst_num');
	    $invoice_no=$request->input('invoice_no');
      $payment_dt=$request->input('payment_dt');
			$purpose=$request->input('purpose');
			$narration=$request->input('narration');
			$total_amount=$request->input('tot_amt');
			$taxable_amount=$request->input('tax_amt');
			$tax_amount=$request->input('tax');
			$sgst=$request->input('sgst');
			$cgst=$request->input('cgst');
  
      $br_dep_cd=$brcode;
				$ent_by=$userid;
				 $ent_dt_time=Carbon::now();
			
			gstcustomertxn::create([
      'registered'=>$registered,
      'gstn_num'=>$gstn_num,
	   'invoice_no'=>$invoice_no,
     'payment_dt'=>$payment_dt,
      'purpose'=>$purpose,
      'narration'=>$narration,
      'total_amount'=>$total_amount,
      'taxable_amount'=>$taxable_amount,
      'tax_amount'=>$tax_amount,
      'sgst'=>$sgst,
      'cgst'=>$cgst,
            'ent_by'=>$ent_by,
           'br_dep_cd'=>$brcode,
           'ent_dt_time'=>$ent_dt_time,
			]);
      
      Session::flash('flash_message',"Customer Transaction Details Added Successfully");
		  return redirect('/customertxn');
    }
}
