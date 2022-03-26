<?php

namespace App\Models;

use App\Models\UrlMonitora;
use App\Models\UrlUser;

class UrlMonitoraUser extends UrlMonitora
{
  protected $table = 'url_monitora';
      
  public static function boot()  
  {   
    parent::boot();
  
    static::addGlobalScope(function ($query) {   
      $ids = UrlUser::get('id')->pluck('id')->toArray();    
      $query->whereIn('url_id',$ids);
      $query->orderBy('created_at','DESC');
    });  
  }
  
}
