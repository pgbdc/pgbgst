<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gstcustomermaster extends Model
{
  protected $table='gstcustomermaster';
  public $timestamps = false;
  protected $fillable=array(
  'customer_name','gstn_num','pan','addr','city','pin','add_addr','add_city',
    'add_pin','person_type','business_type','special_status','forms_decl',
    'contact_name','contact_desg','contact_addr','contact_phone','contact_email',
    'br_dep_cd','ent_by','ent_dt_time',
  );
  
}