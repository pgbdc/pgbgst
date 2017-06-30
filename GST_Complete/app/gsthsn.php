<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gsthsn extends Model
{
  protected $table='gsthsn';
  public $timestamps=false;
  protected $fillable=array('material_desc','hsn_cd','quantity_code');
  
}
