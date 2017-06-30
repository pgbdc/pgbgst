<?php

namespace App\Http\Controllers\gst\utils;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\gstvendormaster;
use App\gstcustomermaster;

class getgstn extends Controller
{
    public function vendor()
    {
      $gstndetails=gstvendormaster::all();
      return json_encode($gstndetails);
    }
  
  public function customer()
    {
      $gstndetails=gstcustomermaster::all();
      return json_encode($gstndetails);
    }
}
