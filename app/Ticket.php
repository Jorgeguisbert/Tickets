<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
  protected  $fillable=['nombre','descripcion','importancia','fechSol'];


  public function scopeSearch($query, $s){
    return $query->where('nombre','like','%' .$s. '%')
          ->orWhere('descripcion','like','%' .$s. '%');
  }
}
