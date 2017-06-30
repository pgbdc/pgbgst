<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
    <title>GST Page</title>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
  
        <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
               <span> <h4> PGB GST</h4></span>
            </div>
         </div>
         </nav>

<div class="row">
<div class="col-lg-2 linkcolorwhite" style="background-color:#222d32;height:100%;padding:0px;min-height:1000px">
<div class="user-panel">
   <div class="pull-left">
     <ul class="sidebar-menu">
     </br> </br>
  
        <a href="{{url('/gstcustomer')}}"  style ="color:white" onclick="">Customer Master</a></br> </br> 
        <a href="{{url('/gstvendor')}}" style ="color:white" onclick="">Vendor Master</a> </br></br> 
        <a href="{{url('/vendortxn')}}" style ="color:white" onclick="">Vendor Transaction</a>  </br></br> 
        <a href="{{url('/customertxn')}}" style ="color:white" onclick="">Customer Transaction</a>  </br></br>
       
     </ul>       
   </div>
    </div>
    </div>
  
    <div class="col-lg-10">
        @yield('scripts')
         @yield('content')
          
    <!-- JavaScripts -->
    </div>
    </div>
  
  
  
    
</body>
</html>
