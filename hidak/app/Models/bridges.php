<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bridges extends Model
{
    use HasFactory;
    protected $table="bridges";
    public $timestamps=false;
    public function location(){
        return $this->belongsTo(locations::class,'location','id');
    }
}
