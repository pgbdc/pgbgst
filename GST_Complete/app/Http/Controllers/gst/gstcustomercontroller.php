<?php

namespace App\Http\Controllers\gst;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\gstcustomermaster;


class gstcustomercontroller extends Controller
{
    //
    
  public function index()
  {
		 Session::put('brcode','5031');
    Session::put('userid','01328');
    return view('gstviews.gstcustomer');  
   
  }
    public function create(Request $request)
  {
			
    $userid=Session::get('userid');
    $brcode=Session::get('brcode');
		
		
		
		   
  $errmsg=['cust_name.required'=>'Name is mandatory and must contain only alphabets/spaces/period',
			       'gst_num.*'=>'GST number is mandatory and must be alpha numeric',
					   'pan.*'=>'PAN is mandatory and must be alpha numeric and 10 digits',
						'addr_bus.required'=>'Address is mandatory',
						'city_bus.required'=>'city is mandatory and must be only characters',
						'pin_bus.*'=>'Pin is mandatory and must be 6 digits',
						'type_person.required'=>'Please choose a person type',
						'type_bus.required'=>'Please choose a Business type',
					  'cont_mobile.integer'=>'Please enter valid Mobile number',
			];
		
						$this->validate($request, [
						'cust_name' => 'required|regex:/^[a-zA-Z][a-zA-Z \.]+$/',
						'gst_num' => 'required|AlphaNum',
						'pan' =>	'required|AlphaNum|Min:10|Max:10',
						'addr_bus' => 'required',
						'city_bus' => 'required|alpha',
						'pin_bus' => 'required|numeric|digits:6',
						'type_bus'=>'required',
						'type_person'=>'required',
						'cont_mobile'=> 'integer|regex:/^[7-9][0-9]{9}$/',
						],$errmsg);
		
		
		  $customer_name=$request->input('cust_name');
			 $gstn_num=$request->input('gst_num');
		   $pan=$request->input('pan');
		   $addr=$request->input('addr_bus');
			 $city=$request->input('city_bus');
			 $pin=$request->input('pin_bus');
			 $add_addr=$request->input('add_addr_bus');
			 $add_city=$request->input('add_city_bus');
			 $add_pin=$request->input('add_pin_bus');
			 $person_type=$request->input('type_person');
			 $bus_type=$request->input('type_bus');
		   			if($bus_type=='other'){
					 $business_type=$request->input('othertype');
				
				}
					else{
							$business_type=$request->input('type_bus');
					}
						 $special_status=$request->input('type_special');
					if($special_status=='none'){
						 $forms_decl="";
					}
					else{
						 $forms_decl=$request->input('appr_status');
					}
		  
			 $contact_name=$request->input('cont_name');
			 $contact_desg=$request->input('cont_desg');
			 $contact_addr=$request->input('cont_addr');
			 $contact_phone=$request->input('cont_mobile');
			 $contact_email=$request->input('cont_email');
				
		    $br_dep_cd=$brcode;
				$ent_by=$userid;
				$ent_dt_time=Carbon::now();
		
		
		gstcustomermaster::create(['customer_name'=>$customer_name,'gstn_num'=>$gstn_num,
														'pan'=>$pan,'addr'=>$addr,'city'=>$city,'pin'=>$pin,
														'add_addr'=>$add_addr,'add_city'=>$add_city,'add_pin'=>$add_pin,
														'person_type'=>$person_type,'business_type'=>$business_type,
														'special_status'=>$special_status,'forms_decl'=>$forms_decl,
														'contact_name'=>$contact_name,'contact_desg'=>$contact_desg,
														'contact_addr'=>$contact_addr,'contact_phone'=>$contact_phone,
														'contact_email'=>$contact_email,'br_dep_cd'=>$br_dep_cd,
														'ent_by'=>$ent_by,'ent_dt_time'=>$ent_dt_time,
														]);
		
      Session::flash('flash_message',"Customer Details Added Successfully");
		  return redirect('/gstcustomer');
		
		
  }
}
