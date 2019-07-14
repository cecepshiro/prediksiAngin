<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataBerkas extends Model
{
    protected $table='data_berkas';
    protected $primaryKey='id';
    public $incrementing =true;
    public $timestamps=true; 
    protected $fillable = [
      'id','file','keterangan','created_at','updated_at',
    ];
}
