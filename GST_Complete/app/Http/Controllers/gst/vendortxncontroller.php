<?php

namespace App\Http\Controllers\gst;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\gstvendortxn;
use Carbon\Carbon;

class vendortxncontroller extends Controller
{
    //
  public function index(){
     Session::put('brcode','5031');
    Session::put('userid','01328');
     return view('gstviews.vendortxn');  
  }
  
  public function create(Request $request){
    $userid=Session::get('userid');
    $brcode=Session::get('brcode');
		
		 $errmsg=['reg_vendor.required'=>'Please choose whether Registered vendor ',
			       'gst_num.*'=>'GST number must be alpha numeric',
			       'invoice_no.required'=>'Invoice numberis mandatory',
						'invoice_dt.required'=>'Invoice date is mandatory',
						'payment_dt.required'=>'Payment date is mandatory',
						'purpose.required'=>'Purpose is mandatory',
						'narration.required'=>'narration is mandatory',
						'tot_amt.*'=>'Total amount is mandatory and must be only numeric',
						'tax_amt.*'=>'Tax amount is mandatory and must be only numeric',
						'tax.*'=>'Tax value is mandatory and must be only numeric',
						'sgst.*' => 'SGST value must be numeric ',
						'cgst.*' => 'CGST value must be numeric ',
						'igst.*' => 'IGST value must be numeric ',
						];
		
			$this->validate($request, [
			'reg_vendor' => 'required',
			'gst_num' => 'AlphaNum',
			'invoice_no'	=>'required',
			'invoice_dt' =>	'required',
			'payment_dt' =>	'required',
			'purpose' => 'required',
			'narration' => 'required',
		  'tot_amt' => 'required|numeric',
			'tax_amt' => 'required|numeric',
			'tax' => 'required|numeric',
			'sgst' => 'numeric',
			'cgst' => 'numeric',
			'igst' => 'numeric',
			],$errmsg);
		
		
		
	
	  $registered=$request->input('reg_vendor');
    $gstn_num=$request->input('gst_num');
	  $invoice_no=$request->input('invoice_no');
    $invoice_dt=$request->input('invoice_dt');
    $payment_dt=$request->input('payment_dt');
    $purpose=$request->input('purpose');
    $narration=$request->input('narration');
    $total_amount=$request->input('tot_amt');
    $taxable_amount=$request->input('tax_amt');
    $tax_amount=$request->input('tax');
    $sgst=$request->input('sgst');
    $cgst=$request->input('cgst');
    $igst=$request->input('igst');
    
    
	      $br_dep_cd=$brcode;
				$ent_by=$userid;
				 $ent_dt_time=Carbon::now();
				 
				 gstvendortxn::create([
      'registered'=>$registered,
      'gstn_num'=>$gstn_num,
	   'invoice_no'=>$invoice_no,
      'invoice_dt'=>$invoice_dt,
      'payment_dt'=>$payment_dt,
      'purpose'=>$purpose,
      'narration'=>$narration,
      'total_amount'=>$total_amount,
      'taxable_amount'=>$taxable_amount,
      'tax_amount'=>$tax_amount,
      'sgst'=>$sgst,
      'cgst'=>$cgst,
      'igst'=>$igst,
					 
      'ent_by'=>$ent_by,
           'br_dep_cd'=>$brcode,
           'ent_dt_time'=>$ent_dt_time,
			]);
		
      Session::flash('flash_message',"Vendor Transaction Details Added Successfully");
		  return redirect('/vendortxn');
  }
}
