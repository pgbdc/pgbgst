<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gstcustomertxn extends Model
{
  protected $table='gstcustomertxn';
  public $timestamps = false;
  protected $fillable=array(
  'registered','gstn_num','payment_dt','invoice_no',
'purpose','narration','total_amount','taxable_amount',
'tax_amount','sgst','cgst',
    'br_dep_cd','ent_by','ent_dt_time',
  );
  
}