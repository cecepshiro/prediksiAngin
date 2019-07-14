<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataProcessing extends Model
{
    protected $table='data_processings';
    protected $primaryKey='id';
    public $incrementing =true;
    public $timestamps=true; 
    protected $fillable = [
      'id','namaStasiun','panjangData','namaModel','status','created_at','updated_at',
    ];
}
