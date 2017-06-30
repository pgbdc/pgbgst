<?php

namespace App\Http\Controllers\gst\utils;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\gstsac;

class getsac extends Controller
{
    public function index()
    {
      $sacdetails=gstsac::all();
      return json_encode($sacdetails);
    }
}
