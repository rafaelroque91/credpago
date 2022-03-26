<?php

namespace App\Models;
use Illuminate\Support\Facades\Auth;

class UrlUser extends Url
{    
  protected $fillable = ['id','url'];

  protected $table = 'urls';


  public static function boot()  
  {
    parent::boot();
 
    static::addGlobalScope(function ($query) {
        $query->where('user_id', Auth::id());
    });

    static::creating(function ($model){
      $model->user_id = auth()->user()->id;
  });

  }
}
