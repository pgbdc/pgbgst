<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gstvendormaster extends Model
{
  protected $table='gstvendormaster';
  public $timestamps = false;
  protected $fillable=array(
  'vendor_name','gstn_num','pan','type','addr','city','pin','add_addr','add_city',
    'add_pin','person_type','business_type','hsn_cd','sac_cd',
    'contact_name','contact_desg','contact_addr','contact_phone','contact_email',
    'br_dep_cd','ent_by','ent_dt_time',
  );
  
}