<?php

namespace App\Models;

use App\Models\Url;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrlMonitora extends Model
{
    protected $table = 'url_monitora';
    
    protected $fillable = ['id','url_id','status_code','response'];

    public $timestamps = true;

    public function url()
    {
        return $this->belongsTo(Url::class);        
    }
  
    use HasFactory;
}
