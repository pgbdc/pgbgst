<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gstsac extends Model
{
  protected $table='gstsac';
  public $timestamps=false;
  protected $fillable=array('service_desc','sac_cd');
  
}