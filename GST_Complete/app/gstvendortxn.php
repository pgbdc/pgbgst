<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gstvendortxn extends Model
{
  protected $table='gstvendortxn';
  public $timestamps = false;
  protected $fillable=array(
  'registered','gstn_num','payment_dt','invoice_no','invoice_dt',
   'purpose','narration','total_amount','taxable_amount',
    'tax_amount','sgst','cgst','igst',
    'br_dep_cd','ent_by','ent_dt_time',
  );
  
}