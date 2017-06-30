@extends('layouts.app')
@section('content')
  
<!DOCTYPE html>
<html lang="en">
 <head>
        <title>GST Home page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   
   <script>
    function check(elem) {
       if (elem.value=='other') {
            document.getElementById("otherName").style.display = 'block';
        }
        else {
           document.getElementById("otherName").style.display = 'none';
        }
     };
      function check1(elem) {
       if (elem.value=='none') {
            document.getElementById("appr_status").style.display = 'none';
        }
        else {
          document.getElementById("appr_status").style.display = 'block'; 
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
             <form id="cust_master" name="cust_master" action="{{ url('/gstcustomer')}}" method="post">
                 {{ csrf_field() }}
                <div class="panel panel-default panel-primary">
                 <div class="panel-heading"><b>GST Customer Details</b></div>
                   <div class="panel-body">
                  
                             <div class="col-lg-4" >
                                  <label> Customer Name * :</label>
                                  <input class="form-control form-inline" type ="text" name="cust_name"  value="{{old('cust_name')}}" required>
                                  </div> 
                              <div class="col-lg-4" >
                                  <label>GST Number * :</label>
                                  <input class="form-control form-inline" type ="text" name="gst_num" value="{{old('gst_num')}}" required>
                                  </div> 
                              <div class="col-lg-4" >
                                  <label> PAN  * : </label>
                                   <input class="form-control form-inline" type ="text" name="pan" value="{{old('pan')}}" required>
                                   </div>
                                    <div class="col-lg-12"><br /></div>
                              <div class="form-group" >
                                    <label> Address of the principal place of business as per GST registration * : </label>
                                    <input class="form-control" type ="text" name="addr_bus" value="{{old('addr_bus')}}" required>
                                    </div> 
                                     <div class="col-lg-12"><br /></div>
                              <div class="col-lg-4" >
                                     <label>  City * :</label>
                                     <input class="form-control form-inline" type ="text" name="city_bus" value="{{old('city_bus')}}" required>
                                     </div> 
                              <div class="col-lg-4" >
                                     <label>   Pincode * : </label>
                                     <input  class="form-control form-inline" type ="text" name="pin_bus" value="{{old('pin_bus')}}" required>
                                     </div> 
                                      <div class="col-lg-12"><br /></div>
                              <div class="col-lg-12" >
                                      <label>  Address of additional places of Business in the State 
                                               where SO is received from or material/services is received from<br>
                                                  (all information as per GST Registration Certificate):</label>
                                      <input class="form-control" type ="text" name="add_addr_bus"> <br>
                                      </div>
                                      <div class="col-lg-12"><br /></div>
                              <div class="col-lg-4" >
                                       <label>  City :</label>
                                       <input class="form-control form-inline" type ="text" name="addr_city_bus" >
                                       </div> 
                              <div class="col-lg-4" >
                                         <label>   Pincode : </label>
                                         <input  class="form-control form-inline" type ="text" name="addr_pin_bus" >
                                         </div>         
                                         <div class="col-lg-12"><br /></div>
                              <div class="col-lg-4" >
                                         <label> Type of Person : </label>
                                         <select class="form-control form-inline" name="type_person" value="{{old('type_person')}}" required>
																					  <option  disabled selected>SELECT</option>
                                         <option name ="regular" value="regular">Regular</option> 
                                         <option name ="composite" value="composite">Composite</option>
                                         </select>
                                         </div> 
                              <div class="col-lg-4"> 
                                         <label> Type of business: </label> 
                                          <select  class="form-control form-inline" id="choose"  name="type_bus" onChange="check(this);" value="{{old('type_bus')}}" required>
																						<option  disabled selected  >SELECT</option>
                                          <option name ="manufacturer" value="manufacturer">Manufacturer</option> 
                                          <option name ="trader" value="trader">Trader</option> 
                                          <option name ="service provider" value="service provider">Service Provider</option>
                                          <option name ="work contractor" value="work contractor">Work Contractor</option>
                                          <option name ="other" value="other">Other</option>
                                         </select>  </div>
                                  <div class="col-lg-4" id="otherName" style="display:none">
                                          <label>If Others specify,</label> 
                                          <input class="form-control form-inline" type="text" name="othertype" /></div>
                     <div class="col-lg-12"><br /></div>
                             <div class="col-lg-4" >
                                          <label> Nature of Special Status : </label>
                                          <select class="form-control form-inline" name="type_special" onChange="check1(this);">
																						 <option  disabled selected>SELECT</option>
                                          <option name ="sez" value="sez">SEZ</option> 
                                          <option name ="stp" value="stp">STP</option>
                                          <option name ="eou" value="eou">EOU</option>
                                          <option name ="ftw" value="ftw">FTW</option>
                                          <option name ="ftz" value="ftz">FTZ</option>
                                          <option name ="none" value="none">None</option>
                                          </select></div>
                      <div class="col-lg-4" id="appr_status">
                                          <label>Approval copies & required forms/documents</label> 
                                          <select class="form-control form-inline" type="text" name="appr_status">
																						 <option  value="NA">SELECT</option>
                                          <option name ="yes" value="yes">YES</option> 
                                          <option name ="no" value="no">No</option> 
                       										 </select> 
                                            </div>

                           </div>
                    </div>
       <div class="panel panel-default panel-primary">
          <div class="panel-heading"><b>Contact Details of the Concerned Person</b></div>
            <div class="panel-body">
                  <div class="col-lg-12"><br /></div>
                     
                              <div class="col-lg-4" >
                                    <label> Name : </label>
                                    <input class="form-control form-inline" type ="text" name="cont_name">
                                    </div>
                             <div class="col-lg-8" >
                                    <label> Designation  : </label>
                                    <input class="form-control form-inline" type ="text" name="cont_desg">
                                    </div>
                             <div class="col-lg-12"><br /></div>
                              <div class="col-lg-12" >
                                    <label> Address : </label>
                                    <input class="form-control" type ="text" name="cont_addr">
                                    </div> 
                                    <div class="col-lg-12"><br /></div>
                              <div class="col-lg-4" >
                                   <label>Phone No : </label>
                                   <input class="form-control form-inline" type ="text" name="cont_mobile">
                                   </div>
                               <div class="col-lg-4" >
                                     <label> Email Id  : </label>
                                     <input class="form-control form-inline" type ="text" name="cont_email">
                                     </div>
              
                                <div class="col-lg-4" >
                                  <label></label>
                                    <input type="submit" value="Submit " class="form-control btn btn-success btn-block"  />
                                     </div>
                       </div>          
                  </div>
 
           </form>
     </div>
 </div> 

</body>
</html>
@endsection