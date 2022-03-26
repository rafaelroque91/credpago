<?php

namespace App\Models;

use App\Models\UrlMonitor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Url extends Model
{    
  protected $fillable = ['id','url'];

  use HasFactory;

  public function monitora()
  {
    return $this->hasMany(UrlMonitor::class);
  }

  public function user()
  {
      return $this->belongsTo(User::class);        
  }

}
