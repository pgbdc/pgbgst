@extends('layouts.app')
@section('content')
<html>
  <head>
    <title>Customer Txn</title>
           <script src="http://ajax.aspnetcdn.com/ajax/jquery/jquery-1.8.0.js"></script>
           <script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.22/jquery-ui.js"></script>
        <script>
        $(document).ready(function(){
         
        $("#payment_dt").datepicker({
		    
						yearRange: "-100:+0",
						changeMonth: true,
						changeYear: true,
						numberOfMonths: 1,
            dateFormat: 'yy-mm-dd'
				});
          
       $('#reg_customer').change(function(){
				if($('#reg_customer').val()=='Y'){
         $('#gst_num').html(''); 
  			 $.getJSON("{{ url('/utils/getgstncustomerlist') }}",
       
                   function(data){
       						$.each(data, function(i, value) {
        
           	 $('#gst_num').append($('<option>').text(value.gstn_num + " - "+value.customer_name ).attr('value', value.gstn_num));
      
          				});
   							})
          .error(function(){
             alert('Error in Loading the Vendor GST details . Please Try again after sometime');
          });
  				}
  			});
        });
    </script>
     <script>
						 function check(elem) {
								 if (elem.value=='Y') {
											document.getElementById("gst_id").style.display = 'block';
									}
									else {
										 document.getElementById("gst_id").style.display = 'none';
									}
						};
   </script>
   </head>
  
  <body>
    
    @if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
		@endif
								<div id="alertdiv" class="col-lg-12">
											@if (count($errors) > 0)
											<div class="alert alert-danger">
												<strong>Whoops!</strong> There were some problems with your input.<br><br>
												<ul>
													@foreach ($errors->all() as $error)
														<li>{{ $error }}</li>
													@endforeach
												</ul>
											</div>
										@endif

								</div>	
    
    <div class="form-group ">
        <div class="col-lg-12">
             <form id="customer_txn" name="customer_txn" action="{{ url('/customertxn')}}" method="post">
              {{ csrf_field() }}
                   <div class="panel panel-default panel-primary">
                       <div class="panel-heading"><b>customer Transaction Details</b></div>
                         <div class="panel-body">
                                  <div class="col-lg-4" >
                                  <label> Registered Customer * :</label>
                                        <select class="form-control form-inline"  id="reg_customer" name="reg_customer" onChange="check(this)"; value="{{old('reg_customer')}}" required>
                                          <option disabled selected> SELECT</option>
                                          <option value="Y">Yes</option> 
                                           <option  value="N">No</option>
                                        </select>
                                    </div> 
                                           <div class="col-lg-4" id="gst_id" style="display:none">
                                          <label>GSTN Number * :</label> 
                                           <select  class="form-control form-inline" id="gst_num"  name="gst_num" value="{{old('gst_num')}}" required>
                                             <option  value="NA">SELECT</option>
                                             
                                             </select></div>
                            <div class="col-lg-12"><br /></div>
                                        <div class="col-lg-4">
                                           <label> Invoice Number * :</label>
                                          <input class="form-control form-inline" type ="text" name="invoice_no"  value="{{old('invoice_no')}}" required>
                                       </div>
                            <div class="col-lg-4">
                                           <label> Payment Date * :</label>
                                          <input class="form-control form-inline" type ="text" name="payment_dt" id="payment_dt" value="{{old('payment_dt')}}" required>
                                    </div>
                                 <div class="col-lg-12"><br /></div>
                            <div class="col-lg-6">
                                           <label> Purpose * :</label>
															<select class="form-control form-inline"  id="purpose" name="purpose" value="{{old('purpose')}}" required>
                                          <option disabled selected> SELECT</option>
                                          <option value="Exchange">Exchange</option> 
                                          <option  value="Commission">Commission</option>
																          <option value="Safe Deposit Locker">Safe Deposit Locker</option> 
                                          <option  value="Other Income  ">Other Income  </option>
																          <option value="ATM">ATM</option> 
                                          <option  value="Lawyer Fees ">Lawyer Fees </option>
																<option  value="Taxi Fare">Taxi Fare</option>
																<option  value="Security Wages ">Security Wages </option>
                                <option  value="Upkeeping Expenses">Upkeeping Expenses</option> 
																<option  value="Directors sitting fees 3">Directors sitting fees 3</option> 
															</select>
                                           
                                    </div>
                           <div class="col-lg-6">
                                           <label> Narration * :</label>
                                          <input class="form-control form-inline" type ="text" name="narration" value="{{old('narration')}}" required>
                                    </div>
                                <div class="col-lg-12"><br /></div> 
                            <div class="col-lg-3">
                                           <label> Total Amount* :</label>
                                          <input class="form-control form-inline" type ="text" name="tot_amt"  value="{{old('tot_amt')}}" required>
                                    </div>
                            
                             <div class="col-lg-3">
                                           <label> Taxable Amount* :</label>
                                          <input class="form-control form-inline" type ="text" name="tax_amt" value="{{old('tax_amt')}}" required>
                                    </div>
                           <div class="col-lg-3">
                                           <label> Tax value* :</label>
                                          <input class="form-control form-inline" type ="text" name="tax" value="{{old('tax')}}" required>
                                    </div>
                            <div class="col-lg-12"><br /></div> 
                            <div class="col-lg-3">
                                           <label> SGST Value :</label>
                                          <input class="form-control form-inline" type ="text" name="sgst">
                                       </div>
                              <div class="col-lg-3">
                                           <label> CGST Value :</label>
                                          <input class="form-control form-inline" type ="text" name="cgst">
                                       </div>   
                           
                           <div class="col-lg-3" >
                                  <label></label>
                                    <input type="submit" value="Submit " class="form-control btn btn-success btn-block"  />
                                     </div>
               </div>
          </form>
      </div>
    </div>


  </body>
  
</html>
@endsection

