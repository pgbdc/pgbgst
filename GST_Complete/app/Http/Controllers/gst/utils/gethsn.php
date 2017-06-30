<?php

namespace App\Http\Controllers\gst\utils;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\gsthsn;

class gethsn extends Controller
{
    public function index()
    {
      $hsndetails=gsthsn::all();
      return json_encode($hsndetails);
    }
}
